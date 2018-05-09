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

Route::get('/', 'MainController@index')->name('main.index');

Route::resource('categories', 'CategoryController',[
    'parameters' => [
        'categories' => 'catid',
    ],
    'only' => ['show', 'store', 'update', 'destroy'],
]);

Route::resource('series', 'SeriesController',[
    'parameters' => [
        'series' => 'serid',
    ],
    'only' => ['show', 'store', 'update', 'destroy'],
]);

Route::post('/brands/upload_thumb', 'BrandController@uploadThumb')->name('brands.upload_thumb');

Route::resource('brands', 'BrandController',[
    'parameters' => ['brands'=> 'brandid'],
    'only' => ['show', 'store', 'update', 'destroy'],
]);

Route::resource('members', 'MemberController',[
    'parameters' => ['members'=> 'userid'],
    'only' => ['show', 'store', 'update', 'destroy'],
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
