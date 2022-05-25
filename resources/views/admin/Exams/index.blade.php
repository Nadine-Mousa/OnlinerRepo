@extends('layouts.admin')
@section('content')

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->

        <!-- [ breadcrumb ] end -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- [ Main Content ] start -->
                <div class="row">
                    <!--[ daily sales section ] start-->
                    @foreach ($exams as $exam)
                    <div class="col-md-6 col-xl-4">
                        <div class="card daily-sales">
                            <div class="card-block">
                                <h3 class="mb-4"> exam key: {{$exam->exam_key}}</h3>
                                <h3 class="mb-4"> exam name: {{$exam->exam_name}}</h3>
                                <h3 class="mb-4"> duration: {{$exam->duration}}</h3>
                                <h3 class="mb-4"> created at: {{$exam->created_at}}</h3>
                                <h3 class="mb-4"> update at: {{$exam->updated_at}}</h3>
                                <h3 class="mb-4"> Is_dynamic : {{$exam->is_dynamic}}</h3>
                                <h3 class="mb-4"> total_questions : {{$exam->total_questions}}</h3>



                                <div class="row d-flex align-items-center">
                                    <div class="col-9">
                                        <h6 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>{{$exam->created_at}}</h6>
                                    </div>

                                    <div class="col-9">
                                        <a href="{{route('dashboard.exams.edit',['exam' => $exam->id])}}">Edit</a> &nbsp; &nbsp; &nbsp;
                                         <a href="{{route('dashboard.exams.delete',['exam' => $exam->id])}}" onclick="return confirm('Are you sure you want to delete this item?');">Remove</a>
                                    </div>



                                    <div class="col-3 text-right">
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="progress m-t-30" style="height: 7px;">
                                    <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!--[ daily sales section ] end-->



                </div>
            </div>
        </div>
    </div>
</div>


@endsection
