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

                                                <form  method="POST" action= "{{route('dashboard.chapters.store')}}" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="chapter_num">chapter number</label>
                                                        <input type="text" name="chapter_num" class="form-control" id="chapter_num"  required>
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="chapter_name">chapter name</label>
                                                        <input type="text" name="chapter_name" class="form-control" id="chapter_name"  required >
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="chapter_desc">Chapter desc</label>
                                                        <input type="text" name="chapter_desc" class="form-control" id="chapter_desc"  required>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="subject_id">subject Id</label>
                                                        <input type="text" name="subject_id" class="form-control" id="subject_id" required >
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="created_at">created at </label>
                                                        <input type="date" name="created_at " class="form-control" id="created_at" required >
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="updated_at">updated at</label>
                                                        <input type="date"  name="updated_at" class="form-control" id="updated_at" required>
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