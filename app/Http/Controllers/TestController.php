<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        dd(User::find(1)->prescriptionsByDoctor[0]->appointment);
    }
}
