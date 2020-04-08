@extends('layouts.auth')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{route('student.create')}}" type="button" class="btn btn-success btn-sm">Add Child</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <a class="btn btn-success btn-sm float-right" href="{{route('instruction.index',['id'=>base64_encode($student->student_id)])}}">Take Test</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    @endif
</div> <!-- /.container -->



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
