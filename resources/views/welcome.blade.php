@extends('layouts.nav')
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Our Mission, The Future is Here, ​Architectural Design &amp;amp; Research, Architectural Agency, About Company, Our Team, ​Building Expertise">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Onliner | Home</title>
    <link rel="stylesheet" href="{{asset('assets/css/welcome/nicepage.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/welcome/Home.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/welcome/exam_key.css')}}" media="screen">

    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.7.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    
      <script type="application/ld+json">{
          "@context": "http://schema.org",
          "@type": "Organization",
          "name": "",
          "logo": "#"
          }
      </script>




    <meta name="theme-color" content="#323a56">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">


  </head>
  @section('content')
  <body class="u-body u-xl-mode">
    <!-- <header class="u-clearfix u-header u-header" id="sec-664a">
      <div class="u-clearfix u-sheet u-sheet-1">
         image
        <a href="https://nicepage.com" class="u-image u-logo u-image-1">
          <img style="height: 100px; width: 200px;"  src="assets/images/welcome/logo.jpg" class="u-logo-image u-logo-image-1">
        </a>
        
      </div>
    </header>-->

    <!-- Exam Key Input -->

    
    <section class="u-clearfix u-image u-section-1" id="sec-cd44" data-image-width="1127" data-image-height="750">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-left u-container-style u-layout-cell u-left-cell u-palette-1-base u-shape-rectangle u-size-21 u-layout-cell-1">
                <div class="u-container-layout u-valign-top u-container-layout-1">
                  <h1 class="u-text u-text-1">Onliner</h1>
                  <!-- exam key  -->
                  @if($user->role == 3)
                    <div class="containerExamKey">
                          <div class="content" >
                              <form class="subscription" metod="GET" action="{{route('exams.quiz')}}">
                                @csrf
                              <input name="exam_key" class="add-email" required="required" type="text" placeholder="Enter an exam key ....">
                              <button class="submit-email" type="submit">
                                  <span class="before-submit">Take exam</span>
                                  <span class="after-submit">Go kill it!</span>
                              </button>
                              </form>
                          </div>
                    </div>
                  @endif

                  <p class="u-large-text u-text u-text-palette-1-light-2 u-text-variant u-text-2">We're building value and opportunity by investing in cybersecurity, analytics, digital solutions, engineering and science, and consulting. </p>
                  <p class="u-text u-text-default u-text-3">Images from <a href="https://www.freepik.com/photos/background" class="u-border-1 u-border-white u-btn u-button-link u-button-style u-none u-text-body-alt-color u-btn-1">Freepik</a>
                  </p>
                  <a href="https://nicepage.studio" class="u-border-2 u-border-active-white u-border-hover-white u-border-white u-btn u-button-style u-hover-white u-none u-text-active-palette-1-base u-text-hover-palette-1-base u-btn-2">view more</a>
                </div>
              </div>
              <div class="u-align-right u-container-style u-layout-cell u-right-cell u-size-39 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <p class="u-text u-text-body-alt-color u-text-4" > <span style="color:#323a56;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit nullam nunc justo sagittis suscipit ultrices. </span></p>
                  <div class="u-social-icons u-spacing-16 u-social-icons-1">
                    <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-facebook u-social-icon  u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-60c6"></use></svg><svg x="0px" y="0px" viewBox="0 0 112 112" id="svg-60c6" class="u-svg-content"><path d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2 c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path></svg></span>
                    </a>
                    <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-twitter  u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-52c2"></use></svg><svg x="0px" y="0px" viewBox="0 0 112 112" id="svg-52c2" class="u-svg-content"><path d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2 c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7 c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2 c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5 c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path></svg></span>
                    </a>
                    <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-instagram  u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-24b3"></use></svg><svg x="0px" y="0px" viewBox="0 0 112 112" id="svg-24b3" class="u-svg-content"><path d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path><path d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path><path d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7 V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7 c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path></svg></span>
                    </a>
                    <a class="u-social-url" target="_blank" href="#"><span class="u-icon u-icon-circle u-social-icon u-social-youtube  u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-b189"></use></svg><svg x="0px" y="0px" viewBox="0 0 112 112" id="svg-b189" class="u-svg-content"><path d="M82.3,24H29.7C19.3,24,11,32.5,11,43v26.7c0,10.5,8.3,19,18.7,19h52.5c10.3,0,18.7-8.5,18.7-19V43 C101,32.5,92.7,24,82.3,24L82.3,24z M69.7,57.6L45.1,69.5c-0.7,0.2-1.4-0.2-1.4-0.8V44.1c0-0.7,0.8-1.3,1.4-0.8l24.6,12.6 C70.4,56.2,70.4,57.3,69.7,57.6L69.7,57.6z"></path></svg></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <h2  class="u-text u-text-palette-4-dark-2 u-text-5"><span style="color: #232a56" >Put Your Pencils Down</span></h2>
      </div>
    </section>
    <section class="u-align-left u-clearfix u-palette-1-light-2 u-section-2" id="sec-f9d8">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-align-center u-text u-text-default u-text-1"> Development &amp; Design</h2>
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-align-left u-border-14 u-border-no-bottom u-border-no-right u-border-no-top u-border-palette-1-base u-container-style u-custom-border u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-1">
              <div class="u-container-layout u-similar-container u-container-layout-1">
                <div class="u-image u-image-circle u-image-1" alt="" data-image-width="450" data-image-height="520"></div>
                <h3 class="u-text u-text-2"> Software Engineering</h3>
                <p class="u-text u-text-3"> Congue eu consequat ac felis donec et odio pellentesque diam. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Blandit turpis cursus in hac. Tristique senectus et netus et malesuada fames ac. Amet purus gravida quis blandit. </p><span class="u-file-icon u-icon u-icon-1"><img src="assets/images/welcome/254434.png" alt=""></span>
              </div>
            </div>
            <div class="u-align-left u-border-14 u-border-no-bottom u-border-no-right u-border-no-top u-border-palette-1-base u-container-style u-custom-border u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-2">
              <div class="u-container-layout u-similar-container u-container-layout-2">
                <div class="u-image u-image-circle u-image-2" alt="" data-image-width="598" data-image-height="598"></div>
                <h3 class="u-text u-text-4"> Data Science</h3>
                <p class="u-text u-text-5"> Congue eu consequat ac felis donec et odio pellentesque diam. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Blandit turpis cursus in hac. Tristique senectus et netus et malesuada fames ac. Amet purus gravida quis blandit. </p><span class="u-file-icon u-icon u-icon-2"><img src="assets/images/welcome/254434.png" alt=""></span>
              </div>
            </div>
            <div class="u-align-left u-border-14 u-border-no-bottom u-border-no-right u-border-no-top u-border-palette-1-base u-container-style u-custom-border u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-3">
              <div class="u-container-layout u-similar-container u-container-layout-3">
                <div class="u-image u-image-circle u-image-3" alt="" data-image-width="598" data-image-height="598"></div>
                <h3 class="u-text u-text-6">Computer Science</h3>
                <p class="u-text u-text-7"> Congue eu consequat ac felis donec et odio pellentesque diam. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Blandit turpis cursus in hac. Tristique senectus et netus et malesuada fames ac. Amet purus gravida quis blandit. </p><span class="u-file-icon u-icon u-icon-3"><img src="assets/images/welcome/254434.png" alt=""></span>
              </div>
            </div>
            <div class="u-align-left u-border-14 u-border-no-bottom u-border-no-right u-border-no-top u-border-palette-1-base u-container-style u-custom-border u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-4">
              <div class="u-container-layout u-similar-container u-container-layout-4">
                <div class="u-image u-image-circle u-image-4" alt="" data-image-width="598" data-image-height="598"></div>
                <h3 class="u-text u-text-8"> Science and Technology</h3>
                <p class="u-text u-text-9"> Congue eu consequat ac felis donec et odio pellentesque diam. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Blandit turpis cursus in hac. Tristique senectus et netus et malesuada fames ac. Amet purus gravida quis blandit. </p><span class="u-file-icon u-icon u-icon-4"><img src="assets/images/welcome/254434.png" alt=""></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="u-align-left u-clearfix u-palette-1-base u-section-4" id="carousel_370a">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-xl u-sheet-1">
        <div class="u-align-left u-container-style u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-group-1">
          <div class="u-container-layout u-valign-middle u-container-layout-1">
            <h2 class="u-text u-text-1">Our Team</h2>
            <p class="u-text u-text-2">Paragraph. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id suscipit ex. Suspendisse rhoncus laoreet purus <a href="https://nicepage.studio" class="u-border-1 u-border-hover-palette-1-base u-border-white u-btn u-button-link u-button-style u-none u-text-body-alt-color u-btn-1">quis elementum</a>. Phasellus sed efficitur dolor, et ultricies sapien. Quisque fringilla sit amet dolor commodo efficitur.
                Aliquam et sem odio. In ullamcorper nisi nunc, et molestie ipsum iaculis sit amet. 
            </p>
            <p class="u-text u-text-3">Image by <a href="https://www.freepik.com/photos/people" class="u-border-1 u-border-active-palette-1-light-2 u-border-hover-palette-1-light-2 u-border-white u-btn u-button-link u-button-style u-none u-text-body-alt-color u-btn-2" target="_blank">Freepik</a>
            </p>
            <a href="https://nicepage.best" class="u-border-2 u-border-active-white u-border-hover-white u-border-white u-btn u-button-style u-hover-white u-none u-text-active-palette-1-base u-text-hover-palette-1-base u-btn-3">contact us</a>
          </div>
        </div>
        <div class="u-clearfix u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-gutter-30 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-size-30">
                <div class="u-layout-col">
                  <div class="u-align-center u-container-style u-layout-cell u-right-cell u-shape-rectangle u-size-20 u-size-30-md u-white u-layout-cell-1">
                    <div class="u-container-layout u-valign-middle u-container-layout-2">
                      <div alt="" class="u-align-center u-image u-image-circle u-image-1" data-image-width="598" data-image-height="598"></div>
                      <h4 class="u-text u-text-4">Alex Richmond</h4>
                      <p class="u-text u-text-palette-2-base u-text-5">developer</p>
                      <div class="u-social-icons u-spacing-10 u-social-icons-1">
                        <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-facebook u-social-icon u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-971e"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0px" y="0px" id="svg-971e"><path d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2 c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path></svg></span>
                        </a>
                        <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-twitter u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-2c40"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0px" y="0px" id="svg-2c40"><path d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2 c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7 c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2 c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5 c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path></svg></span>
                        </a>
                        <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-instagram u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-31b0"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0px" y="0px" id="svg-31b0"><path d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path><path d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path><path d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7 V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7 c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path></svg></span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="u-align-center u-container-style u-layout-cell u-right-cell u-shape-rectangle u-size-20 u-size-30-md u-white u-layout-cell-2">
                    <div class="u-container-layout u-valign-middle u-container-layout-3">
                      <div alt="" class="u-align-center u-image u-image-circle u-image-2" data-image-width="598" data-image-height="598"></div>
                      <h4 class="u-text u-text-6">Connor Quinn</h4>
                      <p class="u-text u-text-palette-2-base u-text-7">designer</p>
                      <div class="u-social-icons u-spacing-10 u-social-icons-2">
                        <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-facebook u-social-icon u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-539d"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0px" y="0px" id="svg-539d"><path d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2 c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path></svg></span>
                        </a>
                        <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-twitter u-icon-5"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-09f5"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0px" y="0px" id="svg-09f5"><path d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2 c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7 c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2 c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5 c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path></svg></span>
                        </a>
                        <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-instagram u-icon-6"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-4f34"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0px" y="0px" id="svg-4f34"><path d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path><path d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path><path d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7 V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7 c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path></svg></span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="u-container-style u-hidden-sm u-hidden-xs u-layout-cell u-right-cell u-size-20 u-size-60-md u-layout-cell-3">
                    <div class="u-container-layout u-container-layout-4"></div>
                  </div>
                </div>
              </div>
              <div class="u-size-30">
                <div class="u-layout-col">
                  <div class="u-container-style u-hidden-sm u-hidden-xs u-layout-cell u-left-cell u-size-20 u-size-30-md u-layout-cell-4">
                    <div class="u-container-layout u-container-layout-5"></div>
                  </div>
                  <div class="u-align-center u-container-style u-layout-cell u-left-cell u-shape-rectangle u-size-20 u-size-30-md u-white u-layout-cell-5">
                    <div class="u-container-layout u-valign-middle u-container-layout-6">
                      <div alt="" class="u-align-center u-image u-image-circle u-image-3" data-image-width="598" data-image-height="598"></div>
                      <h4 class="u-text u-text-palette-1-base u-text-8">Jeffrey Brown</h4>
                      <p class="u-text u-text-palette-2-base u-text-9">creative leader</p>
                      <div class="u-social-icons u-spacing-10 u-social-icons-3">
                        <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-facebook u-social-icon u-icon-7"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-327f"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0px" y="0px" id="svg-327f"><path d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2 c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path></svg></span>
                        </a>
                        <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-twitter u-icon-8"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-67e0"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0px" y="0px" id="svg-67e0"><path d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2 c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7 c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2 c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5 c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path></svg></span>
                        </a>
                        <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-instagram u-icon-9"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-f03e"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0px" y="0px" id="svg-f03e"><path d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path><path d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path><path d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7 V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7 c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path></svg></span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="u-align-center u-container-style u-layout-cell u-left-cell u-shape-rectangle u-size-20 u-size-60-md u-white u-layout-cell-6">
                    <div class="u-container-layout u-valign-middle u-container-layout-7">
                      <div alt="" class="u-align-center u-image u-image-circle u-image-4" data-image-width="598" data-image-height="598"></div>
                      <h4 class="u-text u-text-10">Ann Smith</h4>
                      <p class="u-text u-text-palette-2-base u-text-11">manager</p>
                      <div class="u-social-icons u-spacing-10 u-social-icons-4">
                        <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-facebook u-social-icon u-icon-10"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-3379"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 112 112" x="0px" y="0px" id="svg-3379"><path d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2 c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path></svg></span>
                        </a>
                        <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-twitter u-icon-11"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1bd3"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 112 112" x="0px" y="0px" id="svg-1bd3"><path d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2 c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7 c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2 c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5 c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path></svg></span>
                        </a>
                        <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-instagram u-icon-12"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0e93"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 112 112" x="0px" y="0px" id="svg-0e93"><path d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path><path d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path><path d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7 V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7 c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path></svg></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="u-clearfix u-palette-1-light-2 u-section-5" id="carousel_6ca4">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-palette-2-base u-shape u-shape-rectangle u-shape-1"></div>
        <img class="u-image u-image-default u-image-1" data-image-width="1200" data-image-height="1018" src="assets/images/welcome/rtt.jpg">
        <div class="u-align-left u-container-style u-group u-white u-group-1">
          <div class="u-container-layout u-valign-middle u-container-layout-1">
            <h2 class="u-text u-text-default u-text-1"> Building Expertise</h2>
            <p class="u-text u-text-2">Massa ultricies mi quis hendrerit. Ac ut consequat semper viverra nam. Libero id faucibus nisl tincidunt eget nullam non nisi est. Arcu odio ut sem nulla. Amet tellus cras adipiscing enim. Et magnis dis parturient montes. Imperdiet sed euismod nisi porta lorem.</p>
            <p class="u-text u-text-3">Image by <a href="https://www.freepik.com/photos/business" class="u-border-1 u-border-black u-btn u-button-link u-button-style u-none u-text-body-color u-btn-1" target="_blank">Freepik</a>
            </p>
            <a href="https://nicepage.studio" class="u-active-palette-1-base u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-palette-1-base u-btn u-button-style u-hover-palette-1-base u-none u-text-active-white u-text-hover-white u-btn-2">view more</a>
          </div>
        </div>
      </div>
    </section>


 
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-72ea"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">© Copyright reserved &nbsp;Onliner 2022&nbsp;</p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
        <span>Web Templates</span>
      </a>
      <p class="u-text">
        <span>created with</span>
      </p>
      <a class="u-link" href="https://nicepage.review" target="_blank">
        <span>Best Free Website Builder</span>
      </a>. 
    </section>

    <script>
    var msg = '{{Session::get('noSuchExamKey')}}';
    var exist = '{{Session::has('noSuchExamKey')}}';
    if(exist){
      alert(msg);
    }
  </script>


    @endsection('content')

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
            document.querySelector('.submit-email').addEventListener('mousedown', (e) => {
            e.preventDefault();
            document.querySelector('.subscription').classList.add('done');
            });
    </script>
</body>
  
  </body>
</html>