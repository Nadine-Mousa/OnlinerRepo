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
                                        <h5>edit Level</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5>Editing </h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <form  method="POST" action= "{{route('dashboard.levels.update',['level' => $level->id])}}" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="level_number">Level Number</label>
                                                        <input type="text" name="level_number" class="form-control" id="level_number"  value="{{$level->level_number}}">
                                                        
                                                    </div>
                                                  
                                                   
                                                    <button type="submit" class="btn btn-primary">Update</button>
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