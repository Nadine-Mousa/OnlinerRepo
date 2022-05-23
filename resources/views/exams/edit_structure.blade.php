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

    <body>
        <div style="background: #ccd1e5">
        
    
        @section('content')
        
        @if (count($errors)>0)
		@foreach ($errors->all() as $item)
		<div class="alert alert-primary" role="alert">
		  {{$item}}
		</div>
		@endforeach
			
		@endif
        
    
        <div class="container" style="background-color: white; color:green;">
            <h2  id="formTitle"> Questions Area </h2>
            <form  method="POST" action="{{route('exams.update_structure', ['structure' => $structure->id])}}" id="formElement"  >
                @csrf
                <div class="form-group mb-3">
                    <label>Chapter</label>
                    <select style="color: #323a56" class="form-control" name="chapter">
                    <option class="dropdown-item" disabled > Chapter {{$structure->chapter_number}}</option>
                        @for($chapter = 1; $chapter <= $subject->chapter_count; $chapter ++)    
                            <option class="dropdown-item" value="{{$chapter}}" > Chapter {{$chapter}}</option>
                        @endfor
                    </select>
                 </div>
        
            <div class="form-group mb-3">
                    <label>Difficulty</label>
                    <select style="color: #323a56" required class="form-control" name="difficulty">
                    <option class="dropdown-item" disabled selected >{{$structure->difficulty_level->name }}</option>
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
                <input required="required" type="number" name = "number_of_questions" class="form-control" style="font-size:18px; height:30px;" placeholder="{{$structure->number_of_questions}}"/>
            </div>
        
            
                
            <button type="submit" class="button-33">Submit</button>
            </form>
            </div>
    
       
    
       
    
       
         <!-- editing structure  form -->
    
         
    
        <div>
    
    
    
    
    
        
        @endsection('content')
    
        </div>
        
        
    
    
        
    </body>
    </html>