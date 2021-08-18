<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Libraries\AppUtility;

use App\Http\Resources\HotelCollection;
use App\Models\API\Hotel;

use App\Models\API\City;

use Carbon\Carbon;

class HotelController extends Controller
{
    private $AppUtil;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->AppUtil = new AppUtility;
    }

    public function HotelBooking() 
    {
        $cities = City::where('country_id', 58)
                    ->whereNotNull('agoda_city_id')
                    ->orderBy('name', 'ASC')
                    ->get();
        return view('booking.hotels.index', compact('cities'));
    }

    public function HotelSearch(Request $request) 
    {
        $validatedData = $request->validate([
            'destination' => 'required',
            'checkin' => 'required|date',
            'checkout' => 'required|date',
            'rooms' => 'required|min:1|max:6',
            'adults' => 'required|min:1|max:15',
            'children' => 'required|min:0',
        ]);

        $errors = array();

        $destination = explode("-", $request->destination);

        if(count($destination) != 2){
            $errors['destination'] = array('Invalid destination.');
        }

        if($destination[0] != "CTY"){
            $errors['destination'] = array('Invalid destination.');
        }

        if(intval($destination[1]) <= 0){
            $errors['destination'] = array('Invalid destination.');
        }

        $checkin = Carbon::parse($request->checkin)->format('Y-m-d');
        $checkout = Carbon::parse($request->checkout)->format('Y-m-d');

        if($checkin == null){
            $errors['checkin'] = array('Invalid checkin date.');
        }

        if($checkout == null){
            $errors['checkout'] = array('Invalid checkout date.');
        }

        $childAge = array();
        $noChildren = intval($request->children);
        for ($i=1; $i <= $noChildren; $i++) { 
            if($request['child_age_'.$i] != null){
                array_push($childAge, intval($request['child_age_'.$i]));
            }
        }

        if($noChildren !== count($childAge)){
            $errors['children'] = array('Invalid number of children.');
        }

        if(count($errors)){
            return back()->withErrors($errors)->withInput();
        }

        $searchData = [
            'type'      => $destination[0],
            'id'        => intval($destination[1]),
            'checkin'   => $checkin,
            'checkout'  => $checkout,
            'rooms'     => intval($request->rooms),
            'adults'    => intval($request->adults),
            'children'  => intval($request->children),
            'childage'  => $childAge
        ];


        return view('booking.hotels.list', compact('searchData'));
    }
}
