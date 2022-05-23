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

                                                <form  method="POST" action= "{{route('dashboard.exams.store')}}" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exam_key">Exam key</label>
                                                        <input type="text" name="exam_key" class="form-control" id="exam_key"  required>

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="subject_description">Exam Name</label>
                                                        <input type="text" name="exam_name" class="form-control" id="exam_name"  required >

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="duration">duration</label>
                                                        <input type="text" name="duration" class="form-control" id="duration"  required>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="start_time">start time</label>
                                                        <input type="text" name="start_time" class="form-control" id="start_time" required >

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="end_time">end time </label>
                                                        <input type="text" name="end_time" class="form-control" id="end_time" required >

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="total_questions">total questions</label>
                                                        <input type="text"  name="total_questions" class="form-control" id="total_questions" required>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="created_at">created At</label>
                                                        <input type="text"  name="created_at" class="form-control" id="created_at" required>
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="update_at">update At</label>
                                                        <input type="text"  name="updated_at" class="form-control" id="updated_at" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="is_dynamic">is dynamic</label>
                                                        <input type="text"  name="is_dynamic" class="form-control" id="is_dynamic" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="professor_id">professor id</label>
                                                        <input type="text"  name="professor_id" class="form-control" id="professor_id" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="subject_id">subject id</label>
                                                        <input type="text"  name="subject_id" class="form-control" id="subject_id" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="department_id">deprtment id</label>
                                                        <input type="text"  name="department_id" class="form-control" id="department_id" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="level_id">Level id</label>
                                                        <input type="text"  name="level_id" class="form-control" id="level_id" required>
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