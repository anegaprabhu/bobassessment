@extends('layouts.app')

@section('content')
<div class="authwrapper">
    <div class="row loginbox">
        <div class=""> <!-- empty class div -->
            <div class="text-center mb-4">
                    <img src="{{ asset('images/brainobrain-logo.png') }}" alt="logo" />
            </div> <!-- /.text-center bg image container -->
            <div class="card col-md-18">
                
                <div class="card-header">{{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}
                
                @isset($url) 
                    <span class="float-right">Parent</span>
                @else
                    <span class="float-right">Franchisee</span>
                @endisset
                
                </div> <!-- /.card-header -->

                <div class="header card-title" style="background: aliceblue;padding:20px;width: 400px;" >
                @isset($url) 
                      <div class="float-left"><b>Parent Login</b></div>
                      <div class="float-right"><a href="{{ route('login') }}">Switch to Franchisee Login</a></div>
                @else
                      <div class="float-left"><b>Franchisee Login</b></div>
                      <div class="float-right"><a href="{{ route('login.parents') }}">Switch to Parent Login</a></div>        
                @endisset
                 </div>


                <div class="card-body">


                    @isset($url)
                    <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                    @else
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div> <!-- /div -->
                        </div> <!-- /.form-group -->

                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> <!-- /.form-group -->

                        <div class="form-group mb-0">
                            <div class="">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} /> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> <!-- /.form-group -->

                        <div class="form-group mb-0">
                            <div class="text-center">
                                <button type="submit" class="ctabtn btn btn-primary d-block ctabtn mb-2">
                                    {{ __('Login') }}
                                </button>
                                <div class="text-center">
                                    <small>
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                    <br>
                                    <a href="{{ url('/') }}">
                                        {{ __('Sign Up?') }}
                                    </a>

                                    </small>
                                </div> <!-- /div -->
                            </div> <!-- /.text-center -->
                        </div> <!-- /.form-group -->

                    </form>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /. empty class div -->
    </div>
</div>
@endsection
