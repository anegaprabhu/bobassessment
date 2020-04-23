<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Auth;
use Paretns;
use Carbon\Carbon;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $carbon = new carbon('Asia/Calcutta');
        dd('tst');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amTime = new carbon('America/Vancouver');
        $ip = \request()->ip();
        // dd($amTime);
        return view('student.create-student');
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


        // $carbon = new carbon('Asia/Calcutta');
        // $clTime = new carbon($request->time_zone);
        // dd($carbon->tz($request->time_zone)->toDayDateTimeString());
        // dd($request->local_time);
        $current_time_stamp= Carbon::now();

        
        $parent_id = Auth::user()->id;
        $franchisee_id = Auth::user()->franchisee_id_fk;
        $local_time_zone = $request->time_zone;
        $franchisee_code = \DB::table('users')
            ->select('verification_code')
            ->where('id',$franchisee_id)
            ->get()[0]->verification_code;

        $student_exist = \DB::table('students')
            ->where('parent_id',$parent_id)
            ->where('student_name',$request->txt_student_name)
            ->get();
        if(count($student_exist) > 0)
        {
            // dd(count($student_exist));
            return redirect('parents')->with('danger','Student already exist!');;
        }else{
            $student = new Student;

            $student->franchisee_id         =   $franchisee_id;
            $student->franchisee_code       =   $franchisee_code;
            $student->parent_id             =   $parent_id;
            $student->student_name          =   $request->txt_student_name;
            $student->dob                   =   $request->txt_dob;
            $student->school_name           =   $request->txt_school_name;
            $student->grade                 =   $request->txt_std_grade;
            $student->programme             =   $request->slt_program;
            $student->level                 =   $request->slt_level;
            // $student->utc_created_on->timezone($local_time_zone)->toDateTimeString();
            $student->local_timezone        =   $local_time_zone;
            $student->local_created_on      =  Carbon::parse($request->local_time); // Carbon::now($request->local_time);
            $student->created_by            =   $parent_id;
            $student->created_at            =   $current_time_stamp;
    
            $student->save();
    
            return redirect('parents')->with('success','Student added successfully.');
        }

        // dd($request->txt_student_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show1');
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
        dd('upate');
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
