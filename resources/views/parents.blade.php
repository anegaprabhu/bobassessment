@extends('layouts.auth')
@section('content')
<div class="wrapper">
@if(count($students) < 1)
        <div class="card-shadow">
            <div class="card">
                <div class="text-center">
                    <img src="{{ asset('images/kids-on-computer.jpg') }}" alt="logo" class="img-fluid" />
                </div>
                <div class="card-body">
                    <div class="text-center">
                    
                        <h4>Hi {{Auth::user()->name}}</h4>
                        <p class="mb-4 lead">Click below button to add your child</p>
                        <div class="text-center">
                            <a href="{{route('student.create')}}" type="button" class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Child</a>
                        </div>
                        <p class="mb-4 lead">Maximum 3 children can be registered</p>
                    </div>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.card-shadow -->
    @endif
    @if(count($students) > 0)
    <div class="container">
    <div class="row justify-content-center mt-5">
 
        @if(Session::has('success'))
            <div class="alert alert-lg alert-success sucessmsg_bob" id="success-alert">
              <button type="button" class="close" data-dismiss="alert" id="closesmg">&times;</button>
              <strong>Success! </strong> {{ Session::get('success') }} 
            </div>
            @endif
            @if(Session::has('danger'))
            <div class="alert alert-lg alert-danger sucessmsg_bob" id="success-alert">
              <button type="button" class="close" data-dismiss="alert" id="closesmg">&times;</button>
              <strong>Failed! </strong> {{ Session::get('danger') }} 
            </div>
        @endif

       <div class="col-md-12">
            <div class="headline">
                
                <h4>Students</h4>
                @if(count($students) < 18)
                <div class="float-right">
                <a href="{{route('student.create')}}" title="Maximum 3 children can be registered" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Child</a>
                </div>
                @endif
            </div>
            

            
                <div class="card  bg-gray">

                    <ul class="row list">
                    @foreach($students as $k => $student)
                        <li class="col-md-4">
                            <div class="card shadow">
                                <!-- <div class="absicon">
                                    <a title="Practice Test" href="{{route('instruction.index',['id'=>Hashids::encode($student->student_id) . '_' . Hashids::encode(rand(30,50)) . '_' . Hashids::encode($student->competition_id)])}}"><i class="fa fa-pencil-square-o mr-1 mt-1"></i></a>
                                </div> -->
                                <div class="card-body">
                                    
                                    <div class="mb-4">
                                        <small class="highlight">{{$student->programme}}</small>
                                        <h4 class="mt-3"><i class="fa fa-user-o"></i> <span class="pl-2">{{$student->student_name}}</span></h4>
                                    </div>
                                    <div class="d-flex">
                                        
                                        <h5>{{$student->level}}</h5> 
                                    </div>     
                                </div>
                            @if( property_exists($student,'competition_today_status') && $student->competition_today_status == 'No')
                                <div class="text-center">
                                    <a title="Daily Competition. Only one attempt is allowed" class="btn btn-primary btn-block" href="{{route('instruction.index',[ 'id' => Hashids::encode($student->student_id) . '_' . Hashids::encode(rand(60,90)) . '_' . Hashids::encode($student->competition_id) ])}}">Competition</a>
                                </div>
                            @else    
                                <div class="text-center">
                                    <a title="Practice Test" class="btn btn-warning btn-block" href="{{route('instruction.index',['id'=>Hashids::encode($student->student_id) . '_' . Hashids::encode(rand(30,50)) . '_' . Hashids::encode($student->competition_id)])}}">Take Practice</a>
                                </div>
                            @endif
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
           

        </div> <!-- /.col-md-12 -->
    </div>
    <br/>
    </div> <!-- /.container -->
    @endif
 
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
