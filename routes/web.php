<?php

Route::post('api-login', 'UserController@apiLogin');
Route::get('/', 'ViewsController@index');
Route::get('/Admin', 'AdminController@index');
Route::get('/doctorlist', 'AdminController@doctorlist');
Route::get('/patientlist', 'AdminController@patientlist');
Route::get('/category', 'AdminController@category');
Route::get('/hospitals', 'AdminController@hospitals');
Route::get('/verify', 'AdminController@verify');
Route::get('/appointment', function() {
    return view('users.appointment');
});
Route::group(['middleware'=>['user']], function (){
    /**
     * User Routes
     */
    Route::get('users', 'UserController@all');
    Route::get('profile', 'UserController@get');
    Route::post('profile', 'UserController@update');

    /**
     * Doctor routes [application]
     */
    Route::get('doctors/request', 'DoctorController@application');
    Route::post('doctors/request', 'DoctorController@store');

    Route::get('hospitals/typeahead/q={query}', 'HospitalController@typeAhead');
});

Route::group(['middleware' => ['admin'], 'prefix'=>'admin'], function (){
    /**
     * Admin Routes
     */
    Route::get('user/{id}', 'UserController@get');
    Route::post('user/{id}', 'UserController@update');
    Route::post('doctors/request', 'DoctorController@store');

    /**
     * Manage Area
     */
    Route::get('locations', 'AreaController@locations');
    Route::post('/divisions/add', 'AreaController@storeDivision');
    Route::post('/districts/add', 'AreaController@storeDistrict');

    Route::get('/divisions/typeahead/q={query}', 'AreaController@typeAheadDivisions');

    /**
     * Manage Hospitals
     */

    Route::post('/hospitals/add', 'HospitalController@store');
});


Auth::routes();
Route::get('verify/{token}', 'UserController@verify');
Route::get('profile', 'UserController@index');
Route::get('appointment', 'UserController@appointment');
Route::get('schedule', 'UserController@schedule');
Route::get('myappointment', 'UserController@myappointment');
Route::get('myappointmentinfo', 'UserController@appointmentinfo');
Route::get('msg', 'MessageController@test');