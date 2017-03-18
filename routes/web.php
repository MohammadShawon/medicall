<?php


Auth::routes();

Route::get('/', 'ViewsController@index');
Route::get('/appointment', function() {
    return view('appointment');
});

Route::get('/profile', function() {
    return view('users.profile');
});


Route::get('test', 'TestController@test');
