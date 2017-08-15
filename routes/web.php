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
    Route::get('tasks/edit/{task}', 'TasksController@getEdit')->name('tasks.edit');
    Route::put('tasks/update/{task}', 'TasksController@putUpdate')->name('tasks.update');
    Route::delete('tasks/{task}', 'TasksController@destroy')->name('tasks.delete');

    Route::resource('users', 'UsersController');

    Route::resource('categories', 'CategoriesController');
});


