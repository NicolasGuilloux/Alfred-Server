<?php

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

Route::get('/', 'MainController@index')->name('home');
Route::get('/map', 'MainController@map')->name('map');
Route::get('/api', 'MainController@api')->name('api');

Route::group(['middleware' => ['cors']], function () {
    Route::get('/api/available/dates/{country?}', 'MainController@getAvailableDates')->name('api.available.dates');
    Route::get('/api/available/countries/{date?}', 'MainController@getAvailableCountries')->name('api.available.countries');

    Route::get('/api/date/{date}', 'MainController@getDataByDate')->name('api.date');
    Route::get('/api/country/{country}', 'MainController@getDataByCountry')->name('api.country');

    Route::get('/api/drivers', 'MarketController@getDrivers')->name('api.drivers');
    Route::get('/api/drivers/source/{name}', 'MarketController@getDriverSource')->name('api.drivers.source');

    Route::get('/api/notifications', 'MainController@getNotifications')->name('api.notifications');
});
