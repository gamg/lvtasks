<?php
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Backend'], function (){
    Route::get('tasks', 'TasksController@getIndex')->name('tasks.index');
    Route::get('tasks/create', 'TasksController@getCreate')->name('tasks.create');
    Route::post('tasks/store', 'TasksController@postStore')->name('tasks.store');
    Route::get('tasks/edit/{id}', 'TasksController@getEdit')->name('tasks.edit');
    Route::post('tasks/update/{id}', 'TasksController@postUpdate')->name('tasks.update');

    Route::resource('users', 'UsersController');
});


