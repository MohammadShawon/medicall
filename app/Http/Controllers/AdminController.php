<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected function index() {
        $user = auth()->user();
        return view('Admin.index',compact('user'));
    }
    protected function patientlist() {
        $user = auth()->user();
        return view('Admin.patient-list',compact('user'));
    }

    protected function doctorlist() {
        $user = auth()->user();
        return view('Admin.doctor-list',compact('user'));
    }

    protected function verify() {
        $user = auth()->user();
        return view('Admin.doctor-verify',compact('user'));
    }
    protected function category() {
        $user = auth()->user();
        return view('Admin.category',compact('user'));
    }
    protected function locations() {
        $user = auth()->user();
        return view('Admin.location-list',compact('user'));
    }
    protected function hospitals() {
        $user = auth()->user();
        return view('Admin.hospital-list',compact('user'));
    }
}
