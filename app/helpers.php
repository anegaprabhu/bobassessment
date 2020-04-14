<?php

if (!function_exists('getLevelDetails')) {
    function getLevelDetails($level)
    {
        $level_info = [];
        $level_id = $level;
        if($level_id == 'Module 1')
        {
            $level_info = (object)array(
                'programme'     =>  'LITTLE BOB',
                'level'         =>  'Module 1',
                'duration'      =>  '10', // in minutes
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'MOD1',
                        'rows'          =>  2,
                        'sums'          =>  10,
                        'max_negative'  =>  0,
                        'total_time'    =>  ''
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'MOD1',
                        'rows'          =>  3,
                        'sums'          =>  10,
                        'max_negative'  =>  0,
                        'total_time'    =>  ''
                    ),
                )
            );
    
        }else if($level_id == 'Module 2'){
            $level_info = (object)array(
                'programme'     =>  'LITTLE BOB',
                'level'         =>  'Module 2',
                'duration'      =>  '10', // in minutes
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
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
                'duration'      =>  '10', // in minutes
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
        }else if($level_id == 'Module 4') {
            $level_info = (object)array(
                'programme'     =>  'LITTLE BOB',
                'level'         =>  'Module 4',
                'duration'      =>  '10', // in minutes
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'SD', 
                        'rows'          =>  5,
                        'sums'          =>  2,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'DD',
                        'rows'          =>  3,
                        'sums'          =>  2,
                        'max_negative'  =>  2
                    ),
                )
            );
    
        } else if ( $level_id == 'Level 1'){
            $level_info = (object)array(
                'programme'     =>  'BRAINOBRAIN',
                'level'         =>  'Level 1',
                'duration'      =>  '10', // in minutes
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
                'duration'      =>  '10', // in minutes
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
                        'block_name'    =>  'C',
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
                'duration'      =>  '10', // in minutes
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
                        'block_name'    =>  'C',
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
                'duration'      =>  '10', // in minutes
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
                        'block_name'    =>  'C',
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
                'duration'      =>  '10', // in minutes
                'row_blocks'    =>  array(
                    // array(
                    //     'block_name'    =>  'A',
                    //     'block_title'   =>  'Addition',
                    //     'block_subtitle'=>  'Add / Less Partner',
                    //     'digits'        =>  'DD',
                    //     'rows'          =>  4,
                    //     'sums'          =>  5,
                    //     'max_negative'  =>  4
                    // ),
                    // array(
                    //     'block_name'    =>  'B',
                    //     'block_title'   =>  'Addition',
                    //     'block_subtitle'=>  'Add / Less Partner',
                    //     'digits'        =>  'DD', 
                    //     'rows'          =>  8,
                    //     'sums'          =>  5,
                    //     'max_negative'  =>  4
                    // ),
                    // array(
                    //     'block_name'    =>  'C',
                    //     'block_title'   =>  'Multiplication',
                    //     'block_subtitle'=>  'Add / Less Partner',
                    //     'digits'        =>  'DD/SD',
                    //     'rows'          =>  1,
                    //     'sums'          =>  10,
                    //     'max_negative'  =>  0
                    // ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Division',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'TD/SD',
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
                'duration'      =>  '10', // in minutes
                'row_blocks'    =>  array(
                    // array(
                    //     'block_name'    =>  'A',
                    //     'block_title'   =>  'Addition',
                    //     'block_subtitle'=>  'Add / Less Partner',
                    //     'digits'        =>  'DD',
                    //     'rows'          =>  10,
                    //     'sums'          =>  5,
                    //     'max_negative'  =>  4
                    // ),
                    // array(
                    //     'block_name'    =>  'B',
                    //     'block_title'   =>  'Addition',
                    //     'block_subtitle'=>  'Add / Less Partner',
                    //     'digits'        =>  'TD', 
                    //     'rows'          =>  2,
                    //     'sums'          =>  5,
                    //     'max_negative'  =>  3
                    // ),
                    // array(
                    //     'block_name'    =>  'C',
                    //     'block_title'   =>  'Multiplication',
                    //     'block_subtitle'=>  'Add / Less Partner',
                    //     'digits'        =>  'DD/SD',
                    //     'rows'          =>  1,
                    //     'sums'          =>  5,
                    //     'max_negative'  =>  0
                    // ),
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
        }   
        return $level_info;
    } 
}


?>