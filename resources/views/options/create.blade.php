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
			<h1><span>Add Option</span></h1>
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

		<form style="margin-left: 300px;"  method="POST" action= "{{ route('options.store', ['user' => $user->id, 'subject' => $subject, 'question' => $question->id]) }}" >
			@csrf
			<div class="form-group">
			<label for="exampleFormControlInput1">Option body</label>
			<input style ="height:30px;" placeholders="Enter the option body ..." class="form-control" type="text" required="required" name="body">
			</div>

			<div class="form-group">
			<label >Is this option correct ?</label>
				<select style="height: 30px; width: 50%;" name="is_correct" id="is_correct" onChange="changePointsVisability();" class="form-control" >
					<option class="hidden"  selected disabled>Select your choice... </option>
					<option value="yes"  >YES</option>
					<option value="no"  >NO</option>
				</select>
			</div>


			<div style="display:none;" class="form-group" id="points">
				<label > Points</label>
				<input type="number" class="form-control" type="text" name="points">
			</div>


			<br><br><br>
			

			<div class= "form-group" >
				<button style="color: white; background: #323a56;" class="btn" type="submit">Add</button>
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