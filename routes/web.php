<?php

Route::post('api-login', 'UserController@apiLogin');
Route::get('/', 'ViewsController@index');
Route::get('/appointment', function() {
    return view('appointment');
});
Route::group(['middleware'=>['user']], function (){
    /**
     * User Routes
     */
    Route::get('users', 'UserController@all');
    Route::get('profile', 'UserController@get');
    Route::post('profile', 'UserController@update');
    Route::get('user/{id}', 'UserController@get');
    Route::post('user/{id}', 'UserController@update');
});
Auth::routes();
Route::get('verify/{token}', 'UserController@verify');