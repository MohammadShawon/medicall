<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    protected function index(){
        $user = auth()->user();
        return view('users.appointment', compact('user'));
    }
    protected function myAppointment(){
        $user = auth()->user();
        $appointments = Appointment::where("user_id", $user->id)->get();
        return view('users.appointment-list', compact('user'), compact("appointments"));
    }
    protected function appointmentInfo($id){
        $user = auth()->user();
        $appointments = Appointment::find($id);
        $hospital = Hospital::all();
        return view('users.myappointment-info',compact('user'),compact('appointments'),compact('hospital'));
    }

    protected function makeAppointment(Request $request){
        $validator = Validator::make($request->all(), [
            "doctor_id" => "required",
            "hospital_id" => "required",
            "schedule_id" => "required",
            "schedule_date" => "required",
            "issue" => "required|string|min:50"
        ]);
        if($validator->fails()) {
            if($request->wantsJson()) {
                return response()->json($validator->errors(), 4222);
            }
            else {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }
        }
        $appointment = new Appointment();
        $appointment->doctor_id = $request->doctor_id;
        $appointment->hospital_id = $request->hospital_id;
        $appointment->schedule_id = $request->schedule_id;
        $appointment->schedule_date = $request->schedule_date;
        $appointment->issue = $request->issue;
        $appointment->user_id = auth()->user()->id;
        $appointment->save();
        return redirect("/appointment/list")->with("message", "Appointment Created");
    }
}
