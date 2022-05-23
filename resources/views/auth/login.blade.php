@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onliner | Login</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    
    <style>

        .divider:after,
        .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
        }
        .h-custom {
        height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
        .h-custom {
        height: 100%;
        }
        }
    </style>
</head>
<body style="background: #ccd1e5; font-family: sans-serif;">

@section('content')

@if ($error = $errors->first('login_failed'))
  <div class="alert alert-danger">
    {{ $error }}
  </div>
@endif

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="assets/images/login/laptop5.jpg" width="800" height="700"
          class="img-fluid" alt="Sample image">
      </div>

      
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        

  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ Config::get('languages')[App::getLocale()] }}
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
  @foreach (Config::get('languages') as $lang => $language)
      @if ($lang != App::getLocale())
              <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
      @endif
  @endforeach
  </div>


          <!-- form -->
        <form method="POST" action="{{route('login')}}">
            @csrf
            <i class="fa-brands fa-github-square"></i>
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">{{ __('Sign in with')}}</p>
            <button style="background: #323a56;" type="button" class="btn  btn-floating mx-1">
              <i class="fa-brands fa-facebook"></i>
            </button>
            
            <button style="background: #323a56;" type="button" class="btn  btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button style="background: #323a56;" type="button" class="btn  btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">{{ __('Or')}}</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input name="email" type="email"
              value="{{ old('email') }}" class="form-control form-control-lg @error('email') is-invalid @enderror"
              placeholder="{{ __('Enter a valid email address')}}" />
              @error('email')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
            <label class="form-label" >{{ __('Email address')}}</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input name="password" type="password" 
              value="{{ old('password') }}" class="form-control form-control-lg @error('password') is-invalid @enderror"
              placeholder="{{ __('Enter password')}}" />
              @error('password')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
            <label class="form-label" >{{ __('Password')}}</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                {{ __('Remember me')}}
              </label>
            </div>
            <a href="#" class="text-body">{{ __('Forgot password?')}}</a>
          </div>
            <!-- button  -->
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-lg text-white"
              style="padding-left: 2.5rem; padding-right: 2.5rem; background: #323a56;">{{ __('Login')}}</button>
            <p class="small fw-bold mt-2 pt-1 mb-0"> {{ __('Do not have an account?')}}
            <a href="{{ route('showRegisterForm') }}" class="link-danger">{{ __('Register')}}</a></p>
              </p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
     style="background: #323a56;" class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 ">
    
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
     {{ __( 'Copyright © 2022 Onliner | All rights reserved.')}}
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fa fa-facebook"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
</section>
@endsection('content')
    
</body>
</html>
