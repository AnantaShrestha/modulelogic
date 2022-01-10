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
Route::prefix(BACKEND_TEMPLATE_PREFIX)->name(BACKEND_TEMPLATE_NAME)->middleware(BACKEND_MIDDLEWARE)->group(function() {
        Route::prefix('menu')->group(function(){
            Route::get('/','MenusettingController@index')->name('menu');
            Route::get('create','MenusettingController@create')->name('menu.create');
            Route::post('create','MenusettingController@store')->name('menu.store');
            Route::get('edit/{id}','MenusettingController@edit')->name('menu.edit');
            Route::post('edit/{id}','MenusettingController@update')->name("menu.update");
            Route::delete('delete','MenusettingController@destroy')->name('menu.delete');

            Route::post('sort','MenusettingController@sort')->name("menu.sort");
        });
});
