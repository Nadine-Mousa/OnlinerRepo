@extends('layouts.nav')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Onliner | Edit Question</title>
    <link rel="stylesheet" href="{{asset('assets/css/partitions/title.css')}}" media="screen">

	<style>
		.mybg{
			background: #ccd1e5;
		}
	</style>


</head>
<body class="mybg">
@section('content')


	<div class="container">

		@if (count($errors)>0)
		@foreach ($errors->all() as $item)
		<div class="alert alert-primary" role="alert">
		  {{$item}}
		</div>
		@endforeach
			
		@endif

	
		<form  method="POST" action= "{{route('questions.update',['user' => $user->id, 'subject' => $subject, 'question' => $question->id ])}}" >
			@csrf

			<div class="form-group">
			<h3><span style="color: #323a56;"> Question Title </span> </h3>
			<input placeholder="Write your question here ..." style="width: 60%; height: 17%; font-size:17px"  class="form-control" type="text" required="required" name="title" value="{{$question->title}}">
			</div>
			
<br>

			<h4><span style="color: #323a56;"> Difficulty </span> </h4>
			<select style="width: 40%; font-size: 16px; height: 10%;"  class="form-select" aria-label="Default select example" name="difficulty">
			<option style="color: #323a56" value="{{$question->question_difficulty->id}}" selected > {{$question->question_difficulty->name}}</option>
			@foreach($difficulties as $difficulty)	
			@if($difficulty->id != $question->difficulty) <option style="color: #323a56" value="{{$difficulty->id}}" > {{$difficulty->name}}</option> @endif
			@endforeach
			</select>
<br>
<br>

		<h4><span style="color: #323a56;"> Question Type </span> </h4>
		<select  style="width: 40%; font-size: 16px; height: 10%;" class="form-select" aria-label="Default select example" name="question_type">
			<option style="color: #323a56" value = "{{$question->question_type}}" selected >{{$question->type->type_name}}</option>
			@foreach ($question_types as $question_type)
			@if($question_type->id != $question->question_type) <option style="color: #323a56" value="{{$question_type->id}}">{{$question_type->type_name}}</option> @endif
			@endforeach
			
		</select>
<br>

		<!-- Create -->
		<h4><span style="color: #323a56;"> Chapter </span> </h4>
		<select style="width: 40%; font-size: 16px; height: 10%;" class="form-select" aria-label="Default select example" name="chapter_id">
			<option  value="{{$question->chapter->id}}" selected >  {{$question->chapter->chapter_name}}  </option>
			@foreach ($chapters as $chapter)
			@if($chapter->id != $question->chapter->id) <option style="color: #323a56" value="{{$chapter->id}}">{{$chapter->chapter_name}}</option> @endif
			@endforeach
			
		</select>

<br>
			


			


			
			


			<div class= "form-group" >
				<button style="background: #323a56; color: white;" class="btn" type="submit">Update</button>
			</div>
		</form>
	</div>

	@endsection
</body>
</html>