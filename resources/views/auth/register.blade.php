@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onliner | Register</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>

            .register{
                background: -webkit-linear-gradient(left, #3931af, #00c6ff);
                margin-top: 3%;
                padding: 3%;
            }
            .register-left{
                text-align: center;
                color: #fff;
                margin-top: 4%;
            }
            .register-left input{
                border: none;
                border-radius: 1.5rem;
                padding: 2%;
                width: 60%;
                background: #f8f9fa;
                font-weight: bold;
                color: #383d41;
                margin-top: 30%;
                margin-bottom: 3%;
                cursor: pointer;
            }
            .register-right{
                background: #f8f9fa;
                border-top-left-radius: 10% 50%;
                border-bottom-left-radius: 10% 50%;
            }
            .register-left img{
                margin-top: 15%;
                margin-bottom: 5%;
                width: 25%;
                -webkit-animation: mover 2s infinite  alternate;
                animation: mover 1s infinite  alternate;
            }
            @-webkit-keyframes mover {
                0% { transform: translateY(0); }
                100% { transform: translateY(-20px); }
            }
            @keyframes mover {
                0% { transform: translateY(0); }
                100% { transform: translateY(-20px); }
            }
            .register-left p{
                font-weight: lighter;
                padding: 12%;
                margin-top: -9%;
            }
            .register .register-form{
                padding: 10%;
                margin-top: 10%;
            }
            .btnRegister{
                float: right;
                margin-top: 10%;
                border: none;
                border-radius: 1.5rem;
                padding: 2%;
                background: #0062cc;
                color: #fff;
                font-weight: 600;
                width: 50%;
                cursor: pointer;
            }
            .register .nav-tabs{
                margin-top: 3%;
                border: none;
                background: #0062cc;
                border-radius: 1.5rem;
                width: 28%;
                float: right;
            }
            .register .nav-tabs .nav-link{
                padding: 2%;
                height: 34px;
                font-weight: 600;
                color: #fff;
                border-top-right-radius: 1.5rem;
                border-bottom-right-radius: 1.5rem;
            }
            .register .nav-tabs .nav-link:hover{
                border: none;
            }
            .register .nav-tabs .nav-link.active{
                width: 100px;
                color: #0062cc;
                border: 2px solid #0062cc;
                border-top-left-radius: 1.5rem;
                border-bottom-left-radius: 1.5rem;
            }
            .register-heading{
                text-align: center;
                margin-top: 8%;
                margin-bottom: -15%;
                color: #495057;
            }
    </style>
</head>
<body>
@section('content')

<!-- @if (!$errors->any())
    <div class="alert alert-success">
        <ul>
            <li>You have registered successfully!</li>
        </ul>
    </div>
@endif -->



<div class="container register">
                <div class="row">
                    <!-- login form -->
                    <div class="col-md-3 register-left">
                        <form mehthod="GET" action="{{route('showLoginForm')}}">
                            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                            <h3>Welcome</h3>
                            <p>You are 30 seconds away from earning your own money!</p>
                            <a href="{{ route('showLoginForm') }}" style="font:black" class="btn btn-light btn-rounded">Login</a>
                        </form>
                    </div>
                    
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Student</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Professor</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply as a Student</h3>
                                <form method="POST" action="{{route('register')}}">
                                    @csrf  
                                    <input type="hidden" name="student"/>
                                    <div class="row register-form">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="first_name"  type="text" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name"  />
                                                @error('first_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input name="last_name" type="text" value="{{ old('last_name') }}"  class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name"  />
                                                @error('last_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input name="password" value="{{ old('password') }}"  class="form-control @error('password') is-invalid @enderror" type="password"  placeholder="Password *" />
                                                @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input name="confirm_password" value="{{ old('confirm_password') }}"  class="form-control @error('confirm_password') is-invalid @enderror" type="password"  placeholder="Confirm Password *"  />
                                                @error('confirm_password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="maxl">
                                                    <label class="radio inline"> 
                                                        <input type="radio" name="gender" value="male" checked>
                                                        <span> Male </span> 
                                                    </label>
                                                    <label class="radio inline"> 
                                                        <input type="radio" name="gender" value="female">
                                                        <span>Female </span> 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="Your Email *"/>
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input name="phone" type="text" name="phone" class="form-control" placeholder="Your Phone" value="{{ old('phone') }}" />
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control @error('department') is-invalid @enderror" name = "department">
                                                    <option class="hidden" name="department_id" selected disabled>Department</option>
                                                    @foreach($departments as $department)
                                                    <option value="{{$department->id}}"  {{ (Request::old('department') == $department->id ? "selected":"" ) }} > {{$department->dep_name}}</option>
                                                    @endforeach 
                                                    
                                                </select>
                                                @error('department')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control @error('level') is-invalid @enderror" name = "level">
                                                    <option class="hidden" name="level_id" selected disabled>Level</option>
                                                    @foreach($levels as $level)
                                                    <option value="{{$level->id}}"  {{ (Request::old("level") == $level->id ? "selected":"" ) }}>Level {{$level->level_number}}</option>
                                                    @endforeach
                                                </select>
                                                @error('level')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <button type="submit" class="btnRegister"  >Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Apply as a Professor</h3>
                                <form method="POST" action="{{route('register')}}">
                                    @csrf
                                <input type="hidden" name="professor"/>
                                    <div class="row register-form">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="first_name" type="text" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name" />
                                                @error('first_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input name="last_name" type="text" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Last Name" />
                                                @error('last_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input name="email" type="email"  class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="Email *" />
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input name="phone" type="text"  class="form-control" placeholder="Phone" value="" />
                                                @error('phone')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="password" type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Password *" />
                                                @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input name="confirm_password" type="password" value="{{ old('confirm_password') }}" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Confirm Password *"  />
                                                @error('confirm_password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="department">
                                                    <option class="hidden"  selected disabled>Department</option>
                                                    @foreach($departments as $department)
                                                    <option value="{{$department->id}}"  {{ (Request::old('department') == $department->id ? "selected":"" ) }} >{{$department->dep_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('department')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <button type="submit" class="btnRegister"  value="Register">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <script>
    var msg = '{{Session::get('requestSent')}}';
    var exist = '{{Session::has('requestSent')}}';
    if(exist){
      alert(msg);
    }
  </script>
@endsection('content')
</body>
</html>