<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected function index() {
        $user = auth()->user();
        return view('admin.index',compact('user'));
    }
    protected function doctorList() {
        $user = auth()->user();
        return view('admin.doctor-list',compact('user'));
    }
    protected function patientList() {
        $user = auth()->user();
        return view('admin.patient-list',compact('user'));
    }

    protected function verify() {
        $user = auth()->user();
        return view('admin.doctor-verify',compact('user'));
    }
    protected function category() {
        $user = auth()->user();
        return view('admin.category',compact('user'));
    }
    protected function locations() {
        $user = auth()->user();
        return view('admin.location-list',compact('user'));
    }
    protected function hospitals() {
        $user = auth()->user();
        return view('admin.hospital-list',compact('user'));
    }
}
