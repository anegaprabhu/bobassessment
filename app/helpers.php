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
                'instruction'   =>  'Direct Addition & Subtraction, Add & Less Partners',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Addition & Subtraction',
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
                        'instruction'   =>  'Addition & Subtraction',
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
                'instruction'   =>  'Direct Addition & Subtraction, Add & Less Partners, Add Friends',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Addition & Subtraction',
                        'digits'        =>  'MOD2',
                        'rows'          =>  2,
                        'sums'          =>  10,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Addition',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Addition & Subtraction',
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
                'instruction'   =>  'Direct Addition & Subtraction, Add & Less Partners, Add & Less Friends',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'MOD2', 
                        'rows'          =>  4,
                        'sums'          =>  10,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
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
                'instruction'   =>  'Direct Addition & Subtraction, Partners, Friends',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'SD', 
                        'rows'          =>  5,
                        'sums'          =>  10,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'DD100',
                        'rows'          =>  3,
                        'sums'          =>  10,
                        'max_negative'  =>  2
                    ),
                )
            );
    
        } else if ( $level_id == 'Level 1'){
            $level_info = (object)array(
                'programme'     =>  'BRAINOBRAIN',
                'level'         =>  'Level 1',
                'duration'      =>  '10', // in minutes
                'instruction'   =>  'Direct Addition & Subtraction, Partners, Friends',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Addition & Subtraction',
                        'digits'        =>  'Level1-SD',
                        'rows'          =>  3,
                        'sums'          =>  10,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Addition & Subtraction',
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
                'instruction'   =>  'Direct Addition & Subtraction, Partners, Friends',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'SD',
                        'rows'          =>  4,
                        'sums'          =>  10,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'MOD3-SD', 
                        'rows'          =>  5,
                        'sums'          =>  5,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'C',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
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
                'instruction'   =>  'Direct Addition & Subtraction, Partners, Friends',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'SD',
                        'rows'          =>  4,
                        'sums'          =>  5,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'SD', 
                        'rows'          =>  6,
                        'sums'          =>  5,
                        'max_negative'  =>  3
                    ),
                    array(
                        'block_name'    =>  'C',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
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
                'instruction'   =>  'Direct Addition & Subtraction, Partners, Friends, Multiplication',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'SD',
                        'rows'          =>  10,
                        'sums'          =>  5,
                        'max_negative'  =>  3
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'DD', 
                        'rows'          =>  4,
                        'sums'          =>  5,
                        'max_negative'  =>  4
                    ),
                    array(
                        'block_name'    =>  'C',
                        'block_title'   =>  'Multiplication',
                        'instruction'   =>  'Multiplication',
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
                'instruction'   =>  'Direct Addition & Subtraction, Partners, Friends, Multiplication, Division',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                    'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'DD',
                        'rows'          =>  4,
                        'sums'          =>  5,
                        'max_negative'  =>  4
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                    'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'DD', 
                        'rows'          =>  8,
                        'sums'          =>  5,
                        'max_negative'  =>  4
                    ),
                    array(
                        'block_name'    =>  'C',
                        'block_title'   =>  'Multiplication',
                        'block_subtitle'=>  'Add / Less Partner',
                    'instruction'   =>  'Multiplication',
                        'digits'        =>  'DD/SD',
                        'rows'          =>  1,
                        'sums'          =>  10,
                        'max_negative'  =>  0
                    ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Division',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Division',
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
                'instruction'   =>  'Direct Addition & Subtraction, Partners, Friends, Multiplication, Division',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                    'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'DD',
                        'rows'          =>  10,
                        'sums'          =>  5,
                        'max_negative'  =>  4
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                    'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'TD', 
                        'rows'          =>  2,
                        'sums'          =>  5,
                        'max_negative'  =>  3
                    ),
                    array(
                        'block_name'    =>  'C',
                        'block_title'   =>  'Multiplication',
                    'instruction'   =>  'Multiplication',
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
                    ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Division',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Division',
                        'digits'        =>  'TD/SD',
                        'rows'          =>  1,
                        'sums'          =>  5,
                        'max_negative'  =>  0
                    ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Division',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Division',
                        'digits'        =>  'FD/SD',
                        'rows'          =>  1,
                        'sums'          =>  10,
                        'max_negative'  =>  0
                    )
                )
            );
        } else if ( $level_id == 'Level 7') {
            $level_info = (object)array(
                'programme'     =>  'BRAINOBRAIN',
                'level'         =>  'Level 7',
                'duration'      =>  '10', // in minutes
                'instruction'   =>  'Direct Addition & Subtraction, Partners, Friends, Multiplication, Division',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'DD',
                        'rows'          =>  5,
                        'sums'          =>  5,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                        'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'TD',
                        'rows'          =>  5,
                        'sums'          =>  5,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'c',
                        'block_title'   =>  'Addition',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Addition & Subtraction',
                        'digits'        =>  'singleDigitDecimal',
                        'rows'          =>  5,
                        'sums'          =>  10,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Multiplication',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Multiplication',
                        'digits'        =>  'DD/SD',
                        'rows'          =>  1,
                        'sums'          =>  5,
                        'max_negative'  =>  0
                    ),
                    array(
                        'block_name'    =>  'E',
                        'block_title'   =>  'Multiplication',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Multiplication',
                        'digits'        =>  'TD/SD',
                        'rows'          =>  1,
                        'sums'          =>  5,
                        'max_negative'  =>  0
                    ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Division',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Division',
                        'digits'        =>  'FD/SD',
                        'rows'          =>  1,
                        'sums'          =>  10,
                        'max_negative'  =>  0
                    ),


                )
            );
        } else if ( $level_id == 'Level 8') {
            $level_info = (object)array(
                'programme'     =>  'BRAINOBRAIN',
                'level'         =>  'Level 8',
                'duration'      =>  '10', // in minutes
                'instruction'   =>  'Direct Addition & Subtraction, Partners, Friends, Decimals, Multiplication, Division',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                    'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'TD',
                        'rows'          =>  3,
                        'sums'          =>  5,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                    'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'DD',
                        'rows'          =>  6,
                        'sums'          =>  5,
                        'max_negative'  =>  3
                    ),
                    array(
                        'block_name'    =>  'c',
                        'block_title'   =>  'Addition',
                    'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'singleDigitDecimalWithoutLessThanOne',
                        'rows'          =>  5,
                        'sums'          =>  10,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Multiplication',
                        'block_subtitle'=>  'Add / Less Partner',
                    'instruction'   =>  'Multiplication',
                        'digits'        =>  'DD/DD',
                        'rows'          =>  1,
                        'sums'          =>  10,
                        'max_negative'  =>  0
                    ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Division',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Division',
                        'digits'        =>  'DD/DD',
                        'rows'          =>  1,
                        'sums'          =>  5,
                        'max_negative'  =>  0
                    ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Division',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Division',
                        'digits'        =>  'TD/DD',
                        'rows'          =>  1,
                        'sums'          =>  5,
                        'max_negative'  =>  0
                    ),


                )
            );
        } else if ( $level_id == 'Level 9') {
            $level_info = (object)array(
                'programme'     =>  'BRAINOBRAIN',
                'level'         =>  'Level 9',
                'duration'      =>  '10', // in minutes
                'instruction'   =>  'Direct Addition & Subtraction, Partners, Friends, Decimals, Multiplication, Division',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                    'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'DD',
                        'rows'          =>  5,
                        'sums'          =>  5,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                    'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'TD',
                        'rows'          =>  4,
                        'sums'          =>  5,
                        'max_negative'  =>  3
                    ),
                    array(
                        'block_name'    =>  'C',
                        'block_title'   =>  'Addition',
                    'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'singleDoubleDigitDecimalWithoutLessThanOne',
                        'rows'          =>  5,
                        'sums'          =>  10,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Multiplication',
                        'block_subtitle'=>  'Add / Less Partner',
                    'instruction'   =>  'Multiplication',
                        'digits'        =>  'TD/DD',
                        'rows'          =>  1,
                        'sums'          =>  10,
                        'max_negative'  =>  0
                    ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Division',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Division',
                        'digits'        =>  'FD/DD',
                        'rows'          =>  1,
                        'sums'          =>  5,
                        'max_negative'  =>  0
                    ),


                )
            );
        } else if ( $level_id == 'Level 10') {
            $level_info = (object)array(
                'programme'     =>  'BRAINOBRAIN',
                'level'         =>  'Level 10',
                'duration'      =>  '10', // in minutes
                'instruction'   =>  'Direct Addition & Subtraction, Partners, Friends, Decimals, Multiplication, Division',
                'row_blocks'    =>  array(
                    array(
                        'block_name'    =>  'A',
                        'block_title'   =>  'Addition',
                    'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'DD',
                        'rows'          =>  10,
                        'sums'          =>  5,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'B',
                        'block_title'   =>  'Addition',
                    'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'TD',
                        'rows'          =>  5,
                        'sums'          =>  5,
                        'max_negative'  =>  3
                    ),
                    array(
                        'block_name'    =>  'C',
                        'block_title'   =>  'Addition',
                    'instruction'   =>  'Addition & Subtraction',
                        'block_subtitle'=>  'Add / Less Partner',
                        'digits'        =>  'doubleDigitDecimalWithoutLessThanOne',
                        'rows'          =>  5,
                        'sums'          =>  10,
                        'max_negative'  =>  2
                    ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Multiplication',
                        'block_subtitle'=>  'Add / Less Partner',
                    'instruction'   =>  'Multiplication',
                        'digits'        =>  'TD/DD',
                        'rows'          =>  1,
                        'sums'          =>  10,
                        'max_negative'  =>  0
                    ),
                    array(
                        'block_name'    =>  'D',
                        'block_title'   =>  'Division',
                        'block_subtitle'=>  'Add / Less Partner',
                        'instruction'   =>  'Division',
                        'digits'        =>  'FiD/DD',
                        'rows'          =>  1,
                        'sums'          =>  10,
                        'max_negative'  =>  0
                    ),


                )
            );
        }  

        return $level_info;
    } 
}


?>