@extends('layouts.admin')
@section('content')
<div class="container">
    @if (count($errors)>0)
    @foreach ($errors->all() as $item)
    <div class="alert alert-primary" role="alert">
      {{$item}}
    </div>
    @endforeach
        
    @endif

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Edit professor</h3>
                                    </div>
                                    <div class="card-body">
                                        <h5>Edit Form </h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <form  method="POST" action= "{{route('dashboard.professors.update',['professor' => $professor->id])}}" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="first_name">First name</label>
                                                        <input type="text" name="first_name" class="form-control" id="first_name"  value="{{$professor->first_name}}">
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="last_name">Last name</label>
                                                        <input type="text" name="last_name" class="form-control" id="last_name"  value="{{$professor->last_name}}">
                                                        
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="last_name">Email</label>
                                                        <input type="text" name="email" class="form-control" id="email"  value="{{$professor->email}}">
                                                        
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="text" name="password" class="form-control" id="password"  value="{{$professor->password}}">
                                                        
                                                    </div>


                                                    <div class="form-group">
                                                        <select class="form-control" name="department_id">
                                                            <option value="{{$professor->department->id}}" class="hidden"  selected >{{$professor->department->dep_name}}</option>
                                                            @foreach($departments as $department)
                                                            <option value="{{$department->id}}" > {{$department->dep_name}}</option>
                                                            @endforeach 
                                                            
                                                        </select>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <select class="form-control"  name="level_id">
                                                            <option class="hidden"  selected disabled>$professor->pro_level->level_number</option>
                                                            @foreach($levels as $level)
                                                            <option value="{{$level->id}}"  >{{ __('Level')}} {{$level->level_number}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div> -->

                                                    <!-- <div class="form-group">
                                                        <label for="verified">verified</label>
                                                        <input type="text" name="verified" class="form-control" id="verified"  value="{{$professor->verified}}">
                                                        
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="department_id">role</label>
                                                        <input type="text" name="role" class="form-control" id="role"  value="{{$professor->role}}">
                                                        
                                                    </div>

                                                  
                                                    
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                
            </div>
        </div>
    </div>
</div>

@endsection