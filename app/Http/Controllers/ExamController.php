<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use DateTime;



class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        // dd($request->id);
        $student_detail = explode("_",$request->id);
        $student_id = Hashids::decode($student_detail[0])[0];
        $comp_id = $student_detail[2];
        $enc_student_id = $request->id;
        $comp_status = $student_detail[1];


        // dd(explode("_",$request->id));


        $student_id = Hashids::decode($student_detail[0])[0];

        $student = \DB::table('students')
            ->where('student_id',$student_id)
            ->get();
        // dd(count($student));


        $time_zone_now = Carbon::now($student[0]->local_timezone);
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
                        $student_detail = explode('_',$enc_student_id);
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
                            ->where('student_id',$student[0]->student_id)
                            ->where('competition_id',$competition[$b]->competition_id)                            
                            ->whereDate('exam_date',(string)$dt)
                            ->get();
                            // dd($check_result);
                            if(count($check_result) > 0)
                            {
                                $student[0]->exam_date = $check_result[0]->exam_date;
                                $student[0]->competition_today_status = 'Yes';
                                $student[0]->competition_id = $competition[$b]->competition_id;
                            }else{
                                $student[0]->exam_date = (string)$dt;
                                $student[0]->competition_today_status = 'No';
                                $student[0]->competition_id = $competition[$b]->competition_id;
                            }
                    }
                }else{
                    $student[0]->exam_date = null;
                    $student[0]->competition_today_status = null;
                    $student[0]->competition_id = null;
                }




        if(count($student) > 0)
        {

            $level_id = $student[0]->level;
            $student_info = (object)array(
                'student_name'  =>  'Jayaprajith V M',
                'programme'     =>  'Brainobrain',
                'level'         =>  'Level 4',
            );
    // dd($level_id);

            if($level_id == 'Module 1')
            {
                $level_info = (object)array(
                    'programme'     =>  'LITTLE BOB',
                    'level'         =>  'Module 1',
                    'row_blocks'    =>  array(
                        array(
                            'block_name'    =>  'D',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'MOD1',
                            'rows'          =>  2,
                            'sums'          =>  10,
                            'max_negative'  =>  0
                        ),
                        array(
                            'block_name'    =>  'D',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'MOD1',
                            'rows'          =>  3,
                            'sums'          =>  10,
                            'max_negative'  =>  0
                        ),
                    )
                );
        
            }else if($level_id == 'Module 2'){
                $level_info = (object)array(
                    'programme'     =>  'LITTLE BOB',
                    'level'         =>  'Module 2',
                    'row_blocks'    =>  array(
                        array(
                            'block_name'    =>  'D',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'MOD2',
                            'rows'          =>  2,
                            'sums'          =>  10,
                            'max_negative'  =>  2
                        ),
                        array(
                            'block_name'    =>  'D',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'MOD2',
                            'rows'          =>  3,
                            'sums'          =>  10,
                            'max_negative'  =>  2
                        ),
                    )
                );
            }else if($level_id == 'Module 3') {
                $level_info = (object)array(
                    'programme'     =>  'LITTLE BOB',
                    'level'         =>  'Module 3',
                    'row_blocks'    =>  array(
                        array(
                            'block_name'    =>  'A',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'MOD2', 
                            'rows'          =>  4,
                            'sums'          =>  10,
                            'max_negative'  =>  2
                        ),
                        array(
                            'block_name'    =>  'B',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'MOD3-SD',
                            'rows'          =>  4,
                            'sums'          =>  10,
                            'max_negative'  =>  2
                        ),
                    )
                );
        
            } else if ( $level_id == 'Level 1'){
                $level_info = (object)array(
                    'programme'     =>  'BRAINOBRAIN',
                    'level'         =>  'Level 1',
                    'row_blocks'    =>  array(
                        array(
                            'block_name'    =>  'A',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'Level1-SD',
                            'rows'          =>  3,
                            'sums'          =>  10,
                            'max_negative'  =>  2
                        ),
                        array(
                            'block_name'    =>  'B',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'Level1-SD',
                            'rows'          =>  5,
                            'sums'          =>  10,
                            'max_negative'  =>  3
                        ),
                    )
                );
        
            } else if ( $level_id == 'Level 2') {
                $level_info = (object)array(
                    'programme'     =>  'BRAINOBRAIN',
                    'level'         =>  'Level 2',
                    'row_blocks'    =>  array(
                        array(
                            'block_name'    =>  'A',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'SD',
                            'rows'          =>  4,
                            'sums'          =>  10,
                            'max_negative'  =>  2
                        ),
                        array(
                            'block_name'    =>  'B',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'MOD3-SD', 
                            'rows'          =>  5,
                            'sums'          =>  5,
                            'max_negative'  =>  2
                        ),
                        array(
                            'block_name'    =>  'D',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'Level2-SD-2DD-Top',
                            'rows'          =>  5,
                            'sums'          =>  5,
                            'max_negative'  =>  3
                        )
                    )
                );
        
            } else if ( $level_id == 'Level 3') {
                $level_info = (object)array(
                    'programme'     =>  'BRAINOBRAIN',
                    'level'         =>  'Level 3',
                    'row_blocks'    =>  array(
                        array(
                            'block_name'    =>  'A',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'SD',
                            'rows'          =>  4,
                            'sums'          =>  5,
                            'max_negative'  =>  2
                        ),
                        array(
                            'block_name'    =>  'B',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'SD', 
                            'rows'          =>  6,
                            'sums'          =>  5,
                            'max_negative'  =>  3
                        ),
                        array(
                            'block_name'    =>  'D',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'MOD3-SD',
                            'rows'          =>  3,
                            'sums'          =>  10,
                            'max_negative'  =>  3
                        )
                    )
                );
    
            } else if ( $level_id == 'Level 4') {
                $level_info = (object)array(
                    'programme'     =>  'BRAINOBRAIN',
                    'level'         =>  'Level 4',
                    'row_blocks'    =>  array(
                        array(
                            'block_name'    =>  'A',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'SD',
                            'rows'          =>  10,
                            'sums'          =>  5,
                            'max_negative'  =>  3
                        ),
                        array(
                            'block_name'    =>  'B',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'DD', 
                            'rows'          =>  4,
                            'sums'          =>  5,
                            'max_negative'  =>  4
                        ),
                        array(
                            'block_name'    =>  'D',
                            'block_title'   =>  'Multiplication',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'DD/SD',
                            'rows'          =>  1,
                            'sums'          =>  10,
                            'max_negative'  =>  0
                        )
                    )
                );
    
            } else if ( $level_id == 'Level 5') {
                $level_info = (object)array(
                    'programme'     =>  'BRAINOBRAIN',
                    'level'         =>  'Level 5',
                    'row_blocks'    =>  array(
                        array(
                            'block_name'    =>  'A',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'DD',
                            'rows'          =>  4,
                            'sums'          =>  5,
                            'max_negative'  =>  4
                        ),
                        array(
                            'block_name'    =>  'B',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'DD', 
                            'rows'          =>  8,
                            'sums'          =>  5,
                            'max_negative'  =>  4
                        ),
                        array(
                            'block_name'    =>  'D',
                            'block_title'   =>  'Multiplication',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'DD/SD',
                            'rows'          =>  1,
                            'sums'          =>  10,
                            'max_negative'  =>  0
                        )
                    )
                );
    
            } else if ( $level_id == 'Level 6') {
                $level_info = (object)array(
                    'programme'     =>  'BRAINOBRAIN',
                    'level'         =>  'Level 6',
                    'row_blocks'    =>  array(
                        array(
                            'block_name'    =>  'A',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'DD',
                            'rows'          =>  10,
                            'sums'          =>  5,
                            'max_negative'  =>  4
                        ),
                        array(
                            'block_name'    =>  'B',
                            'block_title'   =>  'Addition',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'TD', 
                            'rows'          =>  2,
                            'sums'          =>  5,
                            'max_negative'  =>  3
                        ),
                        array(
                            'block_name'    =>  'C',
                            'block_title'   =>  'Multiplication',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'DD/SD',
                            'rows'          =>  1,
                            'sums'          =>  5,
                            'max_negative'  =>  0
                        ),
                        array(
                            'block_name'    =>  'D',
                            'block_title'   =>  'Multiplication',
                            'block_subtitle'=>  'Add / Less Partner',
                            'digits'        =>  'TD/SD',
                            'rows'          =>  1,
                            'sums'          =>  5,
                            'max_negative'  =>  0
                        )
                    )
                );
    
            }else{
                // dd('here');
                return view('parents');
            }

        }else{
            return view('parents');
        }




        // {

        //     $level_info = (object)array(
        //         'programme'     =>  'Brainobrain',
        //         'level'         =>  'Level 4',
        //         'row_blocks'    =>  array(
        //             array(
        //                 'block_name'    =>  'A',
        //                 'block_title'   =>  'Addition',
        //                 'block_subtitle'=>  'Single Digit',
        //                 'digits'        =>  'SD',
        //                 'rows'          =>  2,
        //                 'sums'          =>  5,
        //                 'max_negative'  =>  2
        //             ),
        //             array(
        //                 'block_name'    =>  'B',
        //                 'block_title'   =>  'Addition',
        //                 'block_subtitle'=>  'Double Digit',
        //                 'digits'        =>  'DD',
        //                 'rows'          =>  4,
        //                 'sums'          =>  5,
        //                 'max_negative'  =>  3
        //             ),
        //             array(
        //                 'block_name'    =>  'C',
        //                 'block_title'   =>  'Addition',
        //                 'block_subtitle'=>  'Single / Double Digit',
        //                 'digits'        =>  'SD/DD',
        //                 'rows'          =>  3,
        //                 'sums'          =>  5,
        //                 'max_negative'  =>  1
        //             ),
        //             array(
        //                 'block_name'    =>  'D',
        //                 'block_title'   =>  'Addition',
        //                 'block_subtitle'=>  'Add / Less Partner',
        //                 'digits'        =>  'MOD1',
        //                 'rows'          =>  2,
        //                 'sums'          =>  2,
        //                 'max_negative'  =>  0
        //             ),
        //             array(
        //                 'block_name'    =>  'D',
        //                 'block_title'   =>  'Addition',
        //                 'block_subtitle'=>  'Add / Less Partner',
        //                 'digits'        =>  'MOD2',
        //                 'rows'          =>  2,
        //                 'sums'          =>  10,
        //                 'max_negative'  =>  2
        //             ),
        //             array(
        //                 'block_name'    =>  'D',
        //                 'block_title'   =>  'Addition',
        //                 'block_subtitle'=>  'Add / Less Partner',
        //                 'digits'        =>  'MOD2',
        //                 'rows'          =>  3,
        //                 'sums'          =>  10,
        //                 'max_negative'  =>  2
        //             ),
        //             array(
        //                 'block_name'    =>  'D',
        //                 'block_title'   =>  'Addition',
        //                 'block_subtitle'=>  'Add / Less Partner',
        //                 'digits'        =>  'MOD3-SD', 
        //                 'rows'          =>  4,
        //                 'sums'          =>  10,
        //                 'max_negative'  =>  2
        //             ),
        //             array(
        //                 'block_name'    =>  'D',
        //                 'block_title'   =>  'Addition',
        //                 'block_subtitle'=>  'Add / Less Partner',
        //                 'digits'        =>  'Level1-SD',
        //                 'rows'          =>  3,
        //                 'sums'          =>  10,
        //                 'max_negative'  =>  2
        //             ),
        //             array(
        //                 'block_name'    =>  'D',
        //                 'block_title'   =>  'Addition',
        //                 'block_subtitle'=>  'Add / Less Partner',
        //                 'digits'        =>  'Level1-SD',
        //                 'rows'          =>  5,
        //                 'sums'          =>  10,
        //                 'max_negative'  =>  3
        //             ),
        //             array(
        //                 'block_name'    =>  'D',
        //                 'block_title'   =>  'Addition',
        //                 'block_subtitle'=>  'Add / Less Partner',
        //                 'digits'        =>  'Level2-SD-2DD-Top',
        //                 'rows'          =>  5,
        //                 'sums'          =>  5,
        //                 'max_negative'  =>  3
        //             ),
        //             array(
        //                 'block_name'    =>  'D',
        //                 'block_title'   =>  'Multiplication',
        //                 'block_subtitle'=>  'Double Digit and Single Digit',
        //                 'digits'        =>  'DD/SD',
        //                 'rows'          =>  1,
        //                 'sums'          =>  5,
        //                 'max_negative'  =>  0
        //             ),
        //             array(
        //                 'block_name'    =>  'D',
        //                 'block_title'   =>  'Multiplication',
        //                 'block_subtitle'=>  'Triple Digit and Single Digit',
        //                 'digits'        =>  'TD/SD',
        //                 'rows'          =>  1,
        //                 'sums'          =>  5,
        //                 'max_negative'  =>  0
        //             ),
        //             array(
        //                 'block_name'    =>  'D',
        //                 'block_title'   =>  'Multiplication',
        //                 'block_subtitle'=>  'Double Digit and Double Digit',
        //                 'digits'        =>  'DD/DD',
        //                 'rows'          =>  1,
        //                 'sums'          =>  5,
        //                 'max_negative'  =>  0
        //             ),
        //             array(
        //                 'block_name'    =>  'D',
        //                 'block_title'   =>  'Multiplication',
        //                 'block_subtitle'=>  'Triple Digit and Double Digit',
        //                 'digits'        =>  'TD/DD',
        //                 'rows'          =>  1,
        //                 'sums'          =>  5,
        //                 'max_negative'  =>  0
        //             )
        //         )  
        //             );
    
 
        // }
        
 
        // $student_info = (object)array(
        //     'student_name'      =>      'Jayaprajith V M',
        //     'programme'         =>      'brainobrain',
        //     'level'             =>      'level 3',
        //     'addition'          =>  array(
        //         'title'         => 'Addition / Substraction',
        //         'max_negative'  =>  4,
        //         'sets'          =>  array(
        //             array(
        //                 'set'   =>  1,
        //                 'digits' =>  'SD',
        //                 'rows'   =>  10,
        //                 'sums'   => 5   
        //             ),
        //             array(
        //                 'set'   =>  2,
        //                 'digits' =>  'DD',
        //                 'rows'   =>  5,
        //                 'sums'   => 5   
        //             ),
        //             array(
        //                 'set'   =>  3,
        //                 'digits' =>  'SD/DD',
        //                 'rows'   =>  10,
        //                 'sums'   => 5   
        //             ),
        //         )
        //     ),
        //     'multiplication'    =>  array(
        //         'title'         => 'Multiplication',
        //         'max_negative'  =>  3,
        //         'sets'          =>  array(
        //             array(
        //                 'set'   =>  1,
        //                 'digits' =>  'DD/DD',
        //                 'rows'   =>  6,
        //                 'sums'   => 5   
        //             ),
        //             array(
        //                 'set'   =>  2,
        //                 'digits' =>  'TD/DD',
        //                 'rows'   =>  6,
        //                 'sums'   => 5   
        //             ),
        //         )    
        //     ),     
        // );


        // $student_info = (object)[
        //     'student_name'      =>      'Jayaprajith V M',
        //     'programme'         =>      'brainobrain',
        //     'level'             =>      'level 3',
        //     'addition'          =>     
        //                                     'sets'   =>  [
        //                                         '0' => [
        //                                             'set'   =>  1,
        //                                             'digit' =>  'SD',
        //                                             'row'   =>  10
        //                                         ],
        //                                         '1' => [
        //                                             'set'   =>  2,
        //                                             'digit' =>  'DD',
        //                                             'row'   =>  5
        //                                         ]
        //                                     ]  , 
                                    
        //     'digits'        =>      'SD',
        //     'row'           =>
        // ]];    
        $level_info = getLevelDetails($level_id);

        return view('exam.daily-test',compact('student_info','level_info','student_detail'));
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
        $student_details = explode("_",$request->hdn_test_st_store);
        $test_data = json_decode($request->hdn_test_data_store,true);
        $comp_id = $student_details[2];

        // dd($test_data);

        $student = \DB::table('students')
            ->where('student_id',Hashids::decode( $student_details[0] )[0])
            ->get();


        $time_zone_now = Carbon::now($student[0]->local_timezone);



        $dt = $time_zone_now;
        $dt = new DateTime((string)$dt);
        $dt = $dt->format('Y-m-d');


        $check_result = \DB::table('results')
        ->where('student_id',Hashids::decode( $student_details[0] )[0])
        ->where('competition_id',Hashids::decode( $student_details[2] )[0])                            
        ->whereDate('exam_date',(string)$dt)
        ->get();
        if(count($check_result) > 0)
        {
            $enc_student_id = Hashids::encode(Hashids::decode( $student_details[0] )[0]) . '_' . Hashids::encode(rand(30,50)) . '_' . $comp_id;
            $student_detail = explode('_',$enc_student_id);
            $comp_status = Hashids::encode(rand(30,50));
        }else{
            $result = new Result;
            $result->student_id = Hashids::decode( $student_details[0] )[0];
            $result->competition_id = Hashids::decode( $student_details[2] )[0];
            $result->exam_date  = '2020-04-11';   
            $result->exam_data = $request->hdn_test_data_store;
            $result->save();
        }      

        return view('exam.test-review',compact('test_data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // dd($request->hdn_test_data[0]);
        // dd($request->hdn_test_data);
        $test_data = json_decode($request->hdn_test_data,true);
        // dd($test_data);
        return view('exam.test-review',compact('test_data'));
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
