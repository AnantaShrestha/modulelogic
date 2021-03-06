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
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});
