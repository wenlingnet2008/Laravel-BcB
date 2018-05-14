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

Route::get('admin', 'Admin\LoginController@index')->name('admin.login.index');
Route::get('admin/login', 'Admin\LoginController@show')->name('admin.login.show');
Route::post('admin/checklogin', 'Admin\LoginController@login')->name('admin.login');

Route::name('admin.')->prefix('admin')->namespace('Admin')->group(function (){
    Route::get('dashboard', 'DashboardController@index')->name('dash.index');
    Route::resource('brands', 'BrandController',[
        'parameters' => ['brands'=> 'brandid'],
    ]);
    Route::get('admin/logout', 'LoginController@logout')->name('logout');
});



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
