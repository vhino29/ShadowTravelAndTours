<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use APIApplication;
use AgodaAPI;

class AgodaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);

        $sttapi = new APIApplication;
        // "ALL", "CONTINENTS", "COUNTRIES", "CITIES", "CITIES_ON" => array("PH")
        // "HOTELS", 
        // "HOTELS_ON" => array("PH", "MV"), ----->>> use ISO 2 country code
        // "HOTELS_ON_CITY" => array(15903, 18217), --->>> use agoda hotel id
        // "HOTEL_UPDATES" => array("ROOMS", "PICTURES", "FACILITIES")
        // $status = $sttapi->updateDefaultAPI("AGD", array("HOTELS_ON" => array("MV")));

        // Search Hotel
        $status = $sttapi->searchHotels("AGD", array(
            'hotel_list'    => array(564189,21864601,303979,4594927,7121155,14379904,108178,235105,1094863,4600601,9657080,186887,446611,185928,237795,488329,2178606,1468350,8882898,301528,487179,267588,52104,4408245,10260712),
            'checkin'       => "2021-09-25",
            'checkout'      => "2021-09-30",
            'rooms'         => 1,
            'adults'        => 2,
            'children'      => 1,
            'children_age_list' => array(2),
        ));

        dd("status:", $status);
    }
}
