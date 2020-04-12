@extends('layouts.auth')

@section('content')

@push('styles')
    <link href="{{ asset('dist/css/lobibox.css')}}" rel="stylesheet">
@endpush



<div class="wrapper">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Provide Student Details</h4>
                </div>
                <div class="card-body">
                <form method="POST" id="form-student-registration" action="{{url('student/store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="time_zone" id="time_zone" value="" />
                    <input type="hidden" name="local_time" id="local_time" value="" />

                    <div class="row">
                        <div class="col-md-4">
                            <label><span>Student Name</span> <span class="text-danger">*</span></label>
                            <div class="input-group input-group-md mb-3 form-group">
                                <!-- /btn-group -->
                                <input type="text" name="txt_student_name" id="txt_student_name" value="{{old('txt_student_name')}}" class="form-control" />
                                <div class="errorMsg" style="width: 100%"> 
                                    @if ($errors->has('txt_student_name'))
                                        <span class="text-danger">{{ $errors->first('txt_student_name') }}</span>
                                    @endif
                                </div> <!-- /.errorMsg -->
                            </div> <!-- /.input-group -->
                        </div> <!-- /.col-md-4 -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>DOB <span class="text-danger">*</span></label>
                                <div class="input-group date">
                                    <input type="date" class="form-control pull-right" name="txt_dob" id="txt_dob" value="{{old('txt_dob')}}" autocomplete="off">
                                    <div class="errorMsg" style="width: 100%">
                                        @if ($errors->has('txt_dob'))
                                        <span class="text-danger">{{ $errors->first('txt_dob') }}</span>
                                        @endif
                                    </div> <!-- /.errorMsg -->
                                </div> <!-- /.input-group -->
                            </div> <!-- /.form-group -->
                        </div> <!-- /.col-md-4 -->

                        <div class="col-md-4">
                            <div class="form-group">
                            <label>School Name</label>
                            <input type="text" name="txt_school_name" id="txt_school_name" class="form-control" value="{{old('txt_school_name')}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Standard / Grade<span class="text-danger">*</span></label>
                                <input type="text" name="txt_std_grade" id="txt_std_grade" class="form-control" value="{{old('txt_std_grade')}}">
                                <div class="errorMsg" style="width: 100%">
                                    @if ($errors->has('txt_std_grade'))
                                        <span class="text-danger">{{ $errors->first('txt_std_grade') }}</span>
                                    @endif
                                </div> <!-- /.errorMsg -->
                            </div> <!-- /.form-group -->
                        </div> <!-- /.col-md-4 -->

                        <div class="col-md-4">
                        <div class="form-group">
                          <label>Program Name <span class="text-danger">*</span></label>
                          <select onChange="programmeChange()" class="form-control select2" style="width: 100%;" name="slt_program" id="slt_program">
                            <option value="" selected>Select</option>
                            <option value="brainobrain">Brainobrain</option>
                            <option value="littlebob" >Little Bob</option>
                          </select> <!-- /.form-control --> 
                          <div class="errorMsg" style="width: 100%">
                              @if ($errors->has('slt_program'))
                                <span class="text-danger">{{ $errors->first('slt_program') }}</span>
                              @endif
                          </div> <!-- /.errorMsg -->
                        </div> <!-- /.form-group -->
                      </div> <!-- /.col-md-4 -->

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Level <span class="text-danger">*</span></label>
                          <select class="form-control select2" style="width: 100%;" name="slt_level" id="slt_level">
                            <option value="" selected>Select</option>
                          </select> <!-- /.form-control --> 
                          <div class="errorMsg" style="width: 100%">
                              @if ($errors->has('slt_level'))
                                <span class="text-danger">{{ $errors->first('slt_level') }}</span>
                              @endif
                          </div> <!-- /.errorMsg -->
                        </div> <!-- /.form-group -->
                      </div> <!-- /.col-md-4 -->


                    </div> <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" onClick="addStudent()" class="btn btn-primary btn-sm float-right" >Add</button>
                        </div>
                    </div>
                    </form>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col-md-4 -->
    </div>  <!-- /.row -->
</div> <!-- /.container -->

</div>
@endsection

@section('javascript')
  <!-- JQuery 3.4.1 -->
  <script type="application/javascript" src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


<!-- daterangepicker -->
<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data-2012-2022.min.js"></script>
<!-- datepicker -->
<script src="{{ asset('/dist/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('/dist/js/lobibox.js') }}"></script>


<script>
  $.widget.bridge('uibutton', $.ui.button)

</script>

  <script type="application/javascript">
    // alert(moment.tz.guess());

    // alert(moment.utc().local());
// moment.prototype.userFormat = function (format) {
//   if (timezone) {
//     this.tz(timezone);
//   }

//   if (lang) {
//     this.locale(lang);
//   }

//   if (format) {
//     return this.format(format);
//   }

//   return this.calendar();
// };

// console.log(
//   moment(d).userFormat()
// );
// console.log(
//   moment(d).userFormat('LLLL')
// );

// console.log(
//   moment(d).userFormat('dd Do YY')
// );
    function addStudent(){

        var d = new Date()
        var lang = 'in';
        var timezone = moment.tz.guess(); // Use timezone = null to use the browser timezone
        var user_time = new Date(d).toLocaleString('en-US', {
            timeZone: timezone
        });
            $("#local_time").val(user_time);



        $("#time_zone").val(moment.tz.guess());

        if($("#txt_student_name").val() == "")
        {
            Lobibox.notify('error', {
            size: 'normal',
            iconSource: 'fontAwesome',
            rounded: true,
            delayIndicator: false,
            msg: 'Student name not given!!',
            position: 'top center',
            });
           return false; 
        }
        if($("#txt_dob").val() == "")
        {
            Lobibox.notify('error', {
            size: 'normal',
            iconSource: 'fontAwesome',
            rounded: true,
            delayIndicator: false,
            msg: 'DOB is invalid or not given!!',
            position: 'top center',
            });
           return false; 
        }
        // if($("#txt_school_name").val() == "")
                // Lobibox.notify('error', {
                //     size: 'normal',
                //     iconSource: 'fontAwesome',
                //     rounded: true,
                //     delayIndicator: false,
                //     msg: 'Student name not given!!',
                //     position: 'top center',
                //     });
                // return false; 
        // }
        if($("#txt_std_grade").val() == "")
        {
            Lobibox.notify('error', {
            size: 'normal',
            iconSource: 'fontAwesome',
            rounded: true,
            delayIndicator: false,
            msg: 'Student grade not given!!',
            position: 'top center',
            });
           return false; 
        }
        if($("#slt_program").val() == "")
        {
            Lobibox.notify('error', {
            size: 'normal',
            iconSource: 'fontAwesome',
            rounded: true,
            delayIndicator: false,
            msg: 'Student Programme not selected!!',
            position: 'top center',
            });
           return false; 
        }
        if($("#slt_level").val() == "")
        {
            Lobibox.notify('error', {
            size: 'normal',
            iconSource: 'fontAwesome',
            rounded: true,
            delayIndicator: false,
            msg: 'Student level not selected!!',
            position: 'top center',
            });
           return false; 
        }
        $("#form-student-registration").submit();
    }
    var programme = [ {
        "brainobrain" : ['Level 1', 'Level 2', 'Level 3', 'Level 4', 'Level 5', 'Level 6', 'Level 7', 'Level 8', 'Level 9', 'Level 10'],
        "littlebob"   : ['Module 1', 'Module 2', 'Module 3', 'Module 4']

    }

        // {
        //     "name" : "brainobrain",
        //     'levels': [
        //         'Level 1', 'Level 2', 'Level 3', 'Level 4', 'Level 5', 'Level 6', 'Level 7', 'Level 8', 'Level 9', 'Level 10'
        //     ]
        // },
        // {
        //     "name" : "littlebob",
        //     'levels': [
        //         'Module 1', 'Module 2', 'Module 3', 'Module 4'
        //     ]
        // }
    ];

    function programmeChange(){
            if($('#slt_program').val() != ""){
                var optionCount = programme[0][$('#slt_program').val()].length;
                $("#slt_level").html("");
                $("#slt_level").append("<option value='' selected>Select</option>");
                for(a=0;a<optionCount;a++){

                    $("#slt_level").append("<option>"+programme[0][$('#slt_program').val()][a]+"</option>");
                }

                // alert(optionCount);
            }else{
                $("#slt_level").html("");
                $("#slt_level").append("<option value='' selected>Select</option>"); 
            }
    };

        // alert(programme[0]['littlebob'][0]);

function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}


    </script>

@endsection
