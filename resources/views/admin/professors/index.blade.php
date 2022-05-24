@extends('layouts.admin')
@section('content')

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->

        <!-- [ breadcrumb ] end -->
        <div class="main-body">
            <div class="page-wrapper">
                <h2 style="color: darkturquoise">  All Professors </h2> <br>
              
                <!-- [ Main Content ] start -->
                <div class="row">
                    <!--[ daily sales section ] start-->
                    @foreach ($professors as $professor)
                    <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Professors Name</th>
                                    <th>Professors Department</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="assets/images/user/avatar-2.jpg" alt="activity-user">{{$professor->first_name}} {{$professor->last_name}}</h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0">{{$professor->department->dep_name}}</h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0"><a href="{{route('dashboard.professors.edit',['professor' => $professor->id])}}" class="label theme-bg2 text-white f-12">Edit</a></h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0 text-c-red"><a href="{{route('dashboard.professors.delete',['professor' => $professor->id])}}" class="label theme-bg text-white f-12">Delete</a></h6>
                                    </td>
                                    <td class="text-right"><i class="fas fa-circle text-c-red f-10"></i></td>
                                </tr>
                               
                                   
                            </tbody>
                        </table>

                    </div>
                    @endforeach

                    <!--[ daily sales section ] end-->



                </div>
            </div>
        </div>
    </div>
</div>


@endsection
