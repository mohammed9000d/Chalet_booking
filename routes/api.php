<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::namespace('App\Http\Controllers\API')->group(function (){
    // login & Register
    Route::post('user/login', 'UserAuthApiController@login');
    Route::post('user/register', 'UserAuthApiController@register');

    // Chalets Route
    Route::get('/chalets','ChaletController@chalets');
    Route::get('/chalet_hight','ChaletController@hightPrice');
    Route::get('/chalet_low','ChaletController@lowPrice');
    Route::get('/chalets/search/{name}','ChaletController@search');
});

Route::namespace('App\Http\Controllers\API')->middleware('auth:user')->group(function () {
    // Reservation Routes
    Route::apiResource('reservations', 'ReservationController')->only(['index', 'delete']);
    Route::post('/reservations/{id}','ReservationController@store');

    // Comments Route
    Route::apiResource('/comments/{id}', 'CommentController')->only(['index', 'store']);

    // Favorite Routes
    Route::get('/favorites','FavoriteController@fovarites');
    Route::post('/favorite/{id}','FavoriteController@addFavorite');
    Route::delete('/favorite/{id}','FavoriteController@removeFavorite');

    // Logoute Route
    Route::get('user/logout','UserAuthApiController@logout');
});
