<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use User;

class FranchiseeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->id);

        $countries = \DB::table("countries")->pluck("name","id");//print_r($countries);exit;
        $states = \DB::table("states")->pluck("name","id");
        $cities = \DB::table("cities")->pluck("name","id");


        $franchisee = \DB::table('users')
            ->where('id',Auth::user()->id)
            ->get();
            // dd($franchisee);
            if($franchisee[0]->profile_status == 'N')
            {
                return view('home',compact('franchisee','countries','states','cities'));
            }else{
                $franchisee_code = $franchisee[0]->verification_code;

                $students = \DB::table('students')
                    ->where('franchisee_code',$franchisee_code)
                    ->get();

                return view('home',compact('franchisee','franchisee_code','students'));
            }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country_id = $request->slt_center_country;
        $state_id = $request->slt_center_state;
        $city_id = $request->slt_center_city;
        $area_id = $request->txt_center_area;
        $pin = $request->txt_center_pin;
        $center_name = $request->txt_business_name;
// dd($pin);
        if(Auth::user())
        {
            $franchiseeProfileUpdate =\DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['country_id' => $country_id,
                'state_id' => $state_id,
                'city_id' => $city_id,
                'area'      => $area_id,
                'postal_code'   => $pin,
                'center_name'   => $center_name,
                'profile_status'    => 'Y'
                ]);   
                // dd('test');
                return redirect('home');  
        }else{
            return redirect('home');
        }

        // dd($country_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
