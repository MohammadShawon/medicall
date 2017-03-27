<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function typeAhead($query) {
        $query==null && $query = 'a';
        $hospitals = Hospital::where('name', 'like', '%'.$query.'%')->take(8)->get();
        $hospitals = $hospitals->map(function ($hospital){
            return $hospital->name;
        });
        return response()->json($hospitals);
    }
}
