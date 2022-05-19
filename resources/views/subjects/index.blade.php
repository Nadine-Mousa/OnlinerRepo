@extends('layouts.nav')
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Onliner | Subjects</title>
  <!-- <link rel='stylesheet' href='https://rawcdn.githack.com/SochavaAG/example-mycode/master/_common/css/reset.css'><link rel="stylesheet" href="./style.css"> -->
  <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->

  <style>
        /* * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      } */

      bodySubject {
        background: #ccd1e5;
        font-family: sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica,
          Arial, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
      }

      .main-container {
        padding: 30px;
      }

      /* HEADING */

      .heading {
        text-align: center;
      }

      .heading__title {
        font-weight: 600;
      }

      .heading__credits {
        margin: 10px 0px;
        color: #888888;
        font-size: 25px;
        transition: all 0.5s;
      }

      .heading__link {
        text-decoration: none;
      }

      .heading__credits .heading__link {
        color: inherit;
      }

      /* CARDS */

      .cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .card {
        margin: 20px;
        padding: 20px;
        width: 500px;
        min-height: 200px;
        display: block;
        grid-template-rows: 20px 50px 1fr 50px;
        border-radius: 10px;
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
        transition: all 0.2s;
      }

      .card:hover {
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
        transform: scale(1.01);
      }

      .card__link,
      .card__exit,
      .card__icon {
        position: relative;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.9);
      }

      .card__link::after {
        position: absolute;
        top: 25px;
        left: 0;
        content: "";
        width: 0%;
        height: 3px;
        background-color: rgba(255, 255, 255, 0.6);
        transition: all 0.5s;
      }

      .card__link:hover::after {
        width: 100%;
      }

      .card__exit {
        grid-row: 1/2;
        justify-self: end;
      }

      .card__icon {
        grid-row: 2/3;
        font-size: 30px;
      }

      .card__title {
        grid-row: 3/4;
        font-weight: 400;
        color: #ffffff;
      }

      .card__apply {
        grid-row: 4/5;
        align-self: center;
      }

      /* CARD BACKGROUNDS */

      .card-1 {
        background-color: #b8c6db;
        /* background-image: linear-gradient(315deg, #b8c6db 0%, #f5f7fa 74%); */
        /* background: radial-gradient(#1fe4f5, #3fbafe); */
      }

      .card-2 {
        background: radial-gradient(#fbc1cc, #fa99b2);
      }

      .card-3 {
        background: radial-gradient(#76b2fe, #b69efe);
      }

      .card-4 {
        background: radial-gradient(#60efbc, #58d5c9);
      }

      .card-5 {
        background: radial-gradient(#f588d8, #c0a3e5);
      }

      /* RESPONSIVE */

      @media (max-width: 1600px) {
        .cards {
          justify-content: center;
        }
      }

  </style>

</head>
<body >
 
@section('content')

<!-- 

GRADIENT BANNER DESIGN BY SIMON LURWER ON DRIBBBLE:
https://dribbble.com/shots/14101951-Banners

-->
<div class="bodySubject">
<div class="main-container">
  <!-- <div class="heading">
    <h1 class="heading__title">Gradient Banner Cards</h1>
    <p class="heading__credits"><a class="heading__link" target="_blank" href="https://dribbble.com/sl">Design by Simon Lurwer on Dribbble</a></p>
  </div> -->

  @foreach($subjects as $subject)

  <div class="cards">
    <div class="card card-1">
      <div class="card__icon"><i class="fa fa-book"></i></div>
      <!-- <p class="card__exit"><i class="fa fa-times"></i></p> -->
      <h2 class="card__title">{{$subject->subject_name}}</h2>
      <h2 class="card__title">{{$subject->subject_description}}</h2>
      <p class="card__apply">
        <a class="card__link" href="{{ route('subjects.show', ['subject' => $subject->id]) }}">View Subject <i class="fa fa-arrow-right"></i></a>
      </p>
    </div>
  @endforeach

    <!-- <div class="card card-2">
      <div class="card__icon"><i class="fas fa-bolt"></i></div>
      <p class="card__exit"><i class="fas fa-times"></i></p>
      <h2 class="card__title">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h2>
      <p class="card__apply">
        <a class="card__link" href="#">Apply Now <i class="fas fa-arrow-right"></i></a>
      </p>
    </div>
    <div class="card card-3">
      <div class="card__icon"><i class="fas fa-bolt"></i></div>
      <p class="card__exit"><i class="fas fa-times"></i></p>
      <h2 class="card__title">Ut enim ad minim veniam.</h2>
      <p class="card__apply">
        <a class="card__link" href="#">Apply Now <i class="fas fa-arrow-right"></i></a>
      </p>
    </div>
    <div class="card card-4">
      <div class="card__icon"><i class="fas fa-bolt"></i></div>
      <p class="card__exit"><i class="fas fa-times"></i></p>
      <h2 class="card__title">Quis nostrud exercitation ullamco laboris nisi.</h2>
      <p class="card__apply">
        <a class="card__link" href="#">Apply Now <i class="fas fa-arrow-right"></i></a>
      </p>
    </div>
    <div class="card card-5">
      <div class="card__icon"><i class="fas fa-bolt"></i></div>
      <p class="card__exit"><i class="fas fa-times"></i></p>
      <h2 class="card__title">Ut aliquip ex ea commodo consequat. Duis aute irure dolor.</h2>
      <p class="card__apply">
        <a class="card__link" href="#">Apply Now <i class="fas fa-arrow-right"></i></a>
      </p>
    </div>
    <div class="card card-1">
      <div class="card__icon"><i class="fas fa-bolt"></i></div>
      <p class="card__exit"><i class="fas fa-times"></i></p>
      <h2 class="card__title">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
      <p class="card__apply">
        <a class="card__link" href="#">Apply Now <i class="fas fa-arrow-right"></i></a>
      </p>
    </div> -->

  </div>
</div>
</div>

@endsection('content')

</body>
</html>
