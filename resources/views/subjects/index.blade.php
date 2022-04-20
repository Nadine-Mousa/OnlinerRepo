@extends('home')
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Item Start Video (Hover)</title>
  <link rel='stylesheet' href='https://rawcdn.githack.com/SochavaAG/example-mycode/master/_common/css/reset.css'><link rel="stylesheet" href="./style.css">

  <style>
        .ag-format-container {
        width: 1142px;
        margin: 0 auto;
        }


        body {
        background-color: #1111;
        
        }

        a:hover {
        text-decoration: none;
        }

        .ag-create_box {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;

        padding: 50px 0;
        }
        .ag-create_item {
        display: block;
        width: 30%;
        background-color: #000;

        overflow: hidden;

        position: relative;
        }
        .ag-create_item video {
        display: block;
        max-width: 100%;
        margin: -8% auto 0;

        position: relative;
        }
        .ag-create_item svg {
        height: 99%;
        width: 100%;

        position: absolute;
        top: 0;
        left: 0;
        }
        .ag-create_item svg .cls-1 {
        fill: transparent;
        stroke: #5f5f5f;
        stroke-miterlimit: 10;

        -webkit-transition: stroke .4s linear;
        -moz-transition: stroke .4s linear;
        -o-transition: stroke .4s linear;
        transition: stroke .4s linear;
        }
        .ag-create_item svg .cls-2 {
        fill: #ff1923;

        opacity: 0;

        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
        }
        .ag-create_item svg .cls-3 {
        fill: transparent;

        stroke: #ff1923;
        stroke-miterlimit: 10;

        -webkit-transition: fill .4s linear;
        -moz-transition: fill .4s linear;
        -o-transition: fill .4s linear;
        transition: fill .4s linear;
        }
        .ag-create_item svg .cls-4 {
        fill: none;

        stroke-miterlimit: 10;
        stroke: #FFF;
        }
        .ag-create_title-item {
        width: 100%;
        margin-top: -8%;
        padding: 0 30px 25px;

        -webkit-text-stroke: 1px #FFF;
        stroke: 1px #FFF;

        text-align: left;
        font-size: 38px;
        color: transparent;

        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;

        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;

        position: relative;
        }
        .ag-create_item:hover .ag-create_title-item {
        -webkit-text-stroke: 1px hsla(0, 0%, 100%, 0);
        stroke: 1px hsla(0, 0%, 100%, 0);

        color: #FFF;
        }
        .ag-create_item:hover svg .cls-1 {
        stroke: #FFF;
        }
        .ag-create_item:hover svg .cls-2 {
        opacity: 1;
        }


        @media only screen and (max-width: 1161px) {
        .ag-create_item {
            width: 31%;
        }
        .ag-create_title-item {
            font-size: 19px;
        }
        }

        @media only screen and (max-width: 979px) {
        .ag-create_box {
            display: block;
        }
        .ag-create_item {
            max-width: 400px;
            width: 100%;
            margin: 0 auto 40px;
        }
        .ag-create_item:last-child {
            margin-bottom: 0;
        }
        .ag-create_title-item {
            font-size: 32px;
        }
        }

        @media only screen and (max-width: 767px) {
        .ag-format-container {
            width: 96%;
        }

        }

        @media only screen and (max-width: 639px) {

        }

        @media only screen and (max-width: 479px) {

        }

        @media (min-width: 768px) and (max-width: 979px) {
        .ag-format-container {
            width: 750px;
        }

        }

        @media (min-width: 980px) and (max-width: 1161px) {
        .ag-format-container {
            width: 960px;
        }

        }
  </style>
</head>
<body >
 
@section('content')

<div class="ag-format-container">
    <div class="ag-create_box">
        @foreach($subjects as $subject)
      <a href="{{route('subjects.show', ['user'=>$user->id, 'department' => $department, 'level'=>$level,  'subject' => $subject->id])}}" class="js-create_video ag-create_item">
        <video muted="" playsinline="">
          <source src="https://raw.githubusercontent.com/SochavaAG/example-mycode/master/pens/item-svg-video/video/mac-xpa-r.mp4" type="video/mp4">
          <source src="https://raw.githubusercontent.com/SochavaAG/example-mycode/master/pens/item-svg-video/video/mac-xpa-r.webm" type="video/webm">
        </video>

        <svg viewBox="0 0 411 431" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
          <polygon class="cls-1" points="0.5 430.5 340.31 430.5 410.5 361.03 410.5 0.5 0.5 0.5 0.5 430.5"></polygon>
          <polygon class="cls-2" points="355.17 430.5 410.33 375.33 410.33 430.5 355.17 430.5"></polygon>
          <polygon class="cls-3" points="355.17 430.5 410.33 375.33 410.33 430.5 355.17 430.5"></polygon>
          <line class="cls-4" x1="395" x2="395" y1="410" y2="419"></line>
          <line class="cls-4" x1="399.5" x2="390.5" y1="414.5" y2="414.5"></line>
        </svg>
        <div class="ag-create_title-item"><br><br> {{$subject->subject_name}} <br> </div>
      </a>
      @endforeach
    </div>
</div>
@endsection('content')

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script><script  src="./script.js"></script>
<script>
      (function ($) {
        $(function () {


          if (!('ontouchstart' in window)) {
            const videoPropCont = document.querySelectorAll('.js-create_video');

            videoPropCont.forEach(function (item) {
              item.addEventListener('mouseenter', function () {
                var video = this.querySelector('video');

                if(!item.classList.contains('js-active')){

                  item.classList.add('js-active');

                  video.play();
                  video.loop = false;

                  video.addEventListener('ended', function () {
                    item.classList.remove('js-active');
                    item.classList.remove('js-video-end');
                    item.classList.remove('js-video-pause');
                  });

                  video.addEventListener('timeupdate', function () {
                    if((video.currentTime >= 2) && !item.classList.contains('js-video-end')) {
                      video.pause();
                      item.classList.add('js-video-pause');
                    }
                  });
                }
              });

              item.addEventListener('mouseleave', function () {
                var video = this.querySelector('video');

                if(item.classList.contains('js-active')) {
                  if(item.classList.contains('js-video-pause')){
                    item.classList.add('js-video-end');
                    video.play()
                  } else {
                    item.classList.add('js-video-end');
                  }
                }

              });

            });
          }


        });
      })(jQuery);
</script>
</body>
</html>
