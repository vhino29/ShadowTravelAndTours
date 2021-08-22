<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Booking\HotelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

/**************************************
 *  STARTUP/HOME PAGE
 * ************************************/
Route::get('/', [HotelController::class, 'HotelBooking'])->name('welcome');
Route::get('/home', [HotelController::class, 'HotelBooking'])->name('home');


/**************************************
 *  HOTEL BOOKING
 * ************************************/
Route::get('/hotels-booking', [HotelController::class, 'HotelBooking'])->name('hotel.booking');
Route::get('/hotels-list', [HotelController::class, 'HotelSearch'])->name('hotel.search');
Route::get('/hotel-details', [HotelController::class, 'HotelDetails'])->name('hotel.details');
