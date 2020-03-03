<?php


Route::get('/', "ExecutorsController@getDataForMain");
Route::post('/taskAdd', "TasksController@submit");

Route::get('/executor', 'ExecutorsController@getAllData')->name('executor');

Route::get('executor/add',function()
{
    return view('/executorAdd');
})->name('executorAdd');

Route::get('executor/add/successfulAdd',function()
{
    return view('executorSuccess');
})->name('successefulAdd');

Route::post('executor/add/addNewValue','ExecutorsController@submit')->name('Add');

Route::get('/executor/editing{id}', 'ExecutorsController@getRow')->name('executor-edit');
Route::post('/executor/editing{id}', 'ExecutorsController@updateRow')->name('executor-update');

Route::get('/executor/delete{id}', 'ExecutorsController@deleteRow')->name('executor-delete');
