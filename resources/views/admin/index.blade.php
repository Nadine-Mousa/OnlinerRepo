@extends('layouts.admin')
@section('content')
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- [ breadcrumb ] start -->

            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">
                   
                        <!--[ daily sales section ] start-->
                 
    <div class="col-md-6 col-xl-4">
                            <div class="card daily-sales">
                                <div class="card-block">
                                    <h6 class="mb-4">Total Students</h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-9">
                                            <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i> {{$usersCount}}</h3>
                                        </div>

                                        <div class="col-3 text-right">
                                            <p class="m-b-0">67%</p>
                                        </div>
                                    </div>
                                    <div class="progress m-t-30" style="height: 7px;">
                                        <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[ daily sales section ] end-->
                        <!--[ Monthly  sales section ] starts-->
                        <div class="col-md-6 col-xl-4">
                            <div class="card Monthly-sales">
                                <div class="card-block">
                                    <h6 class="mb-4">Total Subjects </h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-9">
                                            <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-down text-c-red f-30 m-r-10"></i>{{$subjectsCount}}</h3>
                                        </div>
                                        <div class="col-3 text-right">
                                            <p class="m-b-0">36%</p>
                                        </div>
                                    </div>
                                    <div class="progress m-t-30" style="height: 7px;">
                                        <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[ Monthly  sales section ] end-->
                        <!--[ year  sales section ] starts-->
                        <div class="col-md-12 col-xl-4">
                            <div class="card yearly-sales">
                                <div class="card-block">
                                    <h6 class="mb-4">Total Professors</h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-9">
                                            <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>{{$professorssCount}}</h3>
                                        </div>
                                        <div class="col-3 text-right">
                                            <p class="m-b-0">80%</p>
                                        </div>
                                    </div>
                                    <div class="progress m-t-30" style="height: 7px;">
                                        <div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  start of last three div-->




                        <div class="col-md-6 col-xl-4">
                            <div class="card daily-sales">
                                <div class="card-block">
                                    <h6 class="mb-4">Total Exams</h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-9">
                                            <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i> {{$examssCount}}</h3>
                                        </div>

                                        <div class="col-3 text-right">
                                            <p class="m-b-0">67%</p>
                                        </div>
                                    </div>
                                    <div class="progress m-t-30" style="height: 7px;">
                                        <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[ daily sales section ] end-->
                        <!--[ Monthly  sales section ] starts-->
                        <div class="col-md-6 col-xl-4">
                            <div class="card Monthly-sales">
                                <div class="card-block">
                                    <h6 class="mb-4">Total Departments </h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-9">
                                            <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-down text-c-red f-30 m-r-10"></i>{{$DepartmentsCount}}</h3>
                                        </div>
                                        <div class="col-3 text-right">
                                            <p class="m-b-0">36%</p>
                                        </div>
                                    </div>
                                    <div class="progress m-t-30" style="height: 7px;">
                                        <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[ Monthly  sales section ] end-->
                        <!--[ year  sales section ] starts-->
                        <div class="col-md-12 col-xl-4">
                            <div class="card yearly-sales">
                                <div class="card-block">
                                    <h6 class="mb-4">Total Subjects Chapters</h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-9">
                                            <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>{{$ChaptersCount}}</h3>
                                        </div>
                                        <div class="col-3 text-right">
                                            <p class="m-b-0">80%</p>
                                        </div>
                                    </div>
                                    <div class="progress m-t-30" style="height: 7px;">
                                        <div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end of last three div-->
                        <!--[ year  sales section ] end-->
                        <!--[ Recent Users ] start-->
                        <div class="col-xl-8 col-md-6">
                            <div class="card Recent-Users">
                                <div class="card-header">
                                    <h5>Professors Signup Requests</h5>
                                </div>
                                <div class="card-block px-0 py-3">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                               @foreach ($professors as $professor)
                                               <tr class="unread">
                                                <td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user"></td>
                                                <td>
                                                    <h6 class="mb-1">{{$professor->first_name}}</h6>
                                                    <p class="m-0">{{$professor->email}}</p>
                                                </td>
                                                <td>
                                                    <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>{{$user->created_at}}</h6>
                                                </td>
                                                <td><a href="{{route('dashboard.reject_prof',['professor' => $professor->id ])}}" class="label theme-bg2 text-white f-12">Reject</a><a href="{{route('dashboard.approve_prof',['professor' => $professor->id ])}}" class="label theme-bg text-white f-12">Approve</a></td>
                                            </tr>

                                               @endforeach



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[ Recent Users ] end-->

                        <!-- [ statistics year chart ] start -->
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-event">
                                <div class="card-block">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col">
                                            <h5 class="m-0">Upcoming Event</h5>
                                        </div>
                                        <div class="col-auto">
                                            <label class="label theme-bg2 text-white f-14 f-w-400 float-right">34%</label>
                                        </div>
                                    </div>
                                    <h2 class="mt-3 f-w-300">45<sub class="text-muted f-14">Competitors</sub></h2>
                                    <h6 class="text-muted mt-4 mb-0">You can participate in event </h6>
                                    <i class="fab fa-angellist text-c-purple f-50"></i>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-block border-bottom">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-auto">
                                            <i class="feather icon-zap f-30 text-c-green"></i>
                                        </div>
                                        <div class="col">
                                            <h3 class="f-w-300">235</h3>
                                            <span class="d-block text-uppercase">TOTAL IDEAS</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-auto">
                                            <i class="feather icon-map-pin f-30 text-c-blue"></i>
                                        </div>
                                        <div class="col">
                                            <h3 class="f-w-300">26</h3>
                                            <span class="d-block text-uppercase">TOTAL LOCATIONS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ statistics year chart ] end -->
                        <!--[social-media section] start-->
                        <div class="col-md-12 col-xl-4">
                            <div class="card card-social">
                                <div class="card-block border-bottom">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-auto">
                                            <i class="fab fa-facebook-f text-primary f-36"></i>
                                        </div>
                                        <div class="col text-right">
                                            <h3>12,281</h3>
                                            <h5 class="text-c-green mb-0">+7.2% <span class="text-muted">Total Likes</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="row align-items-center justify-content-center card-active">
                                        <div class="col-6">
                                            <h6 class="text-center m-b-10"><span class="text-muted m-r-5">Target:</span>35,098</h6>
                                            <div class="progress">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width:60%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-center  m-b-10"><span class="text-muted m-r-5">Duration:</span>3,539</h6>
                                            <div class="progress">
                                                <div class="progress-bar progress-c-theme2" role="progressbar" style="width:45%;height:6px;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card card-social">
                                <div class="card-block border-bottom">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-auto">
                                            <i class="fab fa-twitter text-c-blue f-36"></i>
                                        </div>
                                        <div class="col text-right">
                                            <h3>11,200</h3>
                                            <h5 class="text-c-purple mb-0">+6.2% <span class="text-muted">Total Likes</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="row align-items-center justify-content-center card-active">
                                        <div class="col-6">
                                            <h6 class="text-center m-b-10"><span class="text-muted m-r-5">Target:</span>34,185</h6>
                                            <div class="progress">
                                                <div class="progress-bar progress-c-green" role="progressbar" style="width:40%;height:6px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-center  m-b-10"><span class="text-muted m-r-5">Duration:</span>4,567</h6>
                                            <div class="progress">
                                                <div class="progress-bar progress-c-blue" role="progressbar" style="width:70%;height:6px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card card-social">
                                <div class="card-block border-bottom">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-auto">
                                            <i class="fab fa-google-plus-g text-c-red f-36"></i>
                                        </div>
                                        <div class="col text-right">
                                            <h3>10,500</h3>
                                            <h5 class="text-c-blue mb-0">+5.9% <span class="text-muted">Total Likes</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="row align-items-center justify-content-center card-active">
                                        <div class="col-6">
                                            <h6 class="text-center m-b-10"><span class="text-muted m-r-5">Target:</span>25,998</h6>
                                            <div class="progress">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width:80%;height:6px;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-center  m-b-10"><span class="text-muted m-r-5">Duration:</span>7,753</h6>
                                            <div class="progress">
                                                <div class="progress-bar progress-c-theme2" role="progressbar" style="width:50%;height:6px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--[social-media section] end-->
                        <!-- [ rating list ] starts-->
                        <div class="col-xl-4 col-md-6">
                            <div class="card user-list">
                                <div class="card-header">
                                    <h5>Rating</h5>
                                </div>
                                <div class="card-block">
                                    <div class="row align-items-center justify-content-center m-b-20">
                                        <div class="col-6">
                                            <h2 class="f-w-300 d-flex align-items-center float-left m-0">4.7 <i class="fas fa-star f-10 m-l-10 text-c-yellow"></i></h2>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="d-flex  align-items-center float-right m-0">0.4 <i class="fas fa-caret-up text-c-green f-22 m-l-10"></i></h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>5</h6>
                                            <h6 class="align-items-center float-right">384</h6>
                                            <div class="progress m-t-30 m-b-20" style="height: 6px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>4</h6>
                                            <h6 class="align-items-center float-right">145</h6>
                                            <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>3</h6>
                                            <h6 class="align-items-center float-right">24</h6>
                                            <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>2</h6>
                                            <h6 class="align-items-center float-right">1</h6>
                                            <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>1</h6>
                                            <h6 class="align-items-center float-right">0</h6>
                                            <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                                <div class="progress-bar" role="progressbar" style="width:0;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ rating list ] end-->
                        <div class="col-xl-8 col-md-12 m-b-30">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Subjects requests</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active show" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Students</a>
                                </li>
                                
                            </ul>
                            <!-- Subjects Approval Requests -->

                            <!-- Students Requests -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Professor Name</th>
                                                <th>Subject Name</th>
                                                <th>Email</th>
                                                <th ></th>
                                                <th ></th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                        @foreach ($professor_subjects as $professor_subject)
                                        
                                            <tr>
                                                <td>
                                                    <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="assets/images/user/avatar-2.jpg" alt="activity-user">{{$professor_subject->professor->first_name}}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="m-0">{{$professor_subject->subject->subject_name}}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="m-0">{{$professor_subject->professor->email}}</h6>
                                                </td>
                                                
                                                <td><a href="{{route('dashboard.reject_prof_subject',['professor_subject' => $professor_subject->id ])}}" class="label theme-bg2 text-white f-12">Reject</a></td>
                                                <td><a href="{{route('dashboard.approve_prof_subject',['professor_subject' => $professor_subject->id ])}}" class="label theme-bg text-white f-12">Approve</a></td>
                                            </tr>

                                       
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Department</th>
                                                <th>Level</th>
                                                <th>Eamil</th>
                                                <th class="text-right"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($students as $student)
                                        
                                            <tr>
                                                <td>
                                                    <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="assets/images/user/avatar-2.jpg" alt="activity-user">{{$student->first_name}}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="m-0">{{$student->department->dep_name}}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="m-0"> Level {{$student->pro_level->level_number}}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="m-0 text-c-green">{{$student->email}}</h6>
                                                </td>
                                                <td><a href="{{route('dashboard.reject_student',['student' => $student->id ])}}" class="label theme-bg2 text-white f-12">Reject</a></td>
                                                <td><a href="{{route('dashboard.approve_student',['student' => $student->id ])}}" class="label theme-bg text-white f-12">Approve</a></td>
                                            </tr>

                                       
                                        @endforeach
                                        </tbody>
                                    </table>
                        

                                </div>
                                
                              
                            </div>


                        </div>

                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
