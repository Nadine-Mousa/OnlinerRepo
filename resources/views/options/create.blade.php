@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Onliner | Add Option</title>
</head>
<body>
@section('content')

	<div class="container">
		@if (count($errors)>0)
		@foreach ($errors->all() as $item)
		<div class="alert alert-danger" role="alert">
		  {{$item}}
		</div>
		@endforeach
			
		@endif

	
		<div class="container">

		<form  method="POST" action= "{{ route('options.store', ['user' => $user->id, 'subject' => $subject, 'question' => $question->id]) }}" >
			@csrf
			<div class="form-group">
			<label for="exampleFormControlInput1">Option body</label>
			<input class="form-control" type="text" required="required" name="body">
			</div>

			<div class="form-group">
			<label for="exampleFormControlInput1">Is this option correct ?</label>
				<select name="is_correct" id="is_correct" onChange="changePointsVisability();" class="form-control" >
					<option class="hidden"  selected disabled>Select your choice... </option>
					<option value="yes"  >YES</option>
					<option value="no"  >NO</option>
				</select>
			</div>


			<div style="display:none;" class="form-group" id="points">
				<label for="exampleFormControlInput1"> Points</label>
				<input class="form-control" type="text"  name="points">
			</div>


			<br><br><br>
			

			<div class= "form-group" >
				<button class="btn btn-danger" type="submit">Submit</button>
			</div>
		</form>

		</div>

	</div>

	@endsection

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