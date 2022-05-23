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
                                        <h3>Edit Chapters</h3>
                                    </div>
                                    <div class="card-body">
                                        <h5>Edit Form </h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <form  method="POST" action= "{{route('dashboard.chapters.update',['chapter' => $chapter->id])}}" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="chapter_num">chapter number</label>
                                                        <input type="text" name="chapter_num" class="form-control" id="chapter_num"  value="{{$chapter->chapter_num}}">
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="chapter_name">chapter name</label>
                                                        <input type="text" name="chapter_name" class="form-control" id="chapter_name"  value="{{$chapter->chapter_name}}">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="chapter_desc">Chapter desc</label>
                                                        <input type="text" name="chapter_desc" class="form-control" id="Chapter_desc"  value="{{$chapter->chapter_desc}}">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="subject_id">>subject Id</label>
                                                        <input type="text" name="subject_id" class="form-control" id="subject_id"  value="{{$chapter->subject_id}}">
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="created_at">created at </label>
                                                        <input type="date"  name="created_at" class="form-control" id="created_at" value="{{$chapter->created_at}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="updated_at">updated at </label>
                                                        <input type="date" name="updated_at" class="form-control" id="updated_at"  value="{{$chapter->updated_at}}">
                                                        
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