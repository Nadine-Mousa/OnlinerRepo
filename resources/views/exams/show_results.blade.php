<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

</head>
<body>
    

<div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <table class="table table-hover">
        <thead>
            
            <tr>
                <th>Student</th>
                <th>Score</th>
                <th>Time</th>
                <th>Status</th>
                <th class="text-right"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
            <tr>
                <td>
                    <h6 class="m-0"><img class="rounded-circle  m-r-10" style="width:40px;" src="assets/images/user/avatar-2.jpg" alt="activity-user">{{$result->student->first_name}}</h6>
                </td>
                <td>
                    <h6 class="m-0">{{$result->total_score}}</h6>
                </td>
                <td>
                    <h6 class="m-0">2:37 PM</h6>
                </td>
                <td>
                    <h6 class="m-0 text-c-red">Missed</h6>
                </td>
                <td class="text-right"><i class="fas fa-circle text-c-red f-10"></i></td>
            </tr>
            @endforeach
           
        </tbody>
    </table>

</div>

 <!-- Required Js -->
 <script src="{{ asset('assets/js/vendor-all.min.js')}}"></script>
 <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
 <script src="{{ asset('assets/js/pcoded.min.js')}}"></script>

</body>
</html>