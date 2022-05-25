@extends('layouts.admin')
@section('content')


<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->

        <!-- [ breadcrumb ] end -->
        <div class="main-body">
            <div class="page-wrapper">
                <h2 style="color: darkturquoise">  System Professors </h2> <br>
              
                <!-- [ Main Content ] start -->
                <div class="row">
                    <!--[ daily sales section ] start-->
                    <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                       
                    
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Joined</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($professors as $professor)
                                <tr>
                                    <td>
                                        <h6 class="m-0"><img class="rounded-circle m-r-10" style="width:40px;" src="/assets/images/user/avatar-2.jpg" alt="user-image">{{$professor->first_name}} {{$professor->last_name}}</h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0">{{$professor->department->dep_name}}</h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0">{{$professor->created_at}}</h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0"><a href="{{route('dashboard.professors.edit',['professor' => $professor->id])}}" class="label theme-bg2 text-white f-12">Edit</a></h6>
                                    </td>
                                    <td>
                                        <h6 class="m-0 text-c-red"><a href="{{route('dashboard.professors.delete',['professor' => $professor->id])}}" class="label theme-bg text-white f-12" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></h6>
                                    </td>
                                    <td class="text-right"><i class="fas fa-circle text-c-green f-10"></i></td>
                                </tr>
                               
                            @endforeach
                                   
                            </tbody>
                        </table>

                    </div>
                    

                    <!--[ daily sales section ] end-->



                </div>
            </div>
        </div>
    </div>
</div>


@endsection
