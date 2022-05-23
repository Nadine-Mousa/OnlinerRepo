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
                                        <h5>Create professor</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5>Form professor</h5>
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
                                                        <label for="level_id">level id</label>
                                                        <input type="text" name="level_id" class="form-control" id="level_id"  required >

                                                    </div>


                                                    <div class="form-group">
                                                        <label for="department_id">department id</label>
                                                        <input type="text" name="department_id" class="form-control" id="department_id"  required >

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="verified">verified</label>
                                                        <input type="text" name="verified" class="form-control" id="verified"  required >

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="role">role</label>
                                                        <input type="text" name="role" class="form-control" id="role"  required >

                                                    </div>


                                                    <div class="form-group">
                                                        <label for="chapter_count">Created at</label>
                                                        <input type="date" name="created_at" class="form-control" id="created_at"  required>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="updated_at">updated at</label>
                                                        <input type="date" name="updated_at" class="form-control" id="updated_at" required >

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
