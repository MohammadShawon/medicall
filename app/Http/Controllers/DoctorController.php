<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function getVerified() {

    }

    public function getNonVerified() {

    }
    public function approve() {

    }
    public function decline() {

    }

    public function application() {
        $user = auth()->user();
        return view('users.doctor-application', compact('user'));
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'hospital_id' => 'required',
            'bdmo_no' => 'required|unique:doctors',
            'speciality' => 'required'
        ]);
        if($validator->fails()) {
            return redirect()->withErrors($validator->errors())->withInput();
        }
        $doctor = new Doctor();
        $doctor->user_id = auth()->user()->id;
        $doctor->hospital_id = $request->hospital_id;
        $doctor->bdmo_no = $request->bdmo_no;
        $doctor->speciality = $request->speciality;
        $doctor->save();
        $user = auth()->user();
        $user->status = 2;
        $user->save();
        Session::flash('message', 'You application has been submitted.');
        return redirect('/');
    }

    public function get($id) {

    }

    public function update($id, Request $request) {

    }

    public function delete($id) {

    }
}
