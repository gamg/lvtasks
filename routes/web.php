<?php

Auth::routes();

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
