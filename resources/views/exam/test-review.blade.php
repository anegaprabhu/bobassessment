@extends('layouts.app') 

@section('title', 'Page Title') 


@section('sidebar')
 @parent     

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="fwrapper py-5">

<div class="jumbotron bg-success text-light">
  <div class="container">
    <h1>Congratulations!!</h1>      
    <p>You have successfully completed your today's competition. Please come again tomorrow to participate another exam.</p>
  </div>
</div>

    <div class="container">

        <div class="row justify-content-left">
            @if(count($test_data) > 0)
                @foreach($test_data as $k => $sum)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                
                                <table width="100%" style=" font-size: 25px;">
                                    @if($sum['title'] == 'Addition')
                                        @foreach($sum['sum_items'] as $l => $sum_item)
                                            <tr>
                                            <td width="30%"></td>
                                            <td>
                                                <div class="text-right pr-3">{{$sum_item}} ({{$sum['ans_breakup'][$l]}})</div>
                                            </td>
                                            <td width="30%"></td>
                                            </tr>
                                        @endforeach
                                    @elseif($sum['title'] == 'Multiplication')
                                        @foreach($sum['multiplicand'] as $l => $sum_item)
                                            <tr>
                                            <td>
                                                <div class="text-right pr-3">{{$sum_item}}</div>
                                            </td>
                                            <td><div class="text-right pr-3">&times;</div></td>
                                            <td>
                                            <div class="text-right pr-3">{{$sum['multiplier'][$l]}}</div>
                                            </td>
                                            </tr>
                                        @endforeach
                                    @elseif($sum['title'] == 'Division')
                                        @foreach($sum['dividend'] as $l => $sum_item)
                                            <tr>
                                            <td>
                                                <div class="text-right pr-3">{{$sum_item}}</div>
                                            </td>
                                            <td><div class="text-right pr-3">&#xF7;</div></td>
                                            <td>
                                            <div class="text-right pr-3">{{$sum['divisor'][$l]}}</div>
                                            </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr>
                                    <td width="30%"></td>
                                    <td style=" border-top: 2px solid black;">
                                        <div class="text-right pr-3">{{$sum['student_answer']}}</div>
                                    </td>
                                    <td width="30%">
                                    @if($sum['student_answer'] == "" || $sum['student_answer'] == null)
                                        <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                    @else
                                        @if($sum['student_answer'] == $sum['answer'])
                                        <i class="fa fa-check text-success" aria-hidden="true"></i>
                                        @else
                                        <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                        @endif
                                    @endif
                                    </td>
                                    </tr>
                                    @if($sum['student_answer'] == "" ||  $sum['student_answer'] == null || $sum['student_answer'] != $sum['answer'])
                                    <tr>
                                        <td id="checkBtnContainer_{{$k}}" colspan="3"><button onClick="checkBtn({{$k}},{{$sum['answer']}})" data-container-class="checkBtnContainer_{{$k}}" data-ans="{{$sum['answer']}}" class="btn btn-success btn-sm btn-block checkBtn">Check Answer</button></td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12"><p class="text-danger">No data found!</p></div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('javascript')
  <!-- JQuery 3.4.1 -->
  <script type="application/javascript" src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
  <script type="application/javascript" src="{{ URL::asset('dist/plugins/js/kit.fontawesome.js') }}"></script>

  <script type="application/javascript">
    function checkBtn(id,ans){
        $("#checkBtnContainer_"+id).html('Ans: ' + ans);
    }


    function openNav() {
    document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
    document.getElementById("myNav").style.width = "0%";
    }

  </script>  
@endsection
