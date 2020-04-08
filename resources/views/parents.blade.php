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
                <div class="card-header"><h4>Student List</h4></div>
                <div class="card-body">
                    <table class="table table-sm table-condensed">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Programme</th>
                                <th>Level</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $k => $student)
                                <tr>
                                    <td>{{$student->student_name}}</td>
                                    <td>{{$student->programme}}</td>
                                    <td>{{$student->level}}</td>
                                    <td><a href="{{route('instruction.index',['id'=>base64_encode($student->student_id)])}}">Take Test</a></td>
                                </tr>
                            @endforeach
                            <!-- <tr>
                                <td>Student 1</td>
                                <td>Module 1</td>
                                <td><a href="{{route('exam.index',['id'=>'m1'])}}">Take Test</a></td>
                            </tr>
                            <tr>
                                <td>Student 2</td>
                                <td>Module 2</td>
                                <td><a href="{{route('exam.index',['id'=>'m2'])}}">Take Test</a></td>
                            </tr>
                            <tr>
                                <td>Student 3</td>
                                <td>Module 3</td>
                                <td><a href="{{route('exam.index',['id'=>'m3'])}}">Take Test</a></td>
                            </tr>
                            <tr>
                                <td>Student 4</td>
                                <td>Module 4</td>
                                <td>N/A</td>
                            </tr>
                            <tr>
                                <td>Student 5</td>
                                <td>Level 1</td>
                                <td><a href="{{route('exam.index',['id'=>'l1'])}}">Take Test</a></td>
                            </tr>
                            <tr>
                                <td>Student 6</td>
                                <td>Level 2</td>
                                <td><a href="{{route('exam.index',['id'=>'l2'])}}">Take Test</a></td>
                            </tr>
                            <tr>
                                <td>Student 7</td>
                                <td>Level 3</td>
                                <td><a href="{{route('exam.index',['id'=>'l3'])}}">Take Test</a></td>
                            </tr>
                            <tr>
                                <td>Student 8</td>
                                <td>Level 4</td>
                                <td><a href="{{route('exam.index',['id'=>'l4'])}}">Take Test</a></td>
                            </tr>
                            <tr>
                                <td>Student 9</td>
                                <td>Level 5</td>
                                <td><a href="{{route('exam.index',['id'=>'l5'])}}">Take Test</a></td>
                            </tr>
                            <tr>
                                <td>Student 10</td>
                                <td>Level 6</td>
                                <td><a href="{{route('exam.index',['id'=>'l6'])}}">Take Test</a></td>
                            </tr>
                            <tr>
                                <td>Student 11</td>
                                <td>Level 7</td>
                                <td>N/A</td>
                            </tr>
                            <tr>
                                <td>Student 12</td>
                                <td>Level 8</td>
                                <td>N/A</td>
                            </tr>
                            <tr>
                                <td>Student 13</td>
                                <td>Level 9</td>
                                <td>N/A</td>
                            </tr>
                            <tr>
                                <td>Student 14</td>
                                <td>Level 10</td>
                                <td>N/A</td>
                            </tr> -->
                        </tbody>    
                    </table>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
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
