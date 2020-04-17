<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/dist/plugins/font-awesome/css/font-awesome.min.css') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/breakpoint.css') }}" rel="stylesheet">

    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('/dist/plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('/dist/plugins/daterangepicker/daterangepicker-bs3.css') }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/lobibox.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/plugins/toggle-button/css/bootstrap4-toggle.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

<!-- Side overlay menu -->
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">

  @if(Auth::user())  
    @if(Auth::user()->franchisee_id_fk)  
        <a class="dropdown-item" href="{{ url('parents') }}">
            {{ Auth::user()->name }} 
        </a>
        <a href="{{url('parents')}}">Students</a>
    @else
        <a class="dropdown-item" href="{{ url('home') }}">
        {{ Auth::user()->name }}
        </a>
    @endif
  @endif

    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

  </div>
</div>


@if (\Route::current()->getName() != 'login' 
        && \Route::current()->getName() != 'register' 
        && \Route::current()->getName() != 'login.parents'
        && \Route::current()->getName() != 'register.parents'
    ) 
    <span style=" position: absolute; top: 500; left: 0; z-index: 10; font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
@endif



        <main class="py-4">
            @yield('content')
        </main>
    </div>

<!-- Scripts -->
<!-- jQuery -->
<script src="{{ asset('/dist/plugins/jquery/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data-2012-2022.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script type="application/javascript" src="{{ URL::asset('dist/plugins/toggle-button/js/bootstrap4-toggle.min.js') }}"></script>

@stack('js')

    @yield('javascript')
</body>
</html>
