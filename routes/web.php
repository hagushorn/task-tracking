<?php


Route::get('/', function () {
    return view('main');
});


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