<?php

namespace App\Http\Controllers\API\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\HotelCollection;

use App\Models\API\City;
use App\Models\API\Hotel;
use App\Models\API\HotelPicture;

use Carbon\Carbon;
use AgodaAPI;

use App\Libraries\AppUtility;

class AgodaController extends Controller
{
    private $AppUtil;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->AppUtil = new AppUtility;
    }

    public function AgodaHotels(Request $request) 
    {
        $validatedData = $request->validate([
            'type' => 'required',
            'id' => 'required|numeric',
            'checkin' => 'required|date',
            'checkout' => 'required|date',
            'rooms' => 'required|min:1|max:6',
            'adults' => 'required|min:1|max:15',
            'children' => 'required|min:0',
        ]);

        $errors = array();

        if($request->type != "CTY"){
            $errors['type'] = array('Invalid request type.');
        }

        if(intval($request->id) <= 0){
            $errors['id'] = array('Invalid destination id.');
        }

        $checkin = Carbon::parse($request->checkin);
        $checkout = Carbon::parse($request->checkout);

        if($checkin == null){
            $errors['checkin'] = array('Invalid checkin date.');
        }

        if($checkout == null){
            $errors['checkout'] = array('Invalid checkout date.');
        }

        if($checkin != null && $checkout != null 
            && !isset($errors['checkin']) && !isset($errors['checkout']) 
            && $checkin->diffInDays($checkout) > 14){
            $errors['checkin'] = array('Invalid checkin date range.');
            $errors['checkout'] = array('Invalid checkout date range.');
        }

        $childAge = $request->children_age_list;
        $noChildren = intval($request->children);

        if($noChildren !== count($childAge)){
            $errors['children'] = array('Invalid number of children.');
        }

        if(count($errors)){
            return response()->json($errors);
        }

        $city = City::findOrFail($request->id);
        $hotelList = new HotelCollection(Hotel::where('city_id', $city->id)
            ->paginate($this->AppUtil->getPaginateLimit()));

        $agodaHotelIds = array();
        foreach($hotelList->filter() as $data)
        {
            array_push($agodaHotelIds, $data->agoda_hotel_id);
        }

        $reference = Array(
            'hotel_list'    => $agodaHotelIds,
            'checkin'       => $request->checkin,
            'checkout'      => $request->checkout,
            'rooms'         => $request->rooms,
            'adults'        => $request->adults,
            'children'      => $request->children,
            'children_age_list' => $request->children_age_list,
        );

        $agoda = new AgodaAPI;
        $agodaHotels = $agoda->searchHotels($reference);

        $agodaHotelIds = array();
        foreach ($agodaHotels['results'] as $key => $value) {
            array_push($agodaHotelIds, $key);
        }

        $pictures = HotelPicture::whereIn('agoda_hotel_id', $agodaHotelIds)
            ->get();

        $hotelPictures = array();
        foreach ($pictures as $idx => $picture) {
            if(!isset($hotelPictures[$picture->agoda_hotel_id])) {
                $hotelPictures[$picture->agoda_hotel_id] = array(
                    'picture_url'       => $picture->url,
                    'picture_caption'   => $picture->caption,
                );
            }
        }

        $hotelList->additional([
            'agoda_hotels' => $agodaHotels['results'],
            'hotel_pictures' => $hotelPictures
        ]);

        return $hotelList;
    }
}
