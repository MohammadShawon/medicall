<?php

Auth::routes();
Route::post('api-login', 'UserController@apiLogin');
Route::get('/', 'ViewsController@index');
Route::get('/appointment', function() {
    return view('appointment');
});
Route::group(['middleware'=>['user']], function (){
    Route::get('/profile', function() {
        return view('users.profile');
    });
    /**
     * User Routes
     */
    Route::get('users', 'UserController@all');
    Route::get('user/{id}', 'UserController@get');
});