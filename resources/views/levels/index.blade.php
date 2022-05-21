@extends('layouts.nav')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onliner | Levels</title>
    <link rel="stylesheet" href="{{asset('assets/css/partitions/title.css')}}" media="screen">

    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> -->

    <style>
                /* Style of Level Card */
        @import url("https://fonts.googleapis.com/css2?family=Righteous&display=swap");
        bodyLevel {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Righteous", cursive;
            min-height: 100vh;
            /* background-color: #a9c9ff; */
            /* background-color: #ccde5; */
            /* background-color: #b8c6db;
            background-image: linear-gradient(315deg, #b8c6db 0%, #f5f7fa 74%); */
            /* background-image: linear-gradient(180deg, #a9c9ff 0%, #ffbbec 100%); */
        }
        .containerLevel {
            max-width: 100vw;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 35px;
            margin: 0 auto;
            padding: 40px 0;
        }
        .containerLevel .card {
            position: relative;
            width: 300px;
            height: 400px;
            margin: 0 auto;
            background: #a9b2d2;
            border-radius: 15px;
            box-shadow: 0 15px 60px rgba(0, 0, 0, 0.5);
        }
        .containerLevel .card .face {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .containerLevel .card .face.face1 {
            box-sizing: border-box;
            padding: 20px;
        }
        .containerLevel .card .face.face1 h2 {
            margin: 0;
            padding: 0;
        }
        /* .containerLevel .card .face.face1 .java {
            background-color: #fffc00;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        } */
        .containerLevel .card .face.face1 .python {
            background-color: #a9b2d2;
            /* -webkit-background-clip: text; */
            /* -webkit-text-fill-color: transparent; */
        }
        /* .containerLevel .card .face.face1 .cSharp {
            background-color: #fc00ff;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        } */
        .containerLevel .card .face.face2 {
            transition: 0.5s;
        }
        .containerLevel .card .face.face2 h2 {
            margin: 0;
            padding: 0;
            font-size: 10em;
            color: #323a56;
            transition: 0.5s;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }
        .containerLevel .card:hover .face.face2 {
            height: 60px;
        }
        .containerLevel .card:hover .face.face2 h2 {
            font-size: 2em;
        }
        /* body .containerLevel .card:nth-child(1) .face.face2 {
            background-image: linear-gradient(40deg, #fffc00 0%, #fc00ff 45%, #00fffc 100%);
            border-radius: 15px;
        }
        body .containerLevel .card:nth-child(2) .face.face2 {
            background-image: linear-gradient(40deg, #fc00ff 0%, #00fffc 45%, #fffc00 100%);
            border-radius: 15px;
        } */
        .containerLevel .card .face.face2 {
            background-color: #b8c6db;
            background-image: linear-gradient(315deg, #b8c6db 0%, #f5f7fa 74%);border-radius: 15px;
        }
        /* .containerLevel .card:nth-child(2) .face.face2 {
            background-image: linear-gradient(40deg, #00fffc 0%, #fc00ff 45%, #fffc00 100%);
            border-radius: 15px;
        } */
        
        /* .containerLevel .card:nth-child(3) .face.face2 {
            background-image: linear-gradient(40deg, #00fffc 0%, #fc00ff 45%, #fffc00 100%);
            border-radius: 15px;
        } */
        /* .containerLevel .card:nth-child(4) .face.face2 {
            background-image: linear-gradient(40deg, #00fffc 0%, #fc00ff 45%, #fffc00 100%);
            border-radius: 15px;
        } */
        
 
    </style>

</head>
<body >

<div class="bodyLevel" stlye="background: #ccd1e5;">
@section('content')

    <div class="six">
        
        <h1>
            Levels
        <span> {{$department->dep_name}} Department</span>
        </h1>

    </div>


<div class="containerLevel">
    @foreach($levels as $level)

    <div class="card">
        <div class="face face1">
        <div class="content">
            <span class="stars"></span>
            <a href="{{route('subjects.index', ['level' => $level->level_number])}}">  <h2 class="python">Level 0{{$level->level_number}} </h2> </a>
            <p class="python">Java is a class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.</p>
        </div>
        </div>
        <div class="face face2">
        <h2>0{{$level->level_number}}</h2> 
        </div>
    </div>
    @endforeach


@endsection('content')
</div>
 
</body>
</html>