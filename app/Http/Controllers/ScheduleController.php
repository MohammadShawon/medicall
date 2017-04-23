<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Schedule;
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
                'hospitals' => 'required',
                'day'     => 'required',
                'fromTime'  => 'required',
                'toTime'  => 'required',
                'limit'  => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $schedule = new Schedule();
        $schedule->hospital_id = Hospital::where('name', $request->hospital)->first()->id;
        $schedule->day = $request->day;
        $schedule->time_from = $request->fromTime;
        $schedule->time_to = $request->toTime;
        $schedule->limit = $request->limit;
        $schedule->save();
        return response()->json([
            'message' => 'Schedule added',
            'schedule' => $schedule
        ]);
    }
}
