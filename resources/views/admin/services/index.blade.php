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
                                        <h5>Basic Componant</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5>Form controls</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <form  method="POST" action= "{{route('dashboard.subjects.store')}}" >
                                                    @csrf
                                                    
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
                                                    
                                                   
                                                    <button type="submit" class="btn btn-primary">Show Subjects</button>
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