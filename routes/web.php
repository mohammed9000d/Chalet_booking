<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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


// Fronend Routes
Route::prefix('cms/website')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/','Frontend\WebsiteController@visitor')->name('website.visitor');
});

Route::prefix('cms/website')->middleware('auth:users')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/home','Frontend\WebsiteController@home')->name('website.index');
    Route::get('/{id}/details','Frontend\WebsiteController@details')->name('website.details');
    Route::get('/chalets','Frontend\WebsiteController@chalets')->name('website.chalets');
    Route::get('/search', 'Frontend\WebsiteController@search')->name('website.search');
    Route::get('/reservations','Frontend\WebsiteController@reservations')->name('website.reservations');
    Route::get('/favorite','Frontend\WebsiteController@favorite')->name('website.favorite');
    Route::post('/{id}/chalets','Frontend\WebsiteController@addFavorite')->name('website.favorite_chalet');
    Route::delete('/{id}/favorite','Frontend\WebsiteController@deleteFavorite')->name('website.favorite_delete');
    Route::post('/{id}/details', 'Frontend\WebsiteController@comment')->name('website.comment');
    Route::get('/{id}/booking','Frontend\WebsiteController@booking')->name('website.booking');
    Route::post('/{id}/booking','Frontend\WebsiteController@process')->name('website.process');
    Route::get('/profile','Frontend\WebsiteController@profile')->name('website.profile');
    Route::put('/{id}/profile','Frontend\WebsiteController@editProfile')->name('website.edit_profile');
    Route::get('/logout','Auth\UserAuthController@logout')->name('user.logout');
});

Route::prefix('cms/website')->namespace('App\Http\Controllers\Auth')->group(function () {
    Route::get('/login', 'UserAuthController@showLoginView')->name('user.login_view');
    Route::post('/login','UserAuthController@login')->name('user.login');

    Route::get('/register', 'UserAuthController@showRegisterView')->name('user.register_view');
    Route::post('/register','UserAuthController@register')->name('user.register');
});


// Admin Routes


Route::prefix('cms/admin')->middleware('auth:admin')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/','DashboardController@index')->name('admin.dashboard');
    Route::get('/profile','DashboardController@profile')->name('admin.profile');
    Route::post('/profile','AdminController@update')->name('admin.edit_profile');
    Route::get('cities/{id}/states','CityController@showStates')->name('cities.states');
    Route::resource('cities','CityController');
    Route::resource('states','StateController');
    Route::resource('admins','AdminController');
    Route::resource('users','UserController');
    Route::resource('owners','OwnerController');
    Route::resource('chalets','ChaletController');
    Route::resource('reservations','ReservationController');
    Route::resource('favorites','FavoriteController');
    Route::resource('sliders','SliderController');
    Route::resource('comments','CommentController');
    Route::get('/logout','Auth\AdminAuthController@logout')->name('admin.logout');
});


Route::prefix('cms/admin')->namespace('App\Http\Controllers\Auth')->group(function () {
    Route::get('/login', 'AdminAuthController@showLoginView')->name('admin.login_view');
    Route::post('/login','AdminAuthController@login')->name('admin.login');

    Route::get('/register', 'AdminAuthController@showRegisterView')->name('admin.register_view');
    Route::post('/register','AdminAuthController@register')->name('admin.register');
});



// Owner Routes

Route::prefix('cms/owner')->middleware('auth:owner')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/','DashboardController@Ownerdash')->name('owner.dashboard');
    Route::view('/profile', 'owner.profile')->name('owner.profile');
    Route::resource('editchalets','Owner\EditInfoController');
    Route::resource('chaletres','Owner\ChaletResController');
    Route::resource('images','Owner\CreateImageController');
    Route::get('/logout','Auth\OwnerAuthController@logout')->name('owner.logout');
});

Route::prefix('cms/owner')->namespace('App\Http\Controllers\Auth')->group(function () {
    Route::get('/login', 'OwnerAuthController@showLoginView')->name('owner.login_view');
    Route::post('/login','OwnerAuthController@login')->name('owner.login');

    Route::get('/register', 'OwnerAuthController@showRegisterView')->name('owner.register_view');
    Route::post('/register','OwnerAuthController@register')->name('owner.register');
});


Route::get('auth/facebook','App\Http\Controllers\API\SocialController@facebookRedirect')->name('login.facebook');
Route::get('auth/facebook/callback','App\Http\Controllers\API\SocialController@loginWithFacebook');

