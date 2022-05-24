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
                                        <h3>Edit Subject</h3>
                                    </div>
                                    <div class="card-body">
                                        <h5>Edit Form </h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <form  method="POST" action= "{{route('dashboard.subjects.update',['subject' => $subject->id])}}" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="subject_name">Subject Name</label>
                                                        <input type="text" name="subject_name" class="form-control" id="subject_name"  value="{{$subject->subject_name}}">
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="subject_description">Subject description</label>
                                                        <input type="text" name="subject_description" class="form-control" id="subject_description"  value="{{$subject->subject_description}}">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="chapter_count">Chapter Count</label>
                                                        <input type="text" name="chapter_count" class="form-control" id="chapter_count"  value="{{$subject->chapter_count}}">
                                                        
                                                    </div>

                                                    <div class="form-group">
                                                        <select class="form-control" name="department_id">
                                                            <option class="hidden"  selected disabled>{{$subject->sub_department->dep_name}}</option>
                                                            @foreach($departments as $department)
                                                            <option value="{{$department->id}}" > {{$department->dep_name}}</option>
                                                            @endforeach 
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control"  name="level_id">
                                                            <option class="hidden"  selected disabled>{{ $subject->subject_level->level_number}}</option>
                                                            @foreach($levels as $level)
                                                            <option value="{{$level->id}}"  >{{ __('Level')}} {{$level->level_number}}</option>
                                                            @endforeach
                                                        </select>
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