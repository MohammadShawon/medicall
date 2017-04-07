<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    protected function schedule(){
        $user = auth()->user();
        return view('users.myschedule',compact('user'));
    }
}
