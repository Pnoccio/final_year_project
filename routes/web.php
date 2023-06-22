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
        Route::match(['get', 'post'],'update-password', 'AdminController@updatePassword');
        Route::match(['get', 'post'],'update_details', 'AdminController@updateDetails');
        Route::get('check-current-password', 'AdminController@checkCurrentPassword');
        Route::get('logout', 'AdminController@logout');
    });
});
