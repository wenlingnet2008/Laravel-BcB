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
    Route::get('main', 'DashboardController@main')->name('dash.main');
    Route::get('password', 'DashboardController@password')->name('dash.password');
    Route::post('change_password', 'DashboardController@changePassword')->name('dash.changepassword');

    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('left', function(){ return view('layouts.admin.left');})->name('left');


    Route::post('brands/upload', 'BrandController@uploadThumb')->name('brands.upload');
    Route::get('brands/search', 'BrandController@search')->name('brands.search');
    Route::resource('brands', 'BrandController',[
        'parameters' => ['brands'=> 'brandid'],
    ]);


    Route::get('categories/subcategory', 'CategoryController@subcategory')->name('categories.subcategory');
    Route::get('categories/fixtree', 'CategoryController@fixTree')->name('categories.fixtree');
    Route::any('categories/list/{catid?}', 'CategoryController@clist')->name('categories.list');
    Route::get('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController',[
        'parameters' => ['categories'=> 'catid'],
    ]);


    Route::post('paras/index', 'ParaController@index')->name('paras.batchupdate');
    Route::any('paras/copy', 'ParaController@copy')->name('paras.copy');
    Route::resource('paras', 'ParaController',[
        'parameters' => ['paras' => 'dpid'],
    ]);

    Route::get('members/search', 'MemberController@search')->name('members.search');
    Route::resource('members', 'MemberController', [
        'parameters' => ['members' => 'userid']
    ]);

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
