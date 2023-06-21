<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\AdminController;



Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    // Route::get('dashboard', 'AdminController@Dashboard');
    Route::match(['get', 'post'], 'login', 'AdminController@login');
    Route::group(['middleware'=>['admin:admin']], function(){
        Route::get('dashboard', 'AdminController@dashboard');
        Route::get('update-password', 'AdminController@updatePassword');
        Route::get('logout', 'AdminController@logout');
    });
});
