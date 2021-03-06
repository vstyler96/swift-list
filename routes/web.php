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
})->middleware('guest');

Auth::routes(['verify' => true, 'register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('items', 'ItemController')->middleware('auth');

Route::resource('recipes', 'RecipeController')->middleware('auth');

Route::resource('shopping-lists', 'ShoppingListController')->middleware('auth');

Route::get('/change-password', 'Auth\ChangePasswordController@index')->name('change-password')->middleware('auth');
Route::put('/change-password','Auth\ChangePasswordController@update')->middleware('auth')->name('change-password.update')->middleware('auth');

Route::resource('aisles', 'AisleController')->only(['index', 'store']);
