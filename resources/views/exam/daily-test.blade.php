@extends('layouts.app') 

@section('title', 'Page Title') 


@section('sidebar')
 @parent     

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

@push('styles')
    <link href="{{ asset('css/breakpoint.css') }}" rel="stylesheet">
@endpush


<!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span> -->

    <div class="container">
    <form method="get" id="form-show-test-review" action="{{url('/exam/show')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" id="hdn_test_data" name="hdn_test_data" value="" /> 
    </form>

        <div class="row justify-content-center">
            <!-- <br><br> -->
            <div class="col-md-4 col-lg-3 justify-content-center">
                <div class="card">
                    <div id="sumCardBody" class="card-body">

                        <table width="100%">
                            <tr>
                                <td width="32%" valign="top">
                                <span class="float-left">Sum: <span id="sum_count"></span> </span><br></span><span class="float-left Timer"></span>
                                </td>
                                <td>
                                    <div id="sum">
                                    </div>
                                </td>
                            </tr>
                        </table>


                    </div>
                </div>
            </div>
        <!-- </div> -->
        <div class="col-md-5 justify-content-center /*d-block d-md-none*/">
            <div class="card margin-bottom: 0px;">
                <div class="card-body">

                <table witdth="100%">
                    <tr>
                        <td width="20%"></td>
                    <td>
                        <table style=" width: 162px;">
                            <tr>
                                <td><div class="text-center" onClick="keyPadBtn(1)" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; font-size: 18px; cursor: pointer;">1</div></td>
                                <td><div class="text-center keyPadBtn" onClick="keyPadBtn(2)" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; font-size: 18px; cursor: pointer;">2</div></td>
                                <td><div class="text-center keyPadBtn" onClick="keyPadBtn(3)" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; font-size: 18px; cursor: pointer;">3</div></td>
                                <td><div class="text-center keyPadBtn" onClick="keyPadBtn(4)" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; font-size: 18px; cursor: pointer;">4</div></td>
                                <td><div class="text-center keyPadBtn" onClick="keyPadBtn(5)" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; font-size: 18px; cursor: pointer;">5</div></td>
                            </tr>
                            <tr>
                                <td><div class="text-center keyPadBtn" onClick="keyPadBtn(6)" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; font-size: 18px; cursor: pointer;">6</div></td>
                                <td><div class="text-center keyPadBtn" onClick="keyPadBtn(7)" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; font-size: 18px; cursor: pointer;">7</div></td>
                                <td><div class="text-center keyPadBtn" onClick="keyPadBtn(8)" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; font-size: 18px; cursor: pointer;">8</div></td>
                                <td><div class="text-center keyPadBtn" onClick="keyPadBtn(9)" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; font-size: 18px; cursor: pointer;">9</div></td>
                                <td><div class="text-center keyPadBtn" onClick="keyPadBtn(0)" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; font-size: 18px; cursor: pointer;">0</div></td>
                            </tr>
                            <!-- <tr>
                                <td><div class="text-center" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 12px 18px; font-weight: bold">=</div></td>
                            </tr> -->
                            <tr>
                                <td><div onClick="backspace()" class="text-center" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; font-size: 18px; cursor: pointer;"><</div></td>
                                <td id="nextBtnContainer" colspan="3"><button onClick="next()" data-ord="1" id="nextBtn" class="text-center" style=" width: 132px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; cursor: pointer; ">NEXT</button></td>
                                <td><div class="text-center keyPadBtn" onClick="keyPadBtn('.')" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; font-size: 18px; cursor: pointer;">.</div></td>
                            </tr>
                        </table>
                    </td>
                        <td width="20%"></td>
                    </tr>    
                </table>    


                </div>
            </div>


        </div>

        <!-- <div id="sumBox" class="row justify-content-center">
            <div class="col-md-12 text-center" style=" border: 0px solid green;">
                <h3 id="setTitle">

                </h3>    
            </div>

        </div> -->
    </div>
    @endsection  
    @section('javascript')
  <!-- JQuery 3.4.1 -->
  <script type="application/javascript" src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
  <script type="application/javascript" src="{{ URL::asset('js/addition-substraction.js') }}"></script>
    <script type="application/javascript">
    // $(document).load(function(){
        console.log($("#nextBtn"));
// $('#answer_input').attr('readonly','readonly');
        // console.log(BOBASSESSMENT.additionAndSubstration.negativeIndex(5,2));
        // console.log(BOBASSESSMENT.additionAndSubstration.singleDigit(5,2));
    // function randomIntFromInterval(min, max) { // min and max included
    //     return Math.floor(Math.random() * (max - min + 1) + min);
    // }


        var app = @json($level_info);
        var sumsArray = []; 


        if(app['row_blocks'])
        {
            var blocks = app['row_blocks'];
            if(blocks.length > 0){
                for(a=0;a<blocks.length;a++){
                    // console.log('just print: ' + a);
                    var block = blocks[a];
                    var block_type = block['digits'];
                    var block_category = block['block_title'];
                    if(block_type == 'SD' && block_category == 'Addition'){ //Single Digit
                        for(b=0;b<block['sums'];b++){
                            var sdReturn = BOBASSESSMENT.additionAndSubstration.singleDigit(block['rows'],block['max_negative']);
                            sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  sdReturn[0]['sum_items'], 'ans_breakup': sdReturn[0]['ans_breakup'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
                        }    

                    }else if(block_type == 'DD' && block_category == 'Addition'){ // Double Digit
                        for(b=0;b<block['sums'];b++){
                            var sdReturn = BOBASSESSMENT.additionAndSubstration.doubleDigit(block['rows'],block['max_negative']);
                            sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  sdReturn[0]['sum_items'], 'ans_breakup': sdReturn[0]['ans_breakup'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
                        }    

                    }else if(block_type == 'TD' && block_category == 'Addition'){ // Double Digit
                        for(b=0;b<block['sums'];b++){
                            var sdReturn = BOBASSESSMENT.additionAndSubstration.tripleDigit(block['rows'],block['max_negative']);
                            sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  sdReturn[0]['sum_items'], 'ans_breakup': sdReturn[0]['ans_breakup'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
                        }    

                    }else if(block_type == 'SD/DD' && block_category == 'Addition'){ //Single/Double Digit
                        for(b=0;b<block['sums'];b++){
                            var sdReturn = BOBASSESSMENT.additionAndSubstration.singleDoubleDigit(block['rows'],block['max_negative']);
                            //  sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  sdReturn[0]['sum_items'], 'ans_breakup': sdReturn[0]['ans_breakup'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
                        }    

                    }else if(block_type == 'MOD1' && block_category == 'Addition'){
                         for(b=0;b<block['sums'];b++){
                            var sdReturn = BOBASSESSMENT.mod1.directAddition(block['rows']);
                            sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  sdReturn[0]['sum_items'], 'ans_breakup': sdReturn[0]['ans_breakup'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
                         }
                    }else if(block_type == 'MOD2' && block_category == 'Addition'){
                         for(b=0;b<block['sums'];b++){
                            var sdReturn = BOBASSESSMENT.mod2.singleDigit(block['rows'],block['max_negative']);
                            sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  sdReturn[0]['sum_items'], 'ans_breakup': sdReturn[0]['ans_breakup'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
                         }
                    }else if(block_type == 'MOD3-SD' && block_category == 'Addition'){
                         for(b=0;b<block['sums'];b++){
                            var sdReturn = BOBASSESSMENT.mod3.singleDigit(block['rows'],block['max_negative']);
                            sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  sdReturn[0]['sum_items'], 'ans_breakup': sdReturn[0]['ans_breakup'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
                         }
                    }else if(block_type == 'Level1-SD' && block_category == 'Addition'){
                         for(b=0;b<block['sums'];b++){
                            var sdReturn = BOBASSESSMENT.mod2.singleDigit(block['rows'],block['max_negative']);
                            sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  sdReturn[0]['sum_items'], 'ans_breakup': sdReturn[0]['ans_breakup'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
                         }
                    }else if(block_type == 'Level2-SD-2DD-Top' && block_category == 'Addition'){
                         for(b=0;b<block['sums'];b++){
                            var sdReturn = BOBASSESSMENT.level2.singleDigitTwoDDonTop(block['rows'],block['max_negative']);
                            sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  sdReturn[0]['sum_items'], 'ans_breakup': sdReturn[0]['ans_breakup'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
                         }
                    }else if(block_type == 'DD/SD' && block_category == 'Multiplication'){
                         for(b=0;b<block['sums'];b++){
                            var sdReturn = BOBASSESSMENT.multiplication.doubleDigitSingleDigit();
                            // console.log(sdReturn);
                            sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  [], 'ans_breakup': [], 'multiplicand' : sdReturn[0]['multiplicand'], 'multiplier' : sdReturn[0]['multiplier'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
                         }
                    }else if(block_type == 'TD/SD' && block_category == 'Multiplication'){
                         for(b=0;b<block['sums'];b++){
                            var sdReturn = BOBASSESSMENT.multiplication.tripleDigitSingleDigit();
                            // console.log(sdReturn);
                            sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  [], 'ans_breakup': [], 'multiplicand' : sdReturn[0]['multiplicand'], 'multiplier' : sdReturn[0]['multiplier'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
                         }
                    }else if(block_type == 'DD/DD' && block_category == 'Multiplication'){
                         for(b=0;b<block['sums'];b++){
                            var sdReturn = BOBASSESSMENT.multiplication.doubleDigitDoubleDigit();
                            // console.log(sdReturn);
                            // sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  [], 'ans_breakup': [], 'multiplicand' : sdReturn[0]['multiplicand'], 'multiplier' : sdReturn[0]['multiplier'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
                         }
                    }else if(block_type == 'TD/DD' && block_category == 'Multiplication'){
                         for(b=0;b<block['sums'];b++){
                            var sdReturn = BOBASSESSMENT.multiplication.tripleDigitDoubleDigit();
                            // console.log(sdReturn);
                            sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  [], 'ans_breakup': [], 'multiplicand' : sdReturn[0]['multiplicand'], 'multiplier' : sdReturn[0]['multiplier'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
                         }
                    }else{

                    }
                }
            }else{
                $("#setTitle").val('Rows and Blocks not defined for this Level');
            }
            // alert(blocks.length);
        }
        // console.log(sumsArray);
        var total_sums = sumsArray.length;

        function backspace(){
            var curVal = $("#answer_input").val();
            if(curVal != null && curVal != 0){
                if(curVal.toString().length == 1){
                    $("#answer_input").val(null);
                }else{
                    $("#answer_input").val(curVal.slice(0,-1));
                }
            }
        }

        function keyPadBtn(n){
            // alert(n)
            var curVal = $("#answer_input").val();
            if(n == '.')
            {
                // alert('one');
                if($("#answer_input").val() == "" || $("#answer_input").val() == 0){
                    $("#answer_input").val('.');
                }else{
                    $("#answer_input").val( ($("#answer_input").val()).toString() + n.toString() )
                }
            }else{
                // alert('two');
                if(curVal == null || curVal == 0){
                    $("#answer_input").val(n);
                }else{
                    $("#answer_input").val( ($("#answer_input").val()).toString() + n.toString() )
                }
            }
        }
        var virtual_keyboard = 'yes';
        // console.log(total_sums);
        function next(){
            // console.log(total_sums > parseInt(curOrd));
            var curOrd = $("#nextBtn").attr('data-ord');
// console.log(curOrd);
            // console.log(sumsArray[parseInt(curOrd) - 1]);
            // $("#last_answer").text(sumsArray[parseInt(curOrd) - 1]['student_answer']);

            // var virtual_keyboard = 'yes';
            if(total_sums > parseInt(curOrd)){
                if(sumsArray[curOrd]['category'] == 'Addition'){
                    sumsArray[parseInt(curOrd) - 1]['student_answer'] = $("#answer_input").val();
                    sumsArray[parseInt(curOrd) - 1]['end_time']    = $('.Timer').text();
                    sumsArray[parseInt(curOrd)]['start_time']    = $('.Timer').text();  

                    $("#nextBtn").attr('data-ord',parseInt(curOrd)+1);
                    $("#sumTitle").text(sumsArray[curOrd]['title']);
                    $("#sumSubTitle").text(sumsArray[curOrd]['sub_title']);
                    var getSum = BOBASSESSMENT.general.generateSum(sumsArray[curOrd],virtual_keyboard);  
                    // console.log(sumsArray[0]);    
                    $("#sum_count").text(parseInt(curOrd) + 1);
                    $("#sum").html(getSum);
                }else if (sumsArray[curOrd]['category'] == 'Multiplication'){
                    sumsArray[parseInt(curOrd) - 1]['student_answer'] = $("#answer_input").val();
                    sumsArray[parseInt(curOrd) - 1]['end_time']    = $('.Timer').text();
                    sumsArray[parseInt(curOrd)]['start_time']    = $('.Timer').text();  
                    // console.log(curOrd);
                    $("#nextBtn").attr('data-ord',parseInt(curOrd)+1);
                    $("#sumTitle").text(sumsArray[curOrd]['title']);
                    $("#sumSubTitle").text(sumsArray[curOrd]['sub_title']);
                    var getSum = BOBASSESSMENT.general.generateMultiplicationsum(sumsArray[curOrd],virtual_keyboard);
                    sumsArray[curOrd]['start_time'] = $('.Timer').text();
                    // console.log(sumsArray[0]);    
                    $("#sum").html(getSum);
                    var sum_cnt = parseInt(parseInt(curOrd) + 1);
                    $("#sum_count").text(sum_cnt);
                   
                }
            }else{
                // if(sumsArray[0]['category'] == 'Addition'){

                sumsArray[parseInt(curOrd) - 1]['student_answer'] = $("#answer_input").val();
                sumsArray[parseInt(curOrd) - 1]['end_time']    = $('.Timer').text();

                // alert('over');
                $("#hdn_test_data").val(JSON.stringify(sumsArray));
                $("#form-show-test-review").submit();
                // }
            }

        }

        if(sumsArray[0]['category'] == 'Addition'){
            $("#sumTitle").text(sumsArray[0]['title']);
            $("#sumSubTitle").text(sumsArray[0]['sub_title']);
            var getSum = BOBASSESSMENT.general.generateSum(sumsArray[0],virtual_keyboard);
            sumsArray[0]['start_time'] = '00:00:00';
            // console.log(sumsArray[0]);    
            $("#sum").html(getSum);
            // alert($("#sumCardBody").innerHeight())
            $("#sum_count").text(1);
        }else if(sumsArray[0]['category'] == 'Multiplication'){
            $("#sumTitle").text(sumsArray[0]['title']);
            $("#sumSubTitle").text(sumsArray[0]['sub_title']);
            var getSum = BOBASSESSMENT.general.generateMultiplicationsum(sumsArray[0],virtual_keyboard);
            sumsArray[0]['start_time'] = $('.Timer').text();
            // console.log(sumsArray[0]);    
            $("#sum").html(getSum);
            var sum_cnt = parseInt($("#sum_count").text());
            $("#sum_count").text(sum_cnt + 1);
        }
    // });


    //Create Timer
 function get_elapsed_time_string(total_seconds) {
  function pretty_time_string(num) {
    return ( num < 10 ? "0" : "" ) + num;
  }

  var hours = Math.floor(total_seconds / 3600);
  total_seconds = total_seconds % 3600;

  var minutes = Math.floor(total_seconds / 60);
  total_seconds = total_seconds % 60;

  var seconds = Math.floor(total_seconds);

  // Pad the minutes and seconds with leading zeros, if required
  hours = pretty_time_string(hours);
  minutes = pretty_time_string(minutes);
  seconds = pretty_time_string(seconds);

  // Compose the string for display
  var currentTimeString = hours + ":" + minutes + ":" + seconds;

  return currentTimeString;
}

var elapsed_seconds = 0;
setInterval(function() {
  elapsed_seconds = elapsed_seconds + 1;
  $('.Timer').text(get_elapsed_time_string(elapsed_seconds));
}, 1000);


function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}


    </script>

@endsection
