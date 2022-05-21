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

                                                <form  method="POST" action= "{{route('dashboard.departments.update',['department' => $department->id])}}" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Department Name</label>
                                                        <input type="text" name="dep_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$department->dep_name}}">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Department Description</label>
                                                        <input type="text"  name="dep_description" class="form-control" id="exampleInputPassword1" value="{{$department->dep_description}}">
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