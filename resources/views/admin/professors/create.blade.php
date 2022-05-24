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
                                        <h5>Create User</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5>Form User</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <form  method="POST" action= "{{route('dashboard.professors.store')}}" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="first_name">first name</label>
                                                        <input type="text" name="first_name" class="form-control" id="first_name"  required>

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="last_name">last name</label>
                                                        <input type="text" name="last_name" class="form-control" id="last_name"  required >

                                                    </div>


                                                    <div class="form-group">
                                                        <label for="email">email</label>
                                                        <input type="text" name="email" class="form-control" id="email"  value="" required >

                                                    </div>



                                                    <div class="form-group">
                                                        <label for="password">password</label>
                                                        <input type="password" name="password" class="form-control"  id="password" value="" required >

                                                    </div>



                                                    <div class="form-group">
                                                        <select class="form-control" name="department_id">
                                                            <option class="hidden"  selected disabled>{{ __('Department')}}</option>
                                                            @foreach($departments as $department)
                                                            <option value="{{$department->id}}" > {{$department->dep_name}}</option>
                                                            @endforeach 
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control"  name="level_id">
                                                            <option class="hidden"  selected disabled>{{ __('Level')}}</option>
                                                            @foreach($levels as $level)
                                                            <option value="{{$level->id}}"  >{{ __('Level')}} {{$level->level_number}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <select class="form-control"  name="role">
                                                            <option class="hidden"  selected disabled>{{ __('Role')}}</option>
                                                            @foreach($roles as $role)
                                                            <option value="{{$role->id}}"  > {{$role->role_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="verified">verified</label>
                                                        <input type="text" name="verified" class="form-control" id="verified"  required >

                                                    </div>


                                                   


                                                    <button type="submit" class="btn btn-primary">Create</button>
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
