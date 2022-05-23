
@extends('layouts.nav')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Onliner | Create Exam</title>
    <link rel="stylesheet" href="{{asset('assets/css/exams/create.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/partitions/title.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/questions/card.css')}}" media="screen">
</head>


<body >
<div class="bgcolor">
@section('content')




		<div class="six">
			<h1>{{$subject->subject_name}}
			<span>Create an Exam</span>
			</h1>
			
		</div>
	<div class = "bodyCreateExam">
		

	<div class="container">

	
		<form  method="POST" action= "{{route('exams.store_exam')}}" >
			@csrf
			<div class="formgroup">
			<label >Exam Key</label>
			<input placeholder="Enter the exam key ..." style="height:35px; font-size: 15px;"  type="text"  name="exam_key">
			@error('exam_key')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror	
		</div>

		
			
			<div class="formgroup">
				<label >Exam name</label>
				<input placeholder="Enter the exam name ..." style="height:35px; font-size: 15px;"  type="text"   name="exam_name" >
				@error('exam_name')
                <div class="alert alert-danger">{{ $message }}</div>
            	@enderror
			</div>

			<div class="formgroup">
				<label >Duration (min)</label>
				<!-- <input type="time" name="duration" style="height:35px; font-size: 15px;"> -->
				<input step="0.01" placeholder="Enter the exam duration  ..." style="height:35px; font-size: 15px;"  type="number"  name="duration">
				@error('duration')
                <div class="alert alert-danger">{{ $message }}</div>
            	@enderror
			</div>

			<div class="formgroup">
				<label >When will the exam be accessed?</label>
				<select name="exam_access" style="width:60%; font-size: 15px;" > 
					<option selected disabled>Select an option ... </option>
					<option value="anytime">Anytime </option>
					<option value="specified">Only in the exam specified date and time </option>
				</select>
				@error('exam_access')
                <div class="alert alert-danger">{{ $message }}</div>
            	@enderror
			</div>

			<div class="formgroup">
				<label >Start from</label>
				<input  style="height:35px; font-size: 15px;" name="start_from" type="datetime-local"/> 
				@error('start_from')
                <div class="alert alert-danger">{{ $message }}</div>
            	@enderror
			</div>

			<!-- <div class="formgroup">
				<label >End time</label>
				<input style="height:35px; font-size: 15px;" name="end_time" type="datetime-local"/> 
			</div> -->

			<div class="formgroup">
				<label > Total exam marks</label>
				<input step="0.01" name="marks" style="height:35px; font-size: 15px;"  type="number"  >
				@error('marks')
                <div class="alert alert-danger">{{ $message }}</div>
            	@enderror
			</div>

		<div class="formgroup">
			<label  > Exam type</label>
			<br>
			<label style="display: inline;" class="options" >Dynamic<input  type="radio"  name="is_dynamic"  value="true"> <span class="checkmark"></span> </label>
			<label style="display: inline;"  class="options" >Static<input required type="radio"  name="is_dynamic"  value="false"> <span class="checkmark"></span> </label>
	
		</div>
			


			<div class= "formgroup" >
				<br>
				<button style="margin-left: 260px; font-size: 25px; background:#323a56; color: white; height:35px; width:25%;" class="btn" type="submit">Create</button>

			</div>
		</form>
	</div>


</div>
	
@endsection
</div>


</body>
</html>