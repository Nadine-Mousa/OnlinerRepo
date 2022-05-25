@extends('layouts.nav')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onliner | Subject</title>
    <link rel="stylesheet" href="{{asset('assets/css/subjects/show.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/partitions/title.css')}}" media="screen">
    


</head>
<body>

    @section('content')
    <div class = "six">
	<h1> {{$subject->subject_name}} </h1>
	<!-- <span> All the faculty departments </span> -->
    </div>

        <div class="container mt-5">
        <div class="row">
            <div class="col-12">
            <article class="blog-card">
                <div class="blog-card__background">
                <div class="card__background--wrapper">
                    <div class="card__background--main" style="background-image: url('/assets/images/subjects/subject.jpg');">
                    <div class="card__background--layer"></div>
                    </div>
                </div>
                </div>
                <div class="blog-card__head">
                <span class="date__box">
                    <span class="date__day">{{$subject->subject_name}}</span>
                </span>
                </div>
                <div class="blog-card__info">
                <h3>{{$subject->subject_name}}</h3>
                <p>
                    <a href="#" class="icon-link mr-3"><i class="fa fa-pencil-square-o"></i> Chapters {{$subject->chapter_count}}</a>
                    <a href="#" class="icon-link"><i class="fa fa-comments-o"></i> 150</a>
                </p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque vero libero voluptatibus earum? Alias dignissimos quo cum, nulla esse facere atque, blanditiis doloribus at sunt quas, repellendus vel? Et, hic!</p>
                
                @if ($is_student )
                <a href="{{ route('exams.student_exams') }}" class="btn btn--with-icon"><i class="btn-icon fa fa-long-arrow-right"></i>Exams</a>
                @endif
                <a href="{{route('questions.index', ['user' => $user->id, 'subject' => $subject->id])}}" class="btn btn--with-icon"><i class="btn-icon fa fa-long-arrow-right"></i>Question Bank</a>
                <a href="{{route('chapters.index')}}" class="btn btn--with-icon"><i class="btn-icon fa fa-long-arrow-right"></i>Chapters</a>


                @if($hasApprovalToSubject  && $is_prof ) 
                <a href="{{route('exams.index')}}" class="btn btn--with-icon"><i class="btn-icon fa fa-long-arrow-right"></i>Exams</a>
                @endif
                
                <!-- Asking for Approval and Pinning -->

                @if($hasApprovalToSubject == false && $is_prof == true)

                @if($has_requested_subject_approval)
                <a href="#" class="btn btn--with-icon"><i class="btn-icon fa fa-long-arrow-right"> </i>  Pending   </a>
                @else 
                <a href="{{route('subjects.ask_for_approve', ['subject'=> $subject->id])}}" class="btn btn--with-icon"><i class="btn-icon fa fa-long-arrow-right"> </i>  Ask for Approval   </a>
                @endif

                @endif 

                </div>
            </article>
            </div>
        </div>
        </div>

                <section class="detail-page">
                <div class="container mt-5">
                    
                </div>
                </section>

    @endsection('content')
    
</body>
</html>