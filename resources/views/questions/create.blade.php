@extends('layouts.nav')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Onliner | Add Question</title>
</head>
<body>
@section('content')

	<div class="container">
		@if (count($errors)>0)
		@foreach ($errors->all() as $item)
		<div class="alert alert-primary" role="alert">
		  {{$item}}
		</div>
		@endforeach
			
		@endif


		<form  method="POST" action= "{{route('questions.store',['user' => $user->id, 'subject' => $subject])}}" >
			@csrf
			<div class="form-group">
			<h3><span style="color: #323a56;"> Question Title </span> </h3>
			<input placeholder="Write your question here ..." style="width: 60%; height: 17%; font-size:17px"  class="form-control" type="text" required="required" name="title" value="{{ old('title') }}">
			</div>

		
		<h4><span style="color: #323a56;"> Difficulty </span> </h4>
		<select style="width: 40%; font-size: 16px; height: 10%;"  class="form-select" aria-label="Default select example" name="difficulty">

		<option style="color: #323a56" selected disabled >Difficulty</option>
		@foreach($difficulties as $difficulty)	
		<option style="color: #323a56" value="{{$difficulty->id}}" > {{$difficulty->name}}</option>
		@endforeach
		</select>

<br>
		<h4><span style="color: #323a56;"> Question Type </span> </h4>
		<select style="width: 40%; font-size: 16px; height: 10%;" class="form-select" aria-label="Default select example" name="question_type">
			<option style="color: #323a56" disabled selected >Question Type</option>
			@foreach ($question_types as $question_type)
			<option style="color: #323a56" value="{{$question_type->id}}">{{$question_type->type_name}}</option>
			@endforeach
			
		</select>
<br>
		<h4><span style="color: #323a56;"> Chapter </span> </h4>
		<select style="width: 40%; font-size: 16px; height: 10%;" class="form-select" aria-label="Default select example" name="chapter_number">
			<option  disabled selected >  Chapter  </option>
			@foreach ($chapters as $chapter)
			<option style="color: #323a56" value="{{$chapter->id}}">Ch. {{$chapter->chapter_num}} {{$chapter->chapter_name}}</option>
			@endforeach
			
		</select>
			
		<br><br>
		<div class= "form-group" >
			<button style="background: #323a56; color: white;" class="btn" type="submit"> Create </button>
		</div>

		</form>
	</div>

	@endsection
</body>
</html>