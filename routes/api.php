<?php

use Illuminate\Http\Request;

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

Route::post('/property', 'PropertyController@store')->name('property.set');

// Now used web.php
// Route::post('/property/{property}/images', 'PropertyImageController@store')->name('propertyImages.store');
Route::get('/properties/{property_id}/images', 'PropertyImageController@list')->name('propertyImages.list');
Route::delete('/property/images/{propertyImage}', 'PropertyImageController@destroy')->name('property.deleteImage');
