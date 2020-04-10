<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Auth;
use Parents;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use DateTime;



class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = [];
        if(Schema::hasTable('students')){
            $students = \DB::table('students')
                ->where('parent_id',Auth::user()->id)
                ->get();
            if(count($students) > 0)
            {
                // dd($students);
            }    
        }
        
        if(count($students) > 0){

            for($a=0;$a<count($students);$a++)
            {   
                //Europe/Stockholm | Asia/Calcutta
                $time_zone_now = Carbon::now($students[$a]->local_timezone);
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
                            ->where('student_id',$students[$a]->student_id)
                            ->where('competition_id',$competition[$b]->competition_id)                            
                            ->whereDate('exam_date',(string)$dt)
                            ->get();
                            // dd($check_result);
                            if(count($check_result) > 0)
                            {
                                $students[$a]->exam_date = $check_result[0]->exam_date;
                                $students[$a]->competition_today_status = 'Yes';
                            }else{
                                $students[$a]->exam_date = (string)$dt;
                                $students[$a]->competition_today_status = 'No';
                            }
                    }
                }
                    

            }

    


        }

            // dd(Carbon::now('HST'));
        // dd( date('d-m-Y h:m:s', strtotime($students[0]->created_at)));
        // $students[0]->test = 'sample'; 
        // dd($students);
        return view('parents',compact('students'));
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
