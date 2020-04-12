@extends('layouts.auth')

@section('content')
<div class="fwrapper py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card cards">
                <div class="headline"><h4>Competition Information</h4></div>
                <div class="card-body bg-gray">
                @if(count($level_details) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-between">
                            <p class="pr-3">Programme: <b>{{$level_details['programme']}}</b></p>
                            <p>Level: <span class="highlight">{{$level_details['level']}}</span></p>
                            </div>
                        </div>
                        @foreach($level_details['row_blocks'] as $k => $row)
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <p><b>Section: {{$row['block_name']}}</b><p>
                                        <p>Type: {{$row['block_subtitle']}}</p>
                                        <div class="d-flex">
                                            <p>Rows: <span class="highlight">{{$row['rows']}}</span></p>
                                            <p class="pl-3">Sums: <span class="highlight">{{$row['sums']}}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-danger">Test not defined!</p>
                        </div>
                    </div>    
                @endif
                </div>
                @if(count($level_details) > 0)
                <div class="card-footer">
                <a class="btn btn-primary float-right" href="{{route('exam.index',['id'=>$enc_student_id])}}">Take Test</a>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>
</div>
@endsection
@section('javascript')
  <!-- JQuery 3.4.1 -->
  <script type="application/javascript" src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
  <script type="application/javascript">

    function openNav() {
        document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("myNav").style.width = "0%";
    }

  </script>

@endsection
