<?php

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return redirect('login');
});

Route::group(['namespace' => 'Backend', 'middleware' => 'customMiddleware'], function (){
    Route::get('tasks/', 'TasksController@getIndex')->name('tasks.index');
    Route::get('tasks/create', 'TasksController@getCreate')->name('tasks.create');
    Route::post('tasks/store', 'TasksController@postStore')->name('tasks.store');
    Route::get('tasks/edit/{task}', 'TasksController@getEdit')->name('tasks.edit');
    Route::put('tasks/update/{task}', 'TasksController@putUpdate')->name('tasks.update');
    Route::delete('tasks/{task}', 'TasksController@destroy')->name('tasks.delete');
    Route::post('tasks/complete/{id}', 'TasksController@postComplete')->name('tasks.complete');

    Route::resource('users', 'UsersController');

    Route::resource('categories', 'CategoriesController');
});
