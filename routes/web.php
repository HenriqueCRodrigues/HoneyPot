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

Route::get('/', function () {
    return view('index');
});

Route::prefix('map')->group(function () {
    Route::post('insert', 'MapController@getAttacks');
    Route::post('new-attack', 'AttackController@storeAttack');

});



Route::prefix('report')->group(function () {
    Route::post('for-port-and-protocol', 'ReportController@forPortAndProtocol');
    Route::post('for-city', 'ReportController@forCity');
    Route::post('for-city-and-port', 'ReportController@forCityAndPort');
    Route::post('for-city-and-protocol', 'ReportController@forCityAndProtocol');
    Route::post('for-city-port-and-protocol', 'ReportController@forCityPortAndProtocol');
    Route::post('for-country', 'ReportController@forCountry');
    Route::post('for-country-and-port', 'ReportController@forCountryAndPort');
    Route::post('for-country-and-protocol', 'ReportController@forCountryAndProtocol');
    Route::post('for-country-port-and-protocol', 'ReportController@forCountryPortAndProtocol');
    Route::post('for-ip', 'ReportController@forIp');
    Route::post('for-ip-and-port', 'ReportController@forIpAndPort');
    Route::post('for-ip-and-protocol', 'ReportController@forIpAndProtocol');
    Route::post('for-protocol', 'ReportController@forProtocol');

    //Route::post('for-port-and-date', 'ReportController@forPortAndDate');
    //Route::post('for-city-and-date', 'ReportController@forCityAndDate');
    //Route::post('for-city-date-and-port', 'ReportController@forCityDateAndPort');
    //Route::post('for-city-date-port-and-protocol', 'ReportController@forCityDatePortAndProtocol');
    //Route::post('for-country-and-date', 'ReportController@forCountryAndDate');
    //Route::post('for-country-port-and-date', 'ReportController@forCountryPortAndDate');
    //Route::post('for-country-port-date-and-protocol', 'ReportController@forCountryPortDateAndProtocol');
    //Route::post('for-protocol-and-date', 'ReportController@forProtocolAndTime');

});


Route::prefix('script')->group(function () {
    Route::get('select', 'ScriptController@testSelect');
    Route::get('run', 'ScriptController@run')->name('seed');
});