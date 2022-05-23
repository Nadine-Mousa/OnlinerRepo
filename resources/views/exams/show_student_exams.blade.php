@extends('home')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onliner | My exams</title>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('assets/css/subjects/show.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/partitions/title.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/exams/index.css')}}" media="screen">
    
</head>
<body>
    

    @section('content')
    
    <br>
    <div class="six">
        <h1>{{$subject->subject_name}}
            <span>My Taken Exams</span>
        </h1>
       

    </div>
    
    
    @foreach($student_exams as $student_exam)
    
            <div class="courses-container">
            <div class="course">

                <div class="course-preview">
                    <h6>Course</h6>
                    <h2>{{$subject->subject_name}}</h2>
                    <a href="#">View all chapters <i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="course-info">
                    <div class="progress-container">
                        <div class="progress"></div>
                        <span class="progress-text">
                            Duration: {{$student_exam->exam->duration}} min.
                        </span>
                    </div>
                    <h4>Exam key: {{$student_exam->exam->exam_key}}</h4>
                    <h3>{{$student_exam->exam->exam_name}} Exam</h3>
                    <a href="{{route('student_exam', ['exam' => $student_exam->exam->id])}}">My Results </a>

                </div>
            </div>
        </div>

    @endforeach

    @endsection('content')


</body>
</html>