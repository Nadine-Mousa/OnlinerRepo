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
                                        <h3>Edit Exam</h3>
                                    </div>
                                    <div class="card-body">
                                        <h5>Edit Exam </h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <form  method="POST" action= "{{route('dashboard.exams.update',['exam' => $exam->id])}}" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exam_key">Exam key</label>
                                                        <input type="text" name="exam_key" class="form-control" id="exam_key"  value="{{$exam->exam_key}}">
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="exam_name">Exam Name</label>
                                                        <input type="text" name="exam_name" class="form-control" id="exam_name"  value="{{$exam->exam_name}}">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="duration">duration</label>
                                                        <input type="text" name="duration" class="form-control" id="duration"  value="{{$exam->duration}}">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="start_time">start time</label>
                                                        <input type="text" name="start_time" class="form-control" id="start_time"  value="{{$exam->start_time}}">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="end_time">end time </label>
                                                        <input type="text" name="end_time" class="form-control" id="end_time"  value="{{$exam->end_time}}">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="total_questions">total questions</label>
                                                        <input type="text"  name="total_questions" class="form-control" id="total_questions" value="{{$exam->total_questions}}">
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="created_at">created At</label>
                                                        <input type="text" name="created_at" class="form-control" id="created_at"  value="{{$exam->created_at}}">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="update_at">update At </label>
                                                        <input type="text" name="updated_at" class="form-control" id="updated_at"  value="{{$exam->updated_at}}">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="is_dynamic">Is dynamicty</label>
                                                        <input type="text"  name="is_dynamic" class="form-control" id="is_dynamic" value="{{$exam->is_dynamic}}">
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