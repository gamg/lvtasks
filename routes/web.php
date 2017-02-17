<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Backend'], function (){
    Route::resource('users', 'UsersController');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
