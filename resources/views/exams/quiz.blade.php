@extends('home')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onliner | Quiz</title>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/questions/card.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/partitions/buttons.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/partitions/title.css')}}" media="screen">


    <style>
        .myBG{
            background: #ccd1e5;
        }
    </style>

</head>
<body class="myBG">

    

    @section('content')
    <div class="six">
    <h1> <span> {{$exam -> exam_name}} </span> </h1>
    </div>

    <!-- Questions -->
        <form method="POST" action="{{ route('exams.storeAnswers') }}">
        @csrf

        @foreach($questions as $question)
        <input type="hidden" name="questions[{{ $question->id }}]" value="">


        <div class="container mt-sm-5 my-1">
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>Q. {{$question->title}}</b>
                </div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    @foreach($question->options as $option)
                    <label  class="options" >{{$option->body}} <input  type="radio"  name="questions[{{ $question->id }}]"  value="{{ $option->id }}"> <span class="checkmark"></span> </label>
                    @endforeach

                </div>
                
            </div>
        </div>
        <br>
        
        
        @endforeach
        
        <button type="submit" class="button-33">Finish Exam</button>
       
    </form>


    








    <!-- </div> -->
    @endsection('content')

   





</body>
</html>