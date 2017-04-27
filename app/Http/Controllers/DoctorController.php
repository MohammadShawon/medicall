<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Hospital;
use App\User;
use App\Appointment;
use App\UserCategory;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function doctorList() {
            $user = auth()->user();
            $users = User::where('status', 4)->get();
            return view('admin.doctor-list',compact('user'), compact('users'));
    }

    public function getNonVerified() {
        $user = auth()->user();
        $users = User::where('status', 3)->get();
        return view('admin.doctor-verify', compact('users'),compact('user'));
    }
    public function approve($id)
    {
        $user = User::find($id);
        $user->status = 4;
        $user->save();
        return response()->json([
                'message' => 'Approved'
            ]);
    }
    public function decline($id)
    {
        $user = User::find($id);
        $user->status = 2;
        $user->save();
        $doctor = $user->doctor;
        if($doctor != null ){
            $doctor->delete();
            return response()->json([
                'message' => 'Declined'
            ]);
        }

    }
    protected function myAppointment(){
        $user = auth()->user();
        $appointments = Appointment::where("doctor_id", $user->id)->get();
        return view('users.appointment-list-doctor', compact('user'), compact("appointments"));
    }

    public function application() {
        $user = auth()->user();
        if($user->status==2) {
            Session::flash('message', 'You have already requested to be a doctor.');
            return redirect()->back();
        }
        return view('users.doctor-application', compact('user'));
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'hospital' => 'required',
            'bdmo_no' => 'required|unique:doctors',
            'speciality' => 'required',
            "category" => "required"
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $doctor = new Doctor();
        $doctor->user_id = auth()->user()->id;
        $doctor->hospital_id = Hospital::where('name', $request->hospital)->first()->id;
        $doctor->bdmo_no = $request->bdmo_no;
        $doctor->speciality = $request->speciality;
        $doctor->save();
        $user = auth()->user();
        $user->status = 3;
        $user->save();

        $doctor_category = new UserCategory();
        $doctor_category->user_id = auth()->user()->id;
        $doctor_category->category_id = $request->category;
        $doctor_category->save();

        Session::flash('message', 'You application has been submitted.');
        return redirect('/');
    }


    public function get($id) {

    }

    public function update($id, Request $request) {

    }

    public function delete($id) {

    }

    public function search($hospital_id, $category_id) {
        $doctor = Doctor::where("hospital_id", $hospital_id)
            ->join("user_categories", "doctors.user_id", "=", "user_categories.user_id")
            ->where("user_categories.category_id", $category_id)
            ->with(['user', 'hospital'])->get();
        return response()->json($doctor, 200);
    }
}
