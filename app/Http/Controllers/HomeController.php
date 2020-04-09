<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    { //dd($request);
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getStateList(Request $request)
    {
        // dd($request->country_id);
        $states = \DB::table("states")
                    ->where("country_id",$request->country_id)
                    ->pluck("name","id");
        if($states->isNotEmpty()){
            return response()->json($states);
        }                      
    }# getStateList Ends


    public function getCityList(Request $request)
    {
        $cities = \DB::table("cities")
                    ->where("state_id",$request->state_id)
                    ->pluck("name","id");
        if($cities->isNotEmpty()){            
            return response()->json($cities);
        }
    }# getCityList Ends



}
