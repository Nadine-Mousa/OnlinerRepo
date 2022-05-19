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

	
		<form  method="POST" action= "{{route('exams.store_exam')}}" >
			@csrf
			<div class="form-group">
			<label for="exampleFormControlInput1">{{ __(Exam Key)}}</label>
			<input class="form-control" type="text" required="required" name="exam_key">
			</div>

		
			
			<div class="form-group">
				<label for="exampleFormControlInput1">{{ __(Exam Name)}}</label>
				<input class="form-control" type="text" required="required"  name="exam_name" >
			</div>

			<div class="form-group">
				<label for="exampleFormControlInput1">{{ __(Duration)}}</label>
				<input class="form-control" type="text" required="required" name="duration">
			</div>

			<div class="form-group">
				<label for="exampleFormControlInput1">start time</label>
				<input class="form-control" type="text" required="required" name="start_time">
			</div>

			<div class="form-group">
				<label for="exampleFormControlInput1">end time</label>
				<input class="form-control" type="text" required="required" name="end_time">
			</div>

			<div class="form-group">
				<label for="exampleFormControlInput1"> Total Questions</label>
				<input class="form-control" type="text" required="required" name="total_questions">
			</div>
<br>
			
<br>
<div class="form-group">

             <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_dynamic" id="correct" value="1">
                    <label class="form-check-label" for="flexRadioDefault1">
                       Dynamic
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_dynamic" id="wrong"  value="0">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Static
                    </label>
                  </div>

			
</div>
			


			
			


			<div class= "form-group" >
				<button class="btn btn-danger" type="submit">Submit</button>
			</div>
		</form>
	</div>

	@endsection
</body>
</html>