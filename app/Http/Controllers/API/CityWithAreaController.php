<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\CityWithAreaCollection;
use App\Models\API\CityWithArea;

use App\Libraries\AppUtility;


class CityWithAreaController extends Controller
{
    private $AppUtil;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->AppUtil = new AppUtility;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CityWithAreaCollection(CityWithArea::paginate($this->AppUtil->getPaginateLimit()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $cityId
     * @return \Illuminate\Http\Response
     */
    public function showCityAreaInCity($cityId)
    {
        return new CityWithAreaCollection(CityWithArea::where('city_id', $cityId)
            ->paginate($this->AppUtil->getPaginateLimit()));
    }

}
