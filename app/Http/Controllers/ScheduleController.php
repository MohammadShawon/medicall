<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    protected function schedule(){
        $user = auth()->user();
        $hospitals = Hospital::all();
        return view('users.myschedule',compact('user'),compact('hospitals'));
    }
    protected function scheduleList(){
        $hospitals = Hospital::all();
        return view('users.schedule-list',compact('user'),compact('hospitals'));
    }

    public function typeAhead($query) {
        $query==null && $query = 'a';
        $hospitals = Hospital::where('name', 'like', '%'.$query.'%')->take(8)->get();
        $hospitals = $hospitals->map(function ($hospital){
            return $hospital->name;
        });
        return response()->json($hospitals);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
                'district' => 'required',
                'division'     => 'required',
                'hospital'  => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $hospital = new Hospital();
        $hospital->name = $request->hospital;
        $hospital->slug = str_slug($request->hospital);
        $hospital->district_id = $request->district;
        $hospital->division_id = $request->division;
        $hospital->save();
        return response()->json([
            'message' => 'Hospital added',
            'hospital' => $hospital
        ]);
    }
}
