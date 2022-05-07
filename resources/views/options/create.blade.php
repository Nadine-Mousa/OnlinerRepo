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
		<div class="alert alert-primary" role="alert">
		  {{$item}}
		</div>
		@endforeach
			
		@endif

	
		<form  method="POST" action= "{{route('options.store',['user' => $user->id, 'subject' => $subject, 'question' => $question->id])}}" >
			@csrf
			<div class="form-group">
			<label for="exampleFormControlInput1">Title</label>
			<input class="form-control" type="text" required="required" name="body">
			</div>

		
			
			<div class="form-group">
				<div class="form-check">
                    <input class="form-check-input" type="radio" name="is_correct" id="correct" value="1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Correct Answer
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_correct" id="wrong"  value="0">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Wrong Answer
                    </label>
                  </div>
			</div>

			<div class="form-group" id="points">
				<label for="exampleFormControlInput1"> Points</label>
				<input class="form-control" type="text" required="required" name="points">
			</div>

			

<br>
<br>
		
<br>
			


			


			
			


			<div class= "form-group" >
				<button class="btn btn-danger" type="submit">Submit</button>
			</div>
		</form>
	</div>

	@endsection

	<script>
		const points=document.getElementByld('points');
		function x(){
			if(document.getElementByld('correct').checked){
				points.style.display='block';
			}
			else{
				points.style.display='none';
			}
		}
		const y= document.querySelectorAll('input[name="is_correct"]');
		radioButtons.forEach(radio => {
			radio.addEventListener('click', x);
		});
	</script>
</body>
</html>