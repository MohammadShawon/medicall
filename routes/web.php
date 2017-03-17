<?php


Auth::routes();

Route::get('/', 'ViewsController@index');
Route::get('/appointment', function() {
    return view('appointment');
});

