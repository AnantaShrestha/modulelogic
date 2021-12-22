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


Route::prefix(BACKEND_TEMPLATE_PREFIX)->name(BACKEND_TEMPLATE_NAME)->group(function(){
    Route::get('login','AuthController@login')->name('login');
    Route::post('login','AuthController@loginProcess')->name('loginProcess');
    Route::get('logout','AuthController@logout')->name('logout');
});
Route::prefix(BACKEND_TEMPLATE_PREFIX)->name(BACKEND_TEMPLATE_NAME)->middleware(BACKEND_MIDDLEWARE)->group(function() {
    Route::group(['prefix'=>'permission'],function(){
        Route::get('/','PermissionController@index')->name('permission');
        Route::get('create','PermissionController@create')->name('permission.create');
        Route::post('create','PermissionController@store')->name('permission.store');
    });
});
