<?php

namespace App\Http\Controllers;

use App\District;
use App\Division;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Division functions
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeDivision(Request $request) {
        $division = new Division();
        $division->name = $request->division;
        $division->slug = str_slug($request->division, '-');
        $division->save();
        return response()->json(['message'=>'New Division Saved']);
    }

    /**
     * @param         $id
     * @param Request $request
     */
    public function updateDivision($id, Request $request) {

    }

    /**
     * @param $id
     */
    public function deleteDivision($id) {

    }

    /**
     * District functions
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function storeDistrict(Request $request) {
        $district = new District();
        $district->name = $request->district;
        $district->slug = str_slug($request->district, '-');
        $division = Division::where('name', $request->division)->first();
        $district->division_id = $division->id;
        $district->save();
        return response()->json(['message'=>'New Division Saved']);
    }

    /**
     * @param         $id
     * @param Request $request
     */
    public function updateDistrict($id, Request $request) {

    }

    /**
     * @param $id
     */
    public function deleteDistrict($id) {

    }



    public function typeAheadDivisions($query) {
        $divisions = Division::where('name', 'like', '%'.$query.'%')->take(8)->get();
        $divisions = $divisions->map(function($division){
            return $division->name;
        });
        return response()->json($divisions);
    }


    public function locations() {
        $divisions = Division::all();
        $districts = District::all();
        return view('admin.location-list', compact('divisions'), compact('districts'));
    }
}
