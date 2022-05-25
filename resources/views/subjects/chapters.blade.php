@extends('layouts.nav')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Onliner | Chapters</title>
  <link rel="stylesheet" href="{{asset('assets/css/departments/index.css')}}" media="screen">
  <link rel="stylesheet" href="{{asset('assets/css/partitions/title.css')}}" media="screen">


 

</head>
<body style="background: #ccd1e5">
	

@section('content')
<div class = "six">
	<h1> chapters </h1>
	<!-- <span> All the faculty chapters </span> -->
</div>
<br><br>

@foreach($chapters as $chapter)
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
      <h1 >{{$chapter->chapter_name}} </h1>
      <h2>Chapter Number: {{$chapter->chapter_num}}</h2>
      <p style="color: #323a56;"> {{$chapter->chapter_desc}}</p>
      <p class="read-more">
		<input type="hidden" name ="chapter_id" value>
        <a type="submit" href="{{route('chapters.questions', ['chapter' => $chapter->id])}}">Questions</a>
      </p>
    </div>
</div>
@endforeach
@endsection('content')

  
</body>
</html>