<?php


Route::get('/', "ExecutorsController@getDataForMain")->name('main');
Route::post('/taskAdd', "TasksController@submit");

Route::delete('/delete{id}','TasksController@deleteRow');
Route::get('/editing/{id}', 'TasksController@getRow')->name('tasks-edit');
Route::post('/editing/{id}', 'TasksController@updateRow')->name('task-update');



Route::get('/executor', 'ExecutorsController@getAllData')->name('executor');

Route::get('executor/add',function()
{
    return view('/executorAdd');
})->name('executorAdd');

Route::get('executor/add/successfulAdd',function()
{
    return view('executorSuccess');
})->name('successefulAdd');

Route::get('/success',function()
{
    return view('taskSuccess');
})->name('Success');

Route::post('search','TasksController@search')->name('search');

Route::post('executor/add/addNewValue','ExecutorsController@submit')->name('Add');

Route::get('/executor/editing{id}', 'ExecutorsController@getRow')->name('executor-edit');
Route::post('/executor/editing{id}', 'ExecutorsController@updateRow')->name('executor-update');
Route::delete('/executor/delete{id}', 'ExecutorsController@deleteRow');
