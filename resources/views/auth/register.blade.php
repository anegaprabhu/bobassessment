@extends('layouts.app')

@section('content')

<div class="authwrapper">
    <div class="regbox">
        <div >
        <div class="text-center mb-4">
                    <img src="{{ asset('images/brainobrain-logo.png') }}" alt="logo" />
            </div>
            <div class="card">
                <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Register') }}
                
                @isset($url) 
                    <span class="float-right">Parent</span>
                @else
                    <span class="float-right">Franchisee</span>
                @endisset
                </div>
                
                <div class="header card-title" style="background: aliceblue;padding:20px;" >
                @isset($url) 
                      <div class="float-left"><b>Parent Registration</b></div>
                      <div class="float-right"><a href="{{ route('register') }}">Switch to Franchisee Registration</a></div>
                @else
                      <div class="float-left"><b>Franchisee Registration</b></div>
                      <div class="float-right"><a href="{{ route('register.parents') }}">Switch to Parent Registration</a></div>        
                @endisset
                 </div>

                <div class="card-body">
                    @isset($url)
                    <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
		    <input type="hidden" name="flag" id="flag" value="parents">	
                    @else
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
		    <input type="hidden" name="flag" id="flag" value="franchisee">	
                    @endisset
                        @csrf

                        <div class="form-group">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>

                            <div>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        </div>
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('Verification Code') }}</label>

                            <div>
                                <input id="verification_code" type="text" class="form-control @error('verification_code') is-invalid @enderror" name="verification_code" required autocomplete="verification_code">
                                @if ($errors->has('verification_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('verification_code') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>
                        </div>
                        </div>


                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        </div>
                        </div>
                        <div class="form-group mb-0 mt-3">
                            <div class="text-center">
                                <button type="submit" class="ctabtn btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
