@extends('layouts.app')
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
			<label for="exampleFormControlInput1">Title</label>
			<input class="form-control" type="text" required="required" name="title">
			</div>

		
			
			

		
<br>
			<select class="form-select" aria-label="Default select example" name="difficulty">
				<option selected >Difiiculty</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
			  </select>
<br>
<br>
		<select class="form-select" aria-label="Default select example" name="question_type">
			<option selected >Question Type</option>
			@foreach ($question_types as $question_type)
			<option value="{{$question_type->id}}">{{$question_type->type_name}}</option>
			@endforeach
			
		</select>
<br>

		<select class="form-select" aria-label="Default select example" name="chapeter_number">
			<option selected >Chapter Number</option>
			@foreach ($chapters as $chapter)
			<option value="{{$chapter->id}}">{{$chapter->chapter_name}}</option>
			@endforeach
			
		</select>
			

			


			


			
			


			<div class= "form-group" >
				<button class="btn btn-danger" type="submit">Submit</button>
			</div>
		</form>
	</div>

	@endsection
</body>
</html>