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
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('roles', 'RoleController');

    Route::resource('companies', 'CompanyController');
    Route::resource('companies.branches', 'CompanyBranchController', ['only'=>['index']]);

    Route::resource('users', 'UserController');

    Route::resource('branches', 'BranchController');
    Route::resource('branches.products', 'BranchProductController', ['only'=>['index']]);

    Route::resource('products', 'ProductController');

    Route::resource('reservations', 'ReservationController');

});