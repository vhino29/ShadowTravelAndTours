<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Libraries\AppUtility;

use App\Http\Resources\HotelCollection;
use App\Models\API\Hotel;

use App\Models\API\City;

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

        return view('booking.hotels.list');
    }
}
