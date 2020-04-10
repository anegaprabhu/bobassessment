@extends('layouts.auth')
@section('content')
<div class="container">
@if(count($students) < 3)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{route('student.create')}}" type="button" class="btn btn-success btn-sm">Add Child</a>
                        </div>
                        <div class="col-md-9">
                            <p class="test-warning">Maximum 3 children can be registered</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endif   
    @if(count($students) > 0)

    <div class="row justify-content-center">
        <div class="col-md-12">
        <br>
            <div class="card">
                <div class="card-header">
                    <h4>Student List</h4>
                </div>
            </div>

            @foreach($students as $k => $student)
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>{{$student->student_name}}</h4>
                                <h5>{{$student->programme}} ({{$student->level}})</h5>
                            </div>
                            <div class="col-md-6">
                            @if($student->competition_today_status == 'No')
                                <a class="btn btn-success btn-sm float-right mr-1" href="{{route('instruction.index',['id'=>base64_encode($student->student_id)])}}">Competition</a>
                            @endif
                            <a class="btn btn-success btn-sm float-right mr-1" href="{{route('instruction.index',['id'=>base64_encode($student->student_id)])}}">Practice</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <form method="get" id="go-to-instructon-page" action="{{url('/exam/show')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
            <input type="hidden" id="hdn_test_data" name="hdn_test_data" value="" /> 
            </form>



        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    @endif
</div> <!-- /.container -->



@endsection

@section('javascript')
  <!-- JQuery 3.4.1 -->
  <script type="application/javascript" src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data-2012-2022.min.js"></script>


  <script type="application/javascript">

    console.log(moment.tz.names());

function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}


    </script>

@endsection
