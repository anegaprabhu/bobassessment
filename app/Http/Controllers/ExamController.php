<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


        $student_id = base64_decode($request->id);

        $student = \DB::table('students')
            ->where('student_id',$student_id)
            ->get();

        if(count($student))
        {

            $level_id = $student[0]->level;
            $student_info = (object)array(
                'student_name'  =>  'Jayaprajith V M',
                'programme'     =>  'Brainobrain',
                'level'         =>  'Level 4',
            );
    
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
        
            } else if ( $level_id == 'Level 4') {
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
        return view('exam.daily-test',compact('student_info','level_info'));
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
