@extends('layouts.app') 

@section('title', 'Page Title') 


@section('sidebar')
 @parent     

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="fwrapper py-5">

<div class="jumbotron bg-success text-light">
  <div class="container text-center">
    <h1>Congratulations!!</h1>
    <h3>{{$student[0]->student_name}}</h3>
    <p>You got <strong>{{$correct_sums}} / {{$total_sums}}</strong> marks.</p>     
    <p>Please come again tomorrow to participate another exam.</p>
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
