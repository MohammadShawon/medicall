<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected function index(){
        $user = auth()->user();
        return view('users.appointment', compact('user'));
    }
    protected function myAppointment(){
        $user = auth()->user();
        return view('users.appointment-list',compact('user'));
    }
    protected function appointmentInfo(){
        $user = auth()->user();
        return view('users.myappointment-info',compact('user'));
    }
}
