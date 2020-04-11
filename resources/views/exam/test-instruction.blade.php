@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Instruction</div>
                <div class="card-body">
                @if(count($level_details) > 0)
                    <div class="row">
                        <div class="col-md-12 text-success">
                            <p>Programme: {{$level_details['programme']}}</p>
                            <p>Level: {{$level_details['level']}}</p>
                        </div>
                        @foreach($level_details['row_blocks'] as $k => $row)
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Section: {{$row['block_name']}}<p>
                                        <p>Type: {{$row['block_subtitle']}}</p>
                                        <p>Rows: {{$row['rows']}}</p>
                                        <p>Sums: {{$row['sums']}}</p>
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
                <a class="btn btn-success btn-sm float-right" href="{{route('exam.index',['id'=>$enc_student_id])}}">Take Test</a>
                </div>
                @endif
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
