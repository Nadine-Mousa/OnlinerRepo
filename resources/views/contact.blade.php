@extends('layouts.nav')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <link rel="stylesheet" href="{{asset('assets/css/welcome/nicepage.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/welcome/Home.css')}}" media="screen">
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
</head>
<body class="u-body u-xl-mode">
    
    @section('content')
    <section class="u-clearfix u-palette-1-light-2 u-section-7" id="carousel_13d1">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-valign-middle-xs u-sheet-1">
        <img alt="" class="u-image u-image-default u-image-1" data-image-width="1200" data-image-height="1043" src="assets/images/welcome/derr-min.jpg">
        <div class="u-form u-white u-form-1">
          <form action="#" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" source="email" name="form" style="padding: 28px;">
            <div class="u-form-group u-form-name">
              <label for="name-4c18" class="u-label">Name</label>
              <input type="text" placeholder="Enter your Name" id="name-4c18" name="name" class="u-input u-input-rectangle u-palette-1-light-3" required="">
            </div>
            <div class="u-form-email u-form-group">
              <label for="email-4c18" class="u-label">Email</label>
              <input type="email" placeholder="Enter a valid email address" id="email-4c18" name="email" class="u-input u-input-rectangle u-palette-1-light-3" required="">
            </div>
            <div class="u-form-group u-form-message">
              <label for="message-4c18" class="u-label">Message</label>
              <textarea placeholder="Enter your message" rows="4" cols="50" id="message-4c18" name="message" class="u-input u-input-rectangle u-palette-1-light-3" required=""></textarea>
            </div>
            <div class="u-form-agree u-form-group u-form-group-4">
              <input type="checkbox" id="agree-a472" name="agree" class="u-agree-checkbox" required="">
              <label for="agree-a472" class="u-label">I accept the <a href="#">Terms of Service</a>
              </label>
            </div>
            <div class="u-align-left u-form-group u-form-submit">
              <a href="#" class="u-border-none u-btn u-btn-submit u-button-style u-hover-palette-1-dark-1 u-palette-2-base u-btn-1">Submit</a>
              <input type="submit" value="submit" class="u-form-control-hidden">
            </div>
            <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
            <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
            <input type="hidden" value="" name="recaptchaResponse">
          </form>
        </div>
        <p class="u-align-right u-text u-text-default u-text-1">Image by <a href="https://www.freepik.com/photos/business" class="u-border-1 u-border-black u-btn u-button-link u-button-style u-none u-text-body-color u-btn-2" target="_blank">Freepik</a>
        </p>
      </div>
    </section>
    
    @endsection('content')
    
</body>
</html>