<?php

Route::post('api-login', 'UserController@apiLogin');
Route::get('/', 'ViewsController@index');

Route::group(['middleware'=>['user']], function () {

    /**
     * Verify Mail
     */

    /**
     * User Routes
     */
    Route::get('users', 'UserController@all');
    Route::get('profile', 'UserController@get');
    Route::post('profile', 'UserController@update');

    /**
     * Doctor routes [application]
     */
    Route::get('doctors/apply', 'DoctorController@application');
    Route::post('doctors/apply', 'DoctorController@store');


    Route::get('hospitals/typeahead/q={query}', 'HospitalController@typeAhead');

    Route::get("hospitals/{hospital}/location", "HospitalController@location");

    /**
     * Messages
     */
    Route::get('/messages', 'MessageController@messages');

    Route::get("categories", "CategoryController@categories");

    Route::get("doctors/find/hospital/{hospital}/category/{category}", "DoctorController@search");

    Route::get("schedule/doctor/{doctor_id}/hospital/{hospital_id}", "ScheduleController@getSchedule");


    /**
     * Appointment
     */
    Route::get('appointment', 'AppointmentController@index');
    Route::post('appointment/make', 'AppointmentController@makeAppointment');
    Route::get('appointment/list', 'AppointmentController@myAppointment');
    Route::get('appointment/{id}/info', 'AppointmentController@appointmentInfo');
});

Route::group(['middleware' => ['doctor']], function(){
    /**
     * Schedules
     */
    Route::get('schedule', 'ScheduleController@schedule');
    Route::post('schedule', 'ScheduleController@store');

    Route::get('schedule/list', 'ScheduleController@scheduleList');



});

Route::group(['middleware' => ['admin'], 'prefix'=>'admin'], function (){
    /**
     * Admin Routes
     */
    Route::get('/', 'AdminController@index');

    /**
     * User Management
     */
    Route::get('user/{id}', 'UserController@get');
    Route::post('user/{id}', 'UserController@update');

    /**
     * Doctor management
     */
    Route::get('doctor/verify', 'DoctorController@getNonVerified');
    Route::post('doctor/{id}/approve', 'DoctorController@approve');
    Route::post('doctor/{id}/decline', 'DoctorController@decline');
    Route::get('doctors/list', 'DoctorController@doctorList');

    /**
     * Manage Area
     */
    Route::get('locations', 'AreaController@locations');
    Route::post('divisions/add', 'AreaController@storeDivision');
    Route::post('districts/add', 'AreaController@storeDistrict');
    Route::get('divisions/{division_id}/districts', 'AreaController@getDistricts');
    Route::get('divisions/typeahead/q={query}', 'AreaController@typeAheadDivisions');

    /**
     * Manage Hospitals
     */
    Route::get('hospitals', 'HospitalController@hospitals');
    Route::post('hospitals/add', 'HospitalController@store');


    Route::get('patients/list', 'AdminController@patientList');
    Route::get('category', 'CategoryController@category');
    Route::post('category/delete/{id}', 'CategoryController@delete');
    Route::post('category/add', 'CategoryController@storeCategory');

});

Auth::routes();

Route::get('verify/{token}', 'UserController@verifyUser');




//dd($userstatus);




/**
 * Test Routes
 */
Route::get('msg', 'MessageController@test');