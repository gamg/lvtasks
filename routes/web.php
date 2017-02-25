<?php
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Backend'], function (){
    Route::get('tasks', 'TasksController@getIndex');

    Route::resource('users', 'UsersController');
});


