<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::get('dashboard', 'AdminController@Dashboard');
    Route::match(['get', 'post'], 'Admincontroller@login');
});
