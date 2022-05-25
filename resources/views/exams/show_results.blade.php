@extends('layouts.nav')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Onliner | Results</title>

    <link rel="stylesheet" href="{{asset('assets/css/partitions/title.css')}}" media="screen">
    <link rel="stylesheet" href="{{ asset('assets/questions/card.css')}}">


    <style>
        .mybg{
            background: #ccd1e5;
            /* color: #323a56; */
        }

    </style>

</head>
<body class="mybg">

    
@section('content')

<div class="six">
        <h1>
            {{$exam->exam_name}} Results
            <span>Exam marks: {{$exam->marks}}</span>
            <span>Students who took this exam</span>
        </h1>
</div>

<table  style="background: white;" class="table container">
        <thead>
            <tr>
            <th scope="col"></th>
            <th scope="col">Student Name</th>
            <th scope="col">Score</th>
            <th scope="col">Status</th>
            <th scope="col">Rank</th>
            </tr>
        </thead>
        <tbody>

        @foreach($taken_exams  as $key => $taken_exam)
            <tr>
            <th><img class="rounded-circle  m-r-10" style="width:40px;" src="/assets/images/user/avatar-2.jpg"></th>
                <td>{{$taken_exam->student->first_name}} {{$taken_exam->student->last_name}}</td>
                <td>{{$taken_exam->student_score}}</td>
                <td>@if($taken_exam->student_score >= (0.5 * $exam->marks)) <span style="color:#7FFF00"> Passed </span> @else <span style="color:red"> Failed </span> @endif</td>
                <td>{{$key+1}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>



 @endsection('content')

</body>
</html>