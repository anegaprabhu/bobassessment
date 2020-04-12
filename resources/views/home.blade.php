@extends('layouts.auth')

@section('content')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/dist/plugins/select2/select2.min.css') }}">
    <link href="{{ asset('dist/css/lobibox.css')}}" rel="stylesheet">
@endpush

<div class="wrapper">
<div class="container">
    @if(count($franchisee) > 0)
      @if($franchisee[0]->profile_status == "N")
    <form method="POST" id="form-profile-update" action="{{url('home/store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="time_zone" id="time_zone" value="" />
        <input type="hidden" name="local_time" id="local_time" value="" />

      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    <h4>Profile Update</h4>

                    </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Country <span class="text-danger">*</span></label>
                          <select onChange="countryChange()" class="form-control select2" style="width: 100%;" name="slt_center_country" id="slt_center_country" >
                            <option value="" selected>Select Country</option>
                            @foreach ($countries as $k => $country)
                                <option value="{{$k}}" {{(old('slt_center_country')  == $k ) ? 'selected' : '' }}>{{$country}}</option>
                            @endforeach
                          </select>
                          <div class="errorMsg" style="width: 100%">
                              @if ($errors->has('slt_center_country'))
                                <span class="text-danger">{{ $errors->first('slt_center_country') }}</span>
                              @endif
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>State <span class="text-danger">*</span></label>
                          <select onChange="stateChange()" class="form-control select2" style="width: 100%;" name="slt_center_state" id="slt_center_state" >
                            <option value="" selected>Select State</option>
                            @if (old('slt_center_state'))
                              @foreach ($states as $k => $states)
                                  <option value="{{$k}}" {{(old('slt_center_state')  == $k ) ? 'selected' : '' }}>{{$states}}</option>
                              @endforeach                                
                            @endif
                          </select>
                          <div class="errorMsg" style="width: 100%">
                              @if ($errors->has('slt_center_state'))
                                <span class="text-danger">{{ $errors->first('slt_center_state') }}</span>
                              @endif
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>City <span class="text-danger">*</span></label> 
                          <select class="form-control select2" style="width: 100%;" name="slt_center_city" id="slt_center_city" >
                            <option value="" selected>Select City</option>
                            @if (old('slt_center_city'))
                              @foreach ($cities as $k => $cities)
                                  <option value="{{$k}}" {{(old('slt_center_city')  == $k ) ? 'selected' : '' }}>{{$cities}}</option>
                              @endforeach                                
                            @endif                            
                          </select>
                          <div class="errorMsg" style="width: 100%">
                              @if ($errors->has('slt_center_city  '))
                                <span class="text-danger">{{ $errors->first('slt_center_city') }}</span>
                              @endif
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Area <span class="text-danger">*</span></label>
                          <input type="text" name="txt_center_area" id="txt_center_area" value="{{old('txt_center_area')}}" class="form-control" autocomplete="off">
                          <div class="errorMsg" style="width: 100%">
                              @if ($errors->has('txt_center_area'))
                                <span class="text-danger">{{ $errors->first('txt_center_area') }}</span>
                              @endif
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Postal Code <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="txt_center_pin" id="txt_center_pin" value="{{old('txt_center_pin')}}" autocomplete="off">
                          <div class="errorMsg" style="width: 100%">
                              @if ($errors->has('txt_center_pin'))
                                <span class="text-danger">{{ $errors->first('txt_center_pin') }}</span>
                              @endif
                          </div>
                        </div>
                      </div>                      

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Center Name <span class="text-danger">*</span></label>
                          <input type="text" name="txt_business_name" id="txt_business_name" class="form-control" value="{{old('txt_business_name')}}" autocomplete="off">
                          <div class="errorMsg" style="width: 100%">
                              @if ($errors->has('txt_business_name'))
                                <span class="text-danger">{{ $errors->first('txt_business_name') }}</span>
                              @endif
                          </div>
                        </div>
                      </div> 


                    </div>
                  </div>
                  <div class="card-footer"><button onClick="updateProfile()" type="button" class="btn btn-primary float-right">Update</button></div>
              </div>
          </div>
      </div>
    </form>
      @else
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">Franchisee Details</div>

                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <p>Franchisee code: {{$franchisee_code}}</p>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        @if(count($students) > 0)
          <div class="row justify-content-center">
              <div class="col-md-12">
                  <div class="card mt-2">
                      <div class="card-header">Students</div>
                  </div>

                  @foreach($students as $k => $student)
                      <div class="card mb-2">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6">
                                      <h4>{{$student->student_name}}</h4>
                                      <h5>{{$student->programme}} ({{$student->level}})</h5>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach


              </div>
          </div>

        @endif
      @endif

    @endif
</div>
</div>
@endsection

@section('javascript')
  <!-- JQuery 3.4.1 -->
  <script type="application/javascript" src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
<!-- jQuery -->
<!-- <script src="{{ asset('/dist/plugins/jquery/jquery.min.js') }}"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


  <!-- Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data-2012-2022.min.js"></script>

  <!-- Select2 -->
  <script src="{{ asset('/dist/plugins/select2/select2.full.min.js') }}"></script>

  <script src="{{ asset('/dist/js/lobibox.js') }}"></script>


  <script type="application/javascript">
    // $('.select2').select2();


    function countryChange(){
      var countryID = $("#slt_center_country").val();   
      if(countryID){
          $.ajax({
             type:"GET",
             url:"{{url('home/get-state-list')}}?country_id="+countryID,
             success:function(res){               
              if(res){
                  $("#slt_center_state").empty();
                  $("#slt_center_state").append('<option value="">Select State</option>');
                  $.each(res,function(key,value){
                      $("#slt_center_state").append('<option value="'+key+'">'+value+'</option>');
                  });
             
              }else{
                 $("#slt_center_state").empty();
                 $("#slt_center_state").append('<option value="" selected>Select State</option>');
                 $("#slt_center_city").empty();
                 $("#slt_center_city").append('<option value="" selected>Select City</option>');
              }
             }
          });
      }else{
          $("#slt_center_state").empty();
          $("#slt_center_state").append('<option value="" selected>Select State</option>');
          $("#slt_center_city").empty();
          $("#slt_center_city").append('<option value="" selected>Select City</option>');
      }      
    };

    function stateChange(){
      var stateID = $("#slt_center_state").val();    
      if(stateID){
          $.ajax({
             type:"GET",
             url:"{{url('home/get-city-list')}}?state_id="+stateID,
             success:function(res){               
              if(res){
                  $("#slt_center_city").empty();
                  $("#slt_center_city").append('<option value="">Select City</option>');
                  $.each(res,function(key,value){
                      $("#slt_center_city").append('<option value="'+key+'">'+value+'</option>');
                  });
             
              }else{
                 $("#slt_center_city").empty();
                 $("#slt_center_city").append('<option value="" selected>Select City</option>');
              }
             }
          });
      }else{
          $("#slt_center_city").empty();
          $("#slt_center_city").append('<option value="" selected>Select City</option>');
      }          

    }


    function updateProfile(){

      var d = new Date()
      var lang = 'in';
      var timezone = moment.tz.guess(); // Use timezone = null to use the browser timezone
      var user_time = new Date(d).toLocaleString('en-US', {
          timeZone: timezone
      });
          $("#local_time").val(user_time);

      $("#time_zone").val(moment.tz.guess());
      
      if($("#slt_center_country").val() == "")
      {
          Lobibox.notify('error', {
          size: 'normal',
          iconSource: 'fontAwesome',
          rounded: true,
          delayIndicator: false,
          msg: 'Country not Selected!!',
          position: 'top center',
          });
          return false; 
      }
      
      if($("#slt_center_state").val() == "")
      {
          Lobibox.notify('error', {
          size: 'normal',
          iconSource: 'fontAwesome',
          rounded: true,
          delayIndicator: false,
          msg: 'State not Selected!!',
          position: 'top center',
          });
          return false; 
      }
      
      if($("#slt_center_city").val() == "")
      {
          Lobibox.notify('error', {
          size: 'normal',
          iconSource: 'fontAwesome',
          rounded: true,
          delayIndicator: false,
          msg: 'City not Selected!!',
          position: 'top center',
          });
          return false; 
      }

      if($("#txt_center_area").val() == "")
      {
          Lobibox.notify('error', {
          size: 'normal',
          iconSource: 'fontAwesome',
          rounded: true,
          delayIndicator: false,
          msg: 'Area not given!!',
          position: 'top center',
          });
          return false; 
      }

      if($("#txt_center_pin").val() == "")
      {
          Lobibox.notify('error', {
          size: 'normal',
          iconSource: 'fontAwesome',
          rounded: true,
          delayIndicator: false,
          msg: 'Postal code not given!!',
          position: 'top center',
          });
          return false; 
      }

      if($("#txt_business_name").val() == "")
      {
          Lobibox.notify('error', {
          size: 'normal',
          iconSource: 'fontAwesome',
          rounded: true,
          delayIndicator: false,
          msg: 'Center name not given!!',
          position: 'top center',
          });
          return false; 
      }

      $("#form-profile-update").submit();

    }

function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}


    </script>

@endsection
