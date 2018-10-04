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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::resource('clients', 'Api\Client\ClientController');
Route::resource('reservations', 'Api\Reservation\ReservationController');

Route::resource('companies', 'Api\Company\CompanyController', ['only'=>['index', 'show']]);
Route::resource('branches', 'Api\Branch\BranchController', ['only'=>['index', 'show']]);
Route::resource('products', 'Api\Product\ProductController', ['only'=>['index', 'show']]);