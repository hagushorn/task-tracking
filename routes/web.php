<?php


Route::get('/', function () {
    return view('main');
});


Route::get('/executor', function () {
    return view('executor');
})->name('executor');

Route::get('executor/add',function()
{
    return view('/executorAdd');
})->name('executorAdd');