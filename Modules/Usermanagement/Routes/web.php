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
    Route::group(['prefix'=>'user'],function(){
        Route::get('/','RoleController@index')->name('user');
        Route::get('create','UserController@create')->name('user.create');
        Route::post('create','UserController@store')->name('user.store');
        Route::get('edit/{id}','UserController@edit')->name('user.edit');
        Route::post('edit/{id}','UserController@update')->name('user.update');
        Route::delete('delete','UserController@delete')->name('user.delete');
    });

    Route::group(['prefix'=>'permission'],function(){
        Route::get('/','PermissionController@index')->name('permission');
        Route::get('create','PermissionController@create')->name('permission.create');
        Route::post('create','PermissionController@store')->name('permission.store');
        Route::get('edit/{id}','PermissionController@edit')->name('permission.edit');
        Route::post('edit/{id}','PermissionController@update')->name('permission.update');
        Route::delete('delete','PermissionController@delete')->name('permission.delete');
    });

    Route::group(['prefix'=>'role'],function(){
        Route::get('/','RoleController@index')->name('role');
        Route::get('create','RoleController@create')->name('role.create');
        Route::post('create','RoleController@store')->name('role.store');
        Route::get('edit/{id}','RoleController@edit')->name('role.edit');
        Route::post('edit/{id}','RoleController@update')->name('role.update');
        Route::delete('delete','RoleController@delete')->name('role.delete');
    });
});
