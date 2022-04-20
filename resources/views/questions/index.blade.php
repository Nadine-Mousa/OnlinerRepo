@extends('home')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onliner | Question Bank</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>
        /* CSS */
        .button-33 {
        background-color: #c2fbd7;
        border-radius: 100px;
        box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
        color: green;
        cursor: pointer;
        display: inline-block;
        font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
        padding: 7px 20px;
        text-align: center;
        text-decoration: none;
        transition: all 250ms;
        border: 0;
        font-size: 16px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-33:hover {
        box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
        transform: scale(1.05) rotate(-1deg);
        }
    </style>
    <style>
                @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        body {
            background-color: #333
        }

        .container {
            background-color: #555;
            color: #ddd;
            border-radius: 10px;
            padding: 20px;
            font-family: 'Montserrat', sans-serif;
            max-width: 700px
        }

        .container>p {
            font-size: 32px
        }

        .question {
            width: 75%
        }

        .options {
            position: relative;
            padding-left: 40px
        }

        #options label {
            display: block;
            margin-bottom: 15px;
            font-size: 14px;
            cursor: pointer
        }

        .options input {
            opacity: 0
        }

        .checkmark {
            position: absolute;
            top: -1px;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #555;
            border: 1px solid #ddd;
            border-radius: 50%
        }

        .options input:checked~.checkmark:after {
            display: block
        }

        .options .checkmark:after {
            content: "";
            width: 10px;
            height: 10px;
            display: block;
            background: white;
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: 300ms ease-in-out 0s
        }

        .options input[type="radio"]:checked~.checkmark {
            background: #21bf73;
            transition: 300ms ease-in-out 0s
        }

        .options input[type="radio"]:checked~.checkmark:after {
            transform: translate(-50%, -50%) scale(1)
        }

        .btn-primary {
            background-color: #555;
            color: #ddd;
            border: 1px solid #ddd
        }

        .btn-primary:hover {
            background-color: #21bf73;
            border: 1px solid #21bf73
        }

        .btn-success {
            padding: 5px 25px;
            background-color: #21bf73
        }

        @media(max-width:576px) {
            .question {
                width: 100%;
                word-spacing: 2px
            }
        }
    </style>
    <style>
        h1 {
        position: relative;
        padding: 0;
        margin: 0;
        font-family: "Raleway", sans-serif;
        font-weight: 300;
        font-size: 40px;
        color: #080808;
        -webkit-transition: all 0.4s ease 0s;
        -o-transition: all 0.4s ease 0s;
        transition: all 0.4s ease 0s;
        }

        h1 span {
        display: block;
        font-size: 0.5em;
        line-height: 1.3;
        }
        h1 em {
        font-style: normal;
        font-weight: 600;
        }
                .eleven h1 {
        font-size:30px;text-align:center; line-height:1.5em; padding-bottom:45px; font-family:"Playfair Display", serif; text-transform:uppercase;letter-spacing: 2px; color:#111;
        }
        /* STYLE 6
        ----------------------------- */
        .six h1 {
        text-align: center;
        color:#222; font-size:30px; font-weight:400;
        text-transform: uppercase;
        word-spacing: 1px; letter-spacing:2px; color:#c50000;
        }
        .six h1 span {
        line-height:2em; padding-bottom:15px;
        text-transform: none;
        font-size:.7em;
        font-weight: normal;
        font-style: italic; font-family: "Playfair Display","Bookman",serif;
        color:#999; letter-spacing:-0.005em; word-spacing:1px;
        letter-spacing:none;
        }
        .six h1:after, .six h1:before {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 45px;
        height: 4px;
        content: "";
        right: 45px; 
        margin:auto;
        background-color: #ccc;
        }
        .six h1:before { 
        background-color:#d78b8b;
        left:45px; width:90px;
        }




    </style>
</head>
<body>

    @section('content')
    <br>
    <div class="six">
        <h1>{{$subject->subject_name}}
            <span>Example Tagline Text</span>
        </h1>
        @if($hasApprovalToSubject == true)
        <form method="GET" action="{{route('questions.create', ['user' => $user->id, 'subject' => $subject])}}"> 
        <button  type="submit" class="button-33" role="button" >Add Question</button>
        </form>
        @endif

        @if($hasApprovalToSubject == true)
        <form method="GET" action="{{route('questions.trashed', ['user' => $user->id, 'subject' => $subject])}}"> 
        <button  type="submit" class="button-33" role="button" >Trashed Question</button>
        </form>
        @endif

    </div>

    <!-- HTML !-->
    <div >
    
    </div>
    
    @foreach($questions as $question)
    <div class="container mt-sm-5 my-1">
        <div class="question ml-s m-5 pl-sm-5 pt-2">
            <div class="py-2 h5"><b>Q. {{$question->title}}</b></div>
            <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                <label class="options">{{$question->option_one}} <input type="radio" {{($question->answer == $question->option_one) ? "checked" : "disabled"}} name="radio-{{$question->id}}"> <span class="checkmark"></span> </label>
                <label class="options">{{$question->option_two}} <input type="radio" {{($question->answer == $question->option_two)? "checked" : "disabled"}}  name="radio-{{$question->id}}"> <span class="checkmark"></span> </label> 
                <label class="options">{{$question->option_three}} <input type="radio" {{($question->answer == $question->option_three)? "checked" : "disabled"}}  name="radio-{{$question->id}}"> <span class="checkmark"></span> </label> 
                <label class="options">{{$question->option_four}} <input type="radio" {{($question->answer == $question->option_four)? "checked" : "disabled"}}  name="radio-{{$question->id}}" > <span class="checkmark"></span> </label> 
            </div>
            <div class="py-2 h5"><b>Answer: </b> {{$question->answer}}</div>
            <div class="py-2 h5"><b>Chapter: </b> {{$question->chapter_number}}</div>
            <div class="py-2 h5"><b>Difficulty: </b> {{$question->difficulty}}</div>
            <div class="py-2 h5">
                <a class="btn btn-danger" href="{{route('questions.destroy',['user' => $user->id, 'subject' => $subject, 'question' => $question->id ])}}"><i class="fas fa-trash-alt"></i> Delete </a> &nbsp; &nbsp; &nbsp; &nbsp;
                <a class="btn btn-danger" href="{{route('questions.edit',['user' => $user->id, 'subject' => $subject, 'question' => $question->id ])}}"><i class="fas fa-trash-alt"></i> Edit </a>
            </div> 
        </div>
    </div>
    <br>
    @endforeach




    @endsection('content')
    <script>

            /*--------loader script-----------*/
            $(function(){
                var loading = $('#loadbar').hide();
                $(document)
                .ajaxStart(function () {
                    loading.show();
                }).ajaxStop(function () {
                    loading.hide();
                });
                
                var questionNo = 0;
                var correctCount = 0;
                var q = [
                    {'Q':'How do you write "Hello World" in an alert box?', 'A':2,'C':['msg("Hello World");','alert("Hello World");','alertBox("Hello World");']},
                    {'Q':'How do you create a function in JavaScript?', 'A':3,'C':['function:myFunction()','function = myFunction()','function myFunction()']},
                    {'Q':'How to write an IF statement in JavaScript?', 'A':1,'C':['if (i == 5)','if i = 5 then','if i == 5 then']},
                    {'Q':'How does a FOR loop start?', 'A':2,'C':['for (i = 0; i <= 5)','for (i = 0; i <= 5; i++)','for i = 1 to 5']},
                    {'Q':'What is the correct way to write a JavaScript array?', 'A':3,'C':['var colors = "red", "green", "blue"','var colors = (1:"red", 2:"green", 3:"blue")','var colors = ["red", "green", "blue"]']}
                ];

            
                $(document.body).on('click',"label.element-animation",function (e) {
                //ripple start
                    var parent, ink, d, x, y;    	
                    parent = $(this);
                    if(parent.find(".ink").length == 0)
                        parent.prepend("<span class='ink'></span>");
                        
                    ink = parent.find(".ink");
                    ink.removeClass("animate");
                    
                    if(!ink.height() && !ink.width())
                    {
                        d = Math.max(parent.outerWidth(), parent.outerHeight());
                        ink.css({height: "100px", width: "100px"});
                    }
                    
                    x = e.pageX - parent.offset().left - ink.width()/2;
                    y = e.pageY - parent.offset().top - ink.height()/2;
                    
                    ink.css({top: y+'px', left: x+'px'}).addClass("animate");
                //ripple end

                    var choice = $(this).parent().find('input:radio').val();
                    console.log(choice);
                    var anscheck =  $(this).checking(questionNo, choice);//$( "#answer" ).html(  );      
                    q[questionNo].UC = choice;
                    if(anscheck){
                        correctCount++;
                        q[questionNo].result = "Correct";
                    } else {
                        q[questionNo].result = "Incorrect";        
                    }
                    console.log("CorrectCount:" + correctCount);
                    setTimeout(function(){
                        $('#loadbar').show();
                        $('#quiz').fadeOut();
                        questionNo++;
                        if((questionNo + 1) > q.length){
                            alert("Quiz completed, Now click ok to get your answer");
                            $('label.element-animation').unbind('click');
                            setTimeout(function(){
                                var toAppend = '';
                                $.each(q, function(i, a){
                                    toAppend += '<tr>'
                                    toAppend += '<td>'+(i+1)+'</td>';
                                    toAppend += '<td>'+a.A+'</td>';
                                    toAppend += '<td>'+a.UC+'</td>';
                                    toAppend += '<td>'+a.result+'</td>';
                                    toAppend += '</tr>'
                                });
                                $('#quizResult').html(toAppend);
                                $('#totalCorrect').html("Total correct: " + correctCount);
                                $('#quizResult').show();
                                $('#loadbar').fadeOut();
                                $('#result-of-question').show();
                                $('#graph-result').show();
                                chartMake();
                            }, 1000);
                        } else {
                            $('#qid').html(questionNo + 1);
                            $('input:radio').prop('checked', false);
                            setTimeout(function(){
                                $('#quiz').show();
                                $('#loadbar').fadeOut();
                            }, 1500);
                            $('#question').html(q[questionNo].Q);
                            $($('#f-option').parent().find('label')).html(q[questionNo].C[0]);
                            $($('#s-option').parent().find('label')).html(q[questionNo].C[1]);
                            $($('#t-option').parent().find('label')).html(q[questionNo].C[2]);
                        }
                    }, 1000);
                });

                
                $.fn.checking = function(qstn, ck) {
                    var ans = q[questionNo].A;
                    if (ck != ans)
                        return false;
                    else 
                        return true;
                }; 

            // chartMake();
                function chartMake(){

                    var chart = AmCharts.makeChart("chartdiv",
                        {
                        "type": "serial",
                        "theme": "dark",
                        "dataProvider": [{
                            "name": "Correct",
                            "points": correctCount,
                            "color": "#00FF00",
                            "bullet": "http://i2.wp.com/img2.wikia.nocookie.net/__cb20131006005440/strategy-empires/images/8/8e/Check_mark_green.png?w=250"
                        }, {
                            "name": "Incorrect",
                            "points":q.length-correctCount,
                            "color": "red",
                            "bullet": "http://4vector.com/i/free-vector-x-wrong-cross-no-clip-art_103115_X_Wrong_Cross_No_clip_art_medium.png"
                        }],
                        "valueAxes": [{
                            "maximum": q.length,
                            "minimum": 0,
                            "axisAlpha": 0,
                            "dashLength": 4,
                            "position": "left"
                        }],
                        "startDuration": 1,
                        "graphs": [{
                            "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]]</b></span>",
                            "bulletOffset": 10,
                            "bulletSize": 52,
                            "colorField": "color",
                            "cornerRadiusTop": 8,
                            "customBulletField": "bullet",
                            "fillAlphas": 0.8,
                            "lineAlpha": 0,
                            "type": "column",
                            "valueField": "points"
                        }],
                        "marginTop": 0,
                        "marginRight": 0,
                        "marginLeft": 0,
                        "marginBottom": 0,
                        "autoMargins": false,
                        "categoryField": "name",
                        "categoryAxis": {
                            "axisAlpha": 0,
                            "gridAlpha": 0,
                            "inside": true,
                            "tickLength": 0
                        }
                    });
                }
            });	

    </script>
    
</body>
</html>