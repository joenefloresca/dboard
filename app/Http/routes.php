<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

/* Deliveries*/
Route::get('deliveries', 'DeliveriesController@index');
Route::post('deliveries', 'DeliveriesController@actionPost');

/* Inhouse Campaigns*/
Route::get('inhouse', 'InhouseCampaignsController@index');
Route::post('inhouse', 'InhouseCampaignsController@actionPost');

/* Delivery Tracker */
Route::get('deliverytracker', 'DeliveryTrackerController@deliveryIndex');
Route::get('api/deliverytracker/sorted', 'DeliveryTrackerController@getDeliveriesSorted');

Route::get('api/deliverytracker/complete', 'DeliveryTrackerController@deliveryIndexApiComplete');
Route::get('api/deliverytracker/pending', 'DeliveryTrackerController@deliveryIndexApiPending');

/* Clients Resource Controller*/
Route::resource('client', 'ClientController');

/* Clients API Calls */
Route::get('api/client/all', 'ClientController@apiGetClients');

/* Suppliers Resource Controller*/
Route::resource('supplier', 'SupplierController');

/* Supplier API Calls */
Route::get('api/supplier/all', 'SupplierController@apiGetSuppliers');

/* Campaigns Resource Controller*/
Route::resource('campaign', 'CampaignController');

/* Campaigns API Calls */
Route::get('api/campaign/all', 'CampaignController@apiGetCampaigns');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
