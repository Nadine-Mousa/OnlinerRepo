@extends('home')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onliner | Exam</title>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/questions/card.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/partitions/buttons.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/partitions/title.css')}}" media="screen">


</head>
<body>
    <div style="background: #ccd1e5">
    

    @section('content')
    
    
    <br>
    <div class="six">
        <h1>{{$exam->exam_name}} Exam - Key: {{$exam->exam_key}}
            <span>Exam questions</span>
            <span>Duration: {{$exam->duration}}</span>
        </h1>

        @if($hasApprovalToSubject == true)
        <button class="button-33" role="button" onclick="showForm();">Add Questions</button>
        @endif

    </div>

    <div class="container" style="background-color: white; color:green;">
    <h2 style="display: none;" id="formTitle"> Questions Area </h2>
    <form style="display: none;" method="POST" action="{{route('exams.store')}}" id="formElement"  >
        @csrf
    <div class="form-group mb-3">
            <label>Chapter</label>
            <select style="color: #323a56" class="form-control" required name="chapter">
            <option class="dropdown-item" disabled selected ></option>
                @for($chapter = 1; $chapter <= $subject->chapter_count; $chapter ++)    
                    <option class="dropdown-item" value="{{$chapter}}" > Chapter {{$chapter}}</option>
                @endfor
            </select>
    </div>

    <div class="form-group mb-3">
            <label>Difficulty</label>
            <select style="color: #323a56" required class="form-control" name="difficulty">
            <option class="dropdown-item" disabled selected ></option>
                    @foreach($difficulties as $difficulty)
                    <option class="dropdown-item" value="{{$difficulty->id}}" >{{$difficulty->name}}</option>
                    @endforeach
            </select>
    </div>

    <!-- <div class="form-group mb-3">
        <label>Question Type</label>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
            <select name="questoin_type">
            <label class="options" value="mcq">Multiple Choice <input type="radio"  name="radio"> <span class="checkmark"></span> </label>
            <label class="options" value="tf">True & False<input type="radio"  name="radio" > <span class="checkmark"></span> </label> 
            </select>
        </div>
    </div> -->

    <div class="form-group mb-3">
        <label>Number of questions</label>
        <input required="required" type="number" name = "number_of_questions" class="form-control" style="font-size:18px; height:30px;" placeholder="Enter a whole number..."/>
    </div>

    
        
    <button type="submit" class="button-33">Submit</button>
    </form>
    </div>

    <!-- Static Exam Questions -->

    @if($is_dynamic == false)
        @foreach($questions as $question)


        <div class="container mt-sm-5 my-1">
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>Q. {{$question->title}}</b></div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                        @foreach ($question->options as $option)
                            <label class="options">{{$option->body}} @if($option->is_correct) <span style="color: #323a56;">   [  {{  $option->points  }} point  ] </span>  @endif <input type="radio" {{ ($option->is_correct == true) ? "checked" : "disabled"}} name="radio-{{$option->id}}"> <span class="checkmark"></span> </label>
                        @endforeach
                </div>
                <div class="py-2 h5"><b>Answer: </b> {{$question->answer}}</div>
                <div class="py-2 h5"><b>Chapter: </b> {{$question->chapter_number}}</div>
                <div class="py-2 h5"><b>Difficulty: </b> {{$question->difficulty}}</div>
                
            </div>
        </div>
        <br>

        @endforeach
    @endif

    <!-- Dynamic Exam Structure -->
    @if($is_dynamic)

        Chapter : <br>         
        No. of Questions: <br>           
        Difficulty: <br>         
        <br>


    <table class="table container">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Chapter Number</th>
            <th scope="col">Difficulty</th>
            <th scope="col">Total number of questions</th>
            </tr>
        </thead>
        <tbody>

        @foreach($structures as $structure)
            <tr>
            <th scope="row">-</th>
                <td>{{$structure->chapter_number}}</td>
                <td>{{$structure->difficulty}}</td>
                <td>{{$structure->number_of_questions}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    @endif

    <div>





    
    @endsection('content')

    </div>
    
    <script type="text/javascript">
        function showForm() {
            document.getElementById('formElement').style.display = 'block';
            document.getElementById('formTitle').style.display = 'block';
        }
    </script>


    
</body>
</html>