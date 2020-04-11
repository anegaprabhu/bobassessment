<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use DateTime;

// use Hashids\Hashids;

class TestinstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        $student_detail = explode("_",$request->id);
        $student_id = Hashids::decode($student_detail[0])[0];
        $comp_id = $student_detail[2];
        $enc_student_id = $request->id;
        $comp_status = $student_detail[1];




        $students = [];
        if(Schema::hasTable('students')){
            $students = \DB::table('students')
                ->where('student_id',$student_id)
                ->get();
            if(count($students) > 0)
            {
                // dd($students);
            }    
        }
        
        $time_zone_now = Carbon::now($students[0]->local_timezone);
        $dt = $time_zone_now;
        $dt = new DateTime((string)$dt);
        $dt = $dt->format('Y-m-d');

        if(Hashids::decode($comp_id)[0] != null)
                {
                    $check_result = \DB::table('results')
                    ->where('student_id',$student_id)
                    ->where('competition_id',Hashids::decode($comp_id)[0])                            
                    ->whereDate('exam_date',(string)$dt)
                    ->get();
                    if(count($check_result) > 0)
                    {
                        $enc_student_id = Hashids::encode($student_id) . '_' . Hashids::encode(rand(30,50)) . '_' . $comp_id;
                        $comp_status = Hashids::encode(rand(30,50));
                    }      
                }else{

                }
                //Europe/Stockholm | Asia/Calcutta
                // $time_zone_now = Carbon::now($students[0]->local_timezone);
                $competition = \DB::table('competitions')
                    ->whereDate('start_date', '<=', $time_zone_now)
                    ->get();

                // $check_result = [];
                if(count($competition) > 0)
                {
                    $dt = $time_zone_now;
                    $dt = new DateTime((string)$dt);
                    $dt = $dt->format('Y-m-d');
                    // dd((string)$dt);
                    for($b=0;$b<count($competition);$b++)
                    {
                        // dd($competition[$b]->competition_id);
                        $check_result = \DB::table('results')
                            ->where('student_id',$students[0]->student_id)
                            ->where('competition_id',$competition[$b]->competition_id)                            
                            ->whereDate('exam_date',(string)$dt)
                            ->get();
                            // dd($check_result);
                            if(count($check_result) > 0)
                            {
                                $students[0]->exam_date = $check_result[0]->exam_date;
                                $students[0]->competition_today_status = 'Yes';
                                $students[0]->competition_id = $competition[$b]->competition_id;
                            }else{
                                $students[0]->exam_date = (string)$dt;
                                $students[0]->competition_today_status = 'No';
                                $students[0]->competition_id = $competition[$b]->competition_id;
                            }
                    }
                }else{
                    $students[0]->exam_date = null;
                    $students[0]->competition_today_status = null;
                    $students[0]->competition_id = null;
                }
    





        
        // dd(explode("_",$request->id));

        // dd($request->hdn_test_data);
        // dd( Hashids::encode('1') );
        //$student_id = base64_decode($request->id);
        $student = \DB::table('students')
            ->where('student_id',$student_id)
            ->get();
        // dd($student);
        $level_details = getLevelDetails($student[0]->level);
        $level_details = (array)$level_details;
        // dd($level_details);
        $level = $student[0]->level;
        return view('exam.test-instruction', compact('level_details','level','enc_student_id','comp_status','comp_id','student_detail'));
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
        //
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
