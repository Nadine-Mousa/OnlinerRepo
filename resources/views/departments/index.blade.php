@extends('home')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Onliner | Departments</title>
  <link rel="stylesheet" href="{{asset('assets/css/departments/index.css')}}" media="screen">
  <link rel="stylesheet" href="{{asset('assets/css/partitions/title.css')}}" media="screen">


 

</head>
<body style="background: #ccd1e5">
	

@section('content')
<div class = "six">
	<h1> Departments </h1>
	<!-- <span> All the faculty departments </span> -->
</div>
<br><br>

@foreach($departments as $department)
<div class="blog-card">
    <div class="meta">
      <div class="photo" style="background-image: url(/assets/images/welcome/laptop6.jpg)"></div>
      <ul class="details">
        <li class="author"><a href="#">John Doe</a></li>
        <li class="date">Aug. 24, 2015</li>
        <li class="tags">
          <ul>
            <li><a href="#">Learn</a></li>
            <li><a href="#">Code</a></li>
            <li><a href="#">HTML</a></li>
            <li><a href="#">CSS</a></li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="description">
      <h1 >{{$department->dep_name}} </h1>
      <h2>Opening a door to the future</h2>
      <p style="color: #323a56;"> {{$department->dep_description}}</p>
      <p class="read-more">
		<input type="hidden" name ="department_id" value>
        <a type="submit" href="{{route('levels.index', ['department' => $department->id])}}">Read more</a>
      </p>
    </div>
</div>
@endforeach
@endsection('content')

  
</body>
</html>