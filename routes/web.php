<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'as' => 'admin.'], function(){

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/usuarios', 'UserController');
    Route::resource('/profiles', 'ProfileController');
    Route::resource('/enderecos', 'AddressController');

});
