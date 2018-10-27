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

// Users
Route::resource('users', 'Api\User\UserController', ['except'=>['index', 'edit', 'create']]);
Route::resource(
    'users.reservations',
    'Api\User\UserReservationController',
    ['except'=>['edit', 'create', 'show']]
)->middleware('auth:api');

// Reservations
Route::resource(
    'reservations',
    'Api\Reservation\ReservationController',
    ['only'=>['index', 'show']]
)->middleware('auth:api');

// Companies
Route::resource('companies', 'Api\Company\CompanyController', ['only'=>['index', 'show']]);
Route::resource('companies.branches', 'Api\Company\CompanyBranchController', ['only'=>['index']]);

// Branches
Route::resource('branches', 'Api\Branch\BranchController', ['only'=>['index', 'show']]);
Route::resource('branches.products', 'Api\Branch\BranchProductController', ['only'=>['index']]);

// Products
Route::resource('products', 'Api\Product\ProductController', ['only'=>['index', 'show']]);

// Authentication
Route::post('oauth/token', 'Api\TokenController@issueToken');