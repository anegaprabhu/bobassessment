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


<style>
.flip-card {
  background-color: transparent; 
  perspective: 1000px;  
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 8px 10px 0 rgba(90,90,90,0.2)
}


.flip-card.flipped .flip-card-inner {   
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}



.flip-card-back {

  transform: rotateY(180deg);
}
</style>


<!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span> -->
<div class="wrapper">

    <div class="container">
    <form method="get" id="form-show-test-review" action="{{url('/exam/show')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" id="hdn_test_data" name="hdn_test_data" value="" /> 
    </form>

    <form method="post" id="form-show-test-store" action="{{url('/exam/store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" id="hdn_test_data_store" name="hdn_test_data_store" value="" />
        <input type="hidden" id="hdn_test_st_store" name="hdn_test_st_store" value="" />
    </form>

        <!-- <div class="row">
            <div class="col-md-12" style=" height: 250px;">
  
  
            <label>
                <input class="box" type="checkbox"  />
                <div class="card1">
                    <div class="front">Front</div>
                    <div class="back">Back</div>
                </div>
            </label>


            </div>   
        </div> -->

        <div class="headline">
           <h4> <i class="fa fa-file-text-o"></i> <b class="pl-2">Sum: <b id="sum_count"></b></b></h4>
           <h4 class="float-right"><i class="fa fa-clock-o"></i> <b class="Timer pl-2"></b></h4>
        </div>

        <div class="row justify-content-center testbox">
            <!-- <br><br> -->

            <div class="p-0 col-md-4 col-lg-7 v-top">
                <div class="progress ml-5 mr-5 mt-2">
                    <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" style="width:70%">70%</div>
                </div>
                <div class="p-4">
                    <div id="sumCardBody" class="justify-content-center d-flex">
                            <div id="sum"></div>
                    </div>
                </div>

                
            </div>
        <!-- </div> -->
        <div class="p-0 keybox col-md-5 col-lg-5 align-items-center justify-content-center /*d-block d-md-none*/">
            <div class="">
                <div class="p-4">

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
                                <td id="nextBtnContainer" colspan="3"><button onClick="next()" data-ord="1" id="nextBtn" class="text-center" style=" width: 132px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; cursor: pointer; display: none;">NEXT</button></td>
                                <td><div class="text-center keyPadBtn" onClick="keyPadBtn('.')" style=" width: 40px; height: 40px; border: 1px solid black; margin: 2px; padding: 6px 14px; font-weight: bold; font-size: 18px; cursor: pointer;">.</div></td>
                               
                            </tr>
                            @if(count($student_detail) > 0 && Hashids::decode($student_detail[1])[0] > 60)
                            <tr>
                                <td colspan="5"><button id="submitResult" onClick="submitResult('{{ $student_detail[0] . '_' . $student_detail[1] . '_' . $student_detail[2] }}')" type="button" class="btn btn-success btn-sm btn-block " style="display: none;">Submit</button></td>
                            </tr>
                            @elseif(count($student_detail) > 0 && Hashids::decode($student_detail[1])[0] < 50)
                            <tr>
                                <td colspan="5"><button id="showResult" onClick="showResult()" type="button" class="btn btn-success btn-sm btn-block " style="display: none;">Submit</button></td>
                            </tr>
                            @endif
                        </table>
                    </td>
                        <td width="20%"></td>
                    </tr>    
                </table>    


                </div>
            </div>

        </div>
        <!-- <div class="col-md-8">
            <br>
            <div class="progress mb-5">
                <div class="progress-bar" style="width:70%">70%</div>
            </div>
        </div> -->

        <!-- <div id="sumBox" class="row justify-content-center">
            <div class="col-md-12 text-center" style=" border: 0px solid green;">
                <h3 id="setTitle">

                </h3>    
            </div>

        </div> -->
    </div>
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

    function codeAddress(address) {
            return address;
      }

 
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
                             sumsArray.push({'category' : block_category, 'title'     :   block['block_title'], 'sub_title' : block['block_subtitle'], 'sum_no'    :   b + 1, 'sum_items' :  sdReturn[0]['sum_items'], 'ans_breakup': sdReturn[0]['ans_breakup'], 'answer'    :  sdReturn[0]['answer'], 'student_answer'   : null});
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

            if($("#answer_input").val() == "" || $("#answer_input").val() == null)
            {
                return;
            }
            $("#nextBtn").css('display','none');

            console.log(total_sums);
            var curOrd = $("#nextBtn").attr('data-ord');
            console.log(curOrd);
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

                    sumString = "<table id='generatedSumBlock' style=' font-size: 20px; font-weight: bold;'>";
            sumString += "</table>";
            $("#sum").html(sumString);
            var itm_count = sumsArray[curOrd]['sum_items'].length;

            var addressArr = sumsArray[curOrd]['sum_items'],
            counter = 0,
            timer = setInterval(function(){
                //   codeAddress(addressArr[counter]);
                  $("#generatedSumBlock").append("<tr><td style=' min-width: 102px;' class='text-right sum_item pr-3'>" + codeAddress(addressArr[counter]) + "</td></tr>");
                  counter++
                  if (counter === addressArr.length) {

                    var sumString = "<tr><td style=' border-top: 2px solid black; min-width: 102px;'>";
                if(virtual_keyboard == 'yes'){
                    sumString += "<input id='answer_input' type='text' readonly='readonly' class='text-right pr-1' style='width:100px; border: 1px solid black;' value='' />"; // placeholder='"+arr['answer']+"'
                }else{
                    sumString += "<input id='answer_input' type='text' class='text-right pr-1' style='width:100px; border: 1px solid black;' value='' />";
                }
                sumString += "</td></tr>";
                    console.log(total_sums - parseInt(curOrd))

                    $("#generatedSumBlock").append(sumString);
                    if(total_sums - parseInt(curOrd) != 1)
                    {
                        $("#nextBtn").css('display','block');
                    }
                    if(total_sums - parseInt(curOrd) == 1)
                    {
                    $("#submitResult").css('display','block');
                    $("#showResult").css('display','block');
                    }
   
                        clearInterval(timer);
                  }


            },2000);


                    // var getSum = BOBASSESSMENT.general.generateSum(sumsArray[curOrd],virtual_keyboard);  
                    // console.log(sumsArray[0]);    
                    // $("#sum").html(getSum);
                    $("#sum_count").text(parseInt(curOrd) + 1);
                    $(".progress-bar").css('width', ((parseInt(curOrd) + 1) / total_sums) * 100 + '%');
                    $(".progress-bar").text((parseInt(curOrd) + 1) + ' of ' + total_sums);


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
                    $("#nextBtn").css('display','block');
                    if(total_sums - parseInt(curOrd) == 1)
                    {
                        $("#nextBtn").css('display','none');
                    $("#submitResult").css('display','block');
                    $("#showResult").css('display','block');
                    }
   
                }
            }else{
                // if(sumsArray[0]['category'] == 'Addition'){

                sumsArray[parseInt(curOrd) - 1]['student_answer'] = $("#answer_input").val();
                sumsArray[parseInt(curOrd) - 1]['end_time']    = $('.Timer').text();

                // alert('over');
                // $("#hdn_test_data").val(JSON.stringify(sumsArray));
//                $("#form-show-test-review").submit();
                // }
            }
            if ($('.box').is(':checked'))
            {
                $(".box").prop('checked',false);
            }else{
                $(".box").prop('checked',true);
            }
        }

        if(sumsArray[0]['category'] == 'Addition'){
            $("#sumTitle").text(sumsArray[0]['title']);
            $("#sumSubTitle").text(sumsArray[0]['sub_title']);
            // var getSum = BOBASSESSMENT.general.generateSum(sumsArray[0],virtual_keyboard);
            sumsArray[0]['start_time'] = '00:00:00';
            // console.log(sumsArray[0]);    

            sumString = "<table id='generatedSumBlock' style=' font-size: 20px; font-weight: bold;'>";
            sumString += "</table>";
            $("#sum").html(sumString);
            var itm_count = sumsArray[0]['sum_items'].length;

            var addressArr = sumsArray[0]['sum_items'],
            counter = 0,
            timer = setInterval(function(){
                //   codeAddress(addressArr[counter]);
                  $("#generatedSumBlock").append("<tr><td style=' min-width: 102px;' class='text-right sum_item pr-3'>" + codeAddress(addressArr[counter]) + "</td></tr>");
                  counter++
                  if (counter === addressArr.length) {

                    var sumString = "<tr><td style=' border-top: 2px solid black; min-width: 102px;'>";
                if(virtual_keyboard == 'yes'){
                    sumString += "<input id='answer_input' type='text' readonly='readonly' class='text-right pr-1' style='width:100px; border: 1px solid black;' value='' />"; // placeholder='"+arr['answer']+"'
                }else{
                    sumString += "<input id='answer_input' type='text' class='text-right pr-1' style='width:100px; border: 1px solid black;' value='' />";
                }
                sumString += "</td></tr>";


                    $("#generatedSumBlock").append(sumString);
                        $("#nextBtn").css('display','block');
                        clearInterval(timer);
                  }
            },2000);

                    $(".progress-bar").css('width', (1 / total_sums) * 100 + '%');
                    // $(".progress-bar").text( 1 + ' of ' + total_sums);
                    $(".progress-bar").text( '1' );
            // for(xy=0;xy<itm_count;xy++)
            // {
            //     print(xy,sumsArray[0]['sum_items']);
            // }
            // $("#sum").html(getSum);

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

            $("#nextBtn").css('display','block');

        }
    // });


function submitResult(id){
    if($("#answer_input").val() == "" || $("#answer_input").val() == null)
    {
        return;
    }

    $("#hdn_test_st_store").val(id);
    // alert(JSON.stringify(sumsArray));
    // return;
    $("#hdn_test_data_store").val(JSON.stringify(sumsArray));
    $("#form-show-test-store").submit();
}

function showResult(){
    if($("#answer_input").val() == "" || $("#answer_input").val() == null)
    {
        return;
    }
    $("#hdn_test_data").val(JSON.stringify(sumsArray));
    $("#form-show-test-review").submit();
}

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
