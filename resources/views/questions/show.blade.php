@extends('home')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onliner | Question</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/questions/card.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/partitions/buttons.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/partitions/title.css')}}" media="screen">
    
    <style>
        input[type=checkbox][checked] {
        outline: 2px solid green;
        filter: invert(100%) hue-rotate(18deg) brightness(5);
        background-color: green;
        content: '✓';
        }
    </style>

</head>
<body style="background: #ccd1e5;">

    @section('content')
    <br>
    <div class="six">
        
        <h1>
            {{$subject->subject_name}} 
        <span> Question Details</span>
        </h1>

    </div>

    <!-- HTML !-->
    <div >
    
    </div>
    
   
    <div class="container mt-sm-5 my-1">
        <div class="question ml-s m-5 pl-sm-5 pt-2">
            <div class="py-2 h5"><b>Q. {{$question->title}}</b></div>
            <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                
                @foreach ($options as $option)
                <div style="margin-bottom: 30px;">
                @if ($option->question_id == $question->id)
                    @if($question->question_type != 3)<label style="display:inline" class="options">{{$option->body}} @if($option->is_correct) <span style="color: #323a56;">   [  {{  $option->points  }} point  ] </span>  @endif <input type="radio" {{ ($option->is_correct == true) ? "checked" : "disabled"}} name="radio-{{$option->id}}"> <span class="checkmark"></span> </label>
                    @else <label style="display:inline" > <input @if($option->is_correct) checked @endif type="checkbox" disabled style="width: 20px; height: 20px; margin-right: 8px; margin-top:0px;" name="questions[]"  value="{{ $option->id }}">{{$option->body}}   </label>
                    @endif
                    @if($hasApprovalToSubject)
                    <!-- Edit -->
                    <div style="display:inline;">
                    <a href="{{ route('options.edit', ['option' => $option->id]) }}"  
                    class="btn" style="display:inline; position: absolute; right: 31%; background: #323a56; color: white;"
                     ><i class="fas fa-trash-alt"></i> Edit </a>
                    <!-- Delete -->
                    <a href="{{ route('options.delete', ['option' => $option->id]) }}" 
                    onclick="return confirm('Are you sure you want to delete this item?');" 
                    class="btn"style="position: absolute; right: 25%; background: #323a56; color: white;"
                     ><i class="fas fa-trash-alt"></i> Delete </a>
                    </div>
                    @endif
                @endif
                </div>
                @endforeach


            </div>
            <br>
            
            <div class="py-2 h5"><b>Question type : </b> {{  $question->type->type_name }}</div>
            <div class="py-2 h5"><b>Question points : </b> {{$question->marks}}</div>
            <div class="py-2 h5"><b>Chapter: </b> {{$question->chapter->chapter_name}}</div>
            <div class="py-2 h5"><b>Difficulty: </b> {{$question->question_difficulty->name}}</div>
            <div class="py-2 h5">
                @if($hasApprovalToSubject)
                <a style="background: #323a56; color: white;" class="btn " href="{{route('options.create',['user' => $user->id, 'subject' => $subject, 'question' => $question->id ])}}"><i class="fas fa-trash-alt"></i> Add Option </a> &nbsp; &nbsp; &nbsp; &nbsp;
                @endif
                <a style="background: #323a56; color: white;" class="btn " href="{{route('questions.index', ['user' => $user->id, 'subject' => $subject] )}}"><i class="fas fa-trash-alt"></i> Back </a>
            </div> 
        </div>
    </div>
    <br>
  




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