@extends('layouts.nav')
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
        button:disabled,
        button[disabled]{
        border: 1px solid #999999;
        background-color: gray;
        color: white;
        }
    </style>


    <style>
            .base-timer {
                position: fixed;
                height: 150px;
                width: 150px;
            }

            .base-timer__circle {
                fill: none;
                stroke: none;
            }

            .base-timer__path-elapsed {
                stroke: grey;
                stroke-width: 7px;
            }

            .base-timer__label {
                position: absolute;
                
                /* match the size with the parent container */
                width: 150px;
                height: 150px;
                
                /* keeping the label aligned to the top */
                top: 0;
                
                /* creating a flexible box that centers content vertically and horizontally */
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 30px;
                font-family: 'Courier New', Courier, monospace;
            }           

            
            .base-timer__path-remaining {
                /* Just as thick as the original ring */
                stroke-width: 7px;

                /* Rounds the line endings to create a seamless circle */
                stroke-linecap: round;

                /* Makes sure the animation starts at the top of the circle */
                transform: rotate(90deg);
                transform-origin: center;

                /* One second aligns with the speed of the countdown timer */
                transition: 1s linear all;

                /* Allows the ring to change color when the color value updates */
                }

            .base-timer__svg {
                /* Flips the svg and makes the animation to move left-to-right */
                transform: scaleX(-1);
            }

            .base-timer__path-remaining.green {
                color: green;
            }

            .base-timer__path-remaining.orange {
                color: orange;
            }

            .base-timer__path-remaining.red {
                color: red;
            }
    </style>

</head>
<body class="myBG">

    

    @section('content')
    <div class="six">
    <h1> {{$exam -> exam_name}} 
         <span> </span> </h1>
    </div>


    <!-- Timer -->
    <div class="base-timer">
            <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <g class="base-timer__circle">
                    <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45" />
                    <path
                            id="base-timer-path-remaining"
                            stroke-dasharray="283"
                            class="base-timer__path-remaining"
                            d="
                            M 50, 50
                            m -45, 0
                            a 45,45 0 1,0 90,0
                            a 45,45 0 1,0 -90,0
                            "
                    ></path>
                </g>
            </svg>
            <span id="base-timer-label" class="base-timer__label">
                <!-- Remaining time label -->
            </span>
    </div>



    <!-- Questions -->
        <form id="myquiz" method="POST" action="{{ route('exams.storeAnswers') }}">
        @csrf

        @foreach($questions as $question)
        <input type="hidden" name="questions[{{ $question->id }}]" value="">


        <div class="container mt-sm-5 my-1">
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>Q. {{$question->title}}</b>
                </div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    @foreach($question->options as $option)
                    @if($question->type->type_name == "Multiple Correct Answers")
                    <label> <input type="checkbox" style="width: 20px; height: 20px; margin-right: 8px; margin-top:0px;" name="questions[]"  value="{{ $option->id }}">{{$option->body}}   </label>
                    @else
                    <label  class="options" >{{$option->body}} <input  type="radio"  { { old('questions[{{ $question->id }}]')=="5" ? 'checked='.'"'.'checked'.'"' : '' } } name="questions[{{ $question->id }}]"  value="{{ $option->id }}"> <span class="checkmark"></span> </label>
                    @endif
                    @endforeach

                </div>
                
            </div>
        </div>
        <br>
        
        
        @endforeach
        
        <button  id = "finish" style="margin-left: 660px;" type="submit" class="button-33">Finish Exam</button>
       
    </form>


    







    <script>
        // const TIME_LIMIT =document.getElementById('timer').Value;
        const TIME_LIMIT ={{$timer}};

        let timePassed = 0;
        let timeLeft = TIME_LIMIT;

        const FULL_DASH_ARRAY = 283;


        
        
        const WARNING_THRESHOLD = 10;

        const ALERT_THRESHOLD = 5;

        const COLOR_CODES = {
            info: {
                color: "green"
            },
            warning: {
                color: "orange",
                threshold: WARNING_THRESHOLD
            },
            alert: {
                color: "red",
                threshold: ALERT_THRESHOLD
            }
        };

        let remainingPathColor = COLOR_CODES.info.color;


        function formatTimeLeft(time) {
            /*  formatting minutes:
                we format minutes by getting the round integer less than or equal to the result of 'time / 60'
            */ 
            const hours = Math.floor(time / 60 / 60);

            time = time - (hours*60*60);

            const minutes = Math.floor(time / 60);

            /* formatting seconds:
               we format seconds by getting the remainder of the time divided by 60 using the modulus operator
            */
            let seconds = time % 60;

            // if value of seconds < 10 then add '0' before it
            if (seconds < 10 ) {
                seconds = `0${seconds}`;
            }

            // return the result in MM:SS format
            return `${hours}:${minutes}:${seconds}`;
        }
        document.getElementById('base-timer-label').innerHTML = formatTimeLeft(timeLeft);

        let timerInterval = null;

        function startTimer() {
        timerInterval = setInterval(() => {
            
            // The amount of time passed increments by one
            timePassed += 1;
            timeLeft = TIME_LIMIT - timePassed;

           
            // The time left label is updated
            document.getElementById("base-timer-label").innerHTML = formatTimeLeft(timeLeft);

            setCircleDasharray();
            setRemainingPathColor(timeLeft);
            
             if (timeLeft === 0) {
                clearInterval(timerInterval);
                // alert( "Time is up, You can no longer submit your answer" );
                // document.getElementById('finish').disabled = true;
                document.getElementById('myquiz').submit();

                //  window.location.href = "{{route('exams.storeAnswers')}}";
            }
        }, 1000);
        }

        startTimer(); // we must call the function

        // Add the current path color to path element style
        document.getElementById("base-timer-path-remaining").style.stroke = remainingPathColor;


        function calculateTimeFraction() {
            const rawTimeFraction = timeLeft / TIME_LIMIT;
            return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
        }
            
        // Change the value of dasharray as time passes, starting from 283
        function setCircleDasharray() {
            const circleDasharray = `${(
                calculateTimeFraction() * FULL_DASH_ARRAY).toFixed(0)} 283`;
            document.getElementById("base-timer-path-remaining").setAttribute("stroke-dasharray", circleDasharray);
        }

        function setRemainingPathColor(timeLeft) {
            const { alert, warning, info } = COLOR_CODES;

            
            if (timeLeft <= alert.threshold) {
                // Change the color of remaining path to alert
                remainingPathColor = COLOR_CODES.alert.color;
                document.getElementById("base-timer-path-remaining").style.stroke = remainingPathColor;

            
            } else if (timeLeft <= warning.threshold) {
                // Change the color of remaining path to warning
                remainingPathColor = COLOR_CODES.warning.color;
                document.getElementById("base-timer-path-remaining").style.stroke = remainingPathColor;
            }
        }
    </script>

    <!-- </div> -->
    @endsection('content')







</body>
</html>