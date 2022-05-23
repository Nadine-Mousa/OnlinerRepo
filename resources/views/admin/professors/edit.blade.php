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
                                                        <label for="first_name">first name</label>
                                                        <input type="text" name="first_name" class="form-control" id="first_name"  value="{{$professor->first_name}}">
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="last_name">last name</label>
                                                        <input type="text" name="last_name" class="form-control" id="last_name"  value="{{$professor->last_name}}">
                                                        
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="last_name">email</label>
                                                        <input type="text" name="email" class="form-control" id="email"  value="{{$professor->email}}">
                                                        
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password">password</label>
                                                        <input type="text" name="password" class="form-control" id="password"  value="{{$professor->password}}">
                                                        
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="level_id">level id</label>
                                                        <input type="text" name="level_id" class="form-control" id="level_id"  value="{{$professor->level_id}}">
                                                        
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="department_id">department id</label>
                                                        <input type="text" name="department_id" class="form-control" id="department_id"  value="{{$professor->department_id}}">
                                                        
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="verified">verified</label>
                                                        <input type="text" name="verified" class="form-control" id="verified"  value="{{$professor->verified}}">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="department_id">role</label>
                                                        <input type="text" name="role" class="form-control" id="role"  value="{{$professor->role}}">
                                                        
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="chapter_count">Crerated at</label>
                                                        <input type="date" name="created_at" class="form-control" id="created_at"  value="{{$professor->created_at}}">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="department_id">updated at</label>
                                                        <input type="date" name="updated_at" class="form-control" id="updated_at"  value="{{$professor->updated_at}}">
                                                        
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