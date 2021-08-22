<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ContinentController;
use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\CityWithAreaController;

use App\Http\Controllers\API\Booking\AgodaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('continents', ContinentController::class);
Route::resource('countries', CountryController::class);
Route::get('countries/continent/{continentId}', [CountryController::class, 'showCountriesInContinent'])->name('countries.continent');

Route::resource('cities', CityController::class);
Route::get('cities/country/{countryId}', [CityController::class, 'showCitiesInCountry'])->name('cities.country');

Route::resource('cityWithAreas', CityWithAreaController::class);
Route::get('cityWithAreas/city/{cityId}', [CityWithAreaController::class, 'showCityAreaInCity'])->name('cityWithAreas.city');


Route::post('agoda/hotels', [AgodaController::class, 'AgodaHotels'])->name('agoda.hotels');
