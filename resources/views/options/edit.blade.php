@extends('layouts.nav')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Onliner | Add Option</title>
    <link rel="stylesheet" href="{{asset('assets/css/options/create.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/partitions/title.css')}}" media="screen">


</head>
<body class="mybg">
@section('content')
		<div class="six">
			<h1><span>Edit Option</span></h1>
		</div>

	<div class="container">
		@if (count($errors)>0)
		@foreach ($errors->all() as $item)
		<div class="alert alert-danger" role="alert">
		  {{$item}}
		</div>
		@endforeach
			
		@endif

		

	
		<div class="container">

		<form style="margin-left: 300px;"  method="POST" action= "{{ route('options.update', ['option' => $option->id]) }}" >
			@csrf
			<input type="hidden" value="{{$option->id}}" name="id">
			<input type="hidden" value="{{$option->question_id}}" name="question_id">
			<div class="form-group">
			<label >Option body</label>
			<input style ="height:30px;" value="{{$option->body}}" class="form-control" type="text" required="required" name="body">
			</div>

			<div class="form-group">
			<label >Is this option correct ?</label>
				<select style="height: 30px; width: 50%;" name="is_correct" id="is_correct" onChange="changePointsVisability();" class="form-control" >
					@if($option->is_correct)
					<option value="yes"  >YES</option>
					<option value="no"  >NO</option>
					@else
					<option value="no">NO</option>
					<option value="yes" >YES</option>
					@endif 
				</select>
			</div>


			<div style="@if($option->is_correct) display:block; @else display:none; @endif" class="form-group" id="points">
				<label > Points</label>
				<input placeholder="Enter the option points ..." value="{{$option->points}}" style ="height:30px;" step="0.01" type="number" class="form-control" type="text" name="points">
			</div>


			<br><br><br>
			

			<div class= "form-group" >
				<button style="color: white; background: #323a56;" class="btn" type="submit">Update</button>
			</div>
		</form>

		</div>

	</div>

	@endsection

	<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>

	<script>

		function changePointsVisability(){
			if (document.getElementById("is_correct").value == "yes"){
				document.getElementById("points").style.display = "block";
    		}     
			else{
				document.getElementById("points").style.display = "none";
			}
		}

	</script>
</body>
</html>