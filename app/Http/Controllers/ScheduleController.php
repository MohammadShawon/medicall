<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
                'hospital' => 'required',
                'day'      => 'required',
                'fromTime' => 'required',
                'toTime'   => 'required',
                'limit'    => 'required'
            ]
        );
        if ($validator->fails()) {
            if ($request->wantsJson())
                return response()->json($validator->errors(), 422);
            else
                return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $schedule = new Schedule();
        $schedule->doctor_id = auth()->user()->id;
        $schedule->hospital_id = Hospital::where('name', $request->hospital)->first()->id;
        $schedule->room_no = $request->room_no;
        $schedule->day = $request->day;
        $schedule->time_from = $request->fromTime;
        $schedule->time_to = $request->toTime;
        $schedule->max_limit = $request->limit;
        $schedule->save();
        if ($request->wantsJson())
            return response()->json([
                'message'  => 'Schedule added',
                'schedule' => $schedule
            ]);

        return redirect()->back()->with("message", "Schedule added");
    }

    public function getSchedule($doctor_id, $hospital_id) {
        $schedule = Schedule::where("doctor_id", $doctor_id)->where("hospital_id", $hospital_id)->get();
        return response()->json($schedule, 200);
    }
}
