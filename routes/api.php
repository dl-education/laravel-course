<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Address;

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

Route::post('/some', [ Address::class, 'parse' ])->middleware('auth', 'verified');
/* Route::controller(Address::class)->group(function(){
    Route::get('/address', 'form')->name('address.form');
}); */
