@foreach ($navbars as $navbarItem)
	<li class="nav-item">
		<a class="nav-link" href="{{ route($navbarItem->route) }}">{{ $navbarItem->name }}</a>
	</li>
@endforeach


<!-- Levels Old Code -->

	<div class="level_body">
	@foreach($levels as $level)

	<a href="{{route('subjects.index', ['level' => $level->level_number])}}" class="card credentialing">
		<div class="overlay"></div>
	<div class="circle">
		
	<svg width="64px" height="72px" viewBox="27 21 64 72" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<!-- Generator: Sketch 42 (36781) - http://www.bohemiancoding.com/sketch -->
		<desc>Created with Sketch.</desc>
		<defs>
			<polygon id="path-1" points="60.9784821 18.4748913 60.9784821 0.0299638385 0.538377293 0.0299638385 0.538377293 18.4748913"></polygon>
		</defs>
		<g id="Group-12" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(27.000000, 21.000000)">
			<g id="Group-5">
				<g id="Group-3" transform="translate(2.262327, 21.615176)">
					<mask id="mask-2" fill="white">
						<use xlink:href="#path-1"></use>
					</mask>
					<g id="Clip-2"></g>
					<path d="M7.17774177,18.4748913 L54.3387782,18.4748913 C57.9910226,18.4748913 60.9789911,15.7266455 60.9789911,12.3681986 L60.9789911,6.13665655 C60.9789911,2.77820965 57.9910226,0.0299638385 54.3387782,0.0299638385 L7.17774177,0.0299638385 C3.52634582,0.0299638385 0.538377293,2.77820965 0.538377293,6.13665655 L0.538377293,12.3681986 C0.538377293,15.7266455 3.52634582,18.4748913 7.17774177,18.4748913" id="Fill-1" fill="#59A785" mask="url(#mask-2)"></path>
				</g>
				<polygon id="Fill-4" fill="#FFFFFF" transform="translate(31.785111, 30.877531) rotate(-2.000000) translate(-31.785111, -30.877531) " points="62.0618351 55.9613216 7.2111488 60.3692832 1.50838775 5.79374073 56.3582257 1.38577917"></polygon>
				<ellipse id="Oval-3" fill="#25D48A" opacity="0.216243004" cx="30.0584472" cy="21.7657707" rx="9.95169733" ry="9.17325562"></ellipse>
				<g id="Group-4" transform="translate(16.959615, 6.479082)" fill="#54C796">
					<polygon id="Fill-6" points="10.7955395 21.7823628 0.11873799 11.3001058 4.25482787 7.73131106 11.0226557 14.3753897 27.414824 1.77635684e-15 31.3261391 3.77891399"></polygon>
				</g>
				<path d="M4.82347935,67.4368303 L61.2182039,67.4368303 C62.3304205,67.4368303 63.2407243,66.5995595 63.2407243,65.5765753 L63.2407243,31.3865871 C63.2407243,30.3636029 62.3304205,29.5263321 61.2182039,29.5263321 L4.82347935,29.5263321 C3.71126278,29.5263321 2.80095891,30.3636029 2.80095891,31.3865871 L2.80095891,65.5765753 C2.80095891,66.5995595 3.71126278,67.4368303 4.82347935,67.4368303" id="Fill-8" fill="#59B08B"></path>
				<path d="M33.3338063,67.4368303 L61.2181191,67.4368303 C62.3303356,67.4368303 63.2406395,66.5995595 63.2406395,65.5765753 L63.2406395,31.3865871 C63.2406395,30.3636029 62.3303356,29.5263321 61.2181191,29.5263321 L33.3338063,29.5263321 C32.2215897,29.5263321 31.3112859,30.3636029 31.3112859,31.3865871 L31.3112859,65.5765753 C31.3112859,66.5995595 32.2215897,67.4368303 33.3338063,67.4368303" id="Fill-10" fill="#4FC391"></path>
				<path d="M29.4284029,33.2640869 C29.4284029,34.2202068 30.2712569,34.9954393 31.3107768,34.9954393 C32.3502968,34.9954393 33.1931508,34.2202068 33.1931508,33.2640869 C33.1931508,32.3079669 32.3502968,31.5327345 31.3107768,31.5327345 C30.2712569,31.5327345 29.4284029,32.3079669 29.4284029,33.2640869" id="Fill-15" fill="#FEFEFE"></path>
				<path d="M8.45417501,71.5549073 L57.5876779,71.5549073 C60.6969637,71.5549073 63.2412334,69.2147627 63.2412334,66.3549328 L63.2412334,66.3549328 C63.2412334,63.4951029 60.6969637,61.1549584 57.5876779,61.1549584 L8.45417501,61.1549584 C5.34488919,61.1549584 2.80061956,63.4951029 2.80061956,66.3549328 L2.80061956,66.3549328 C2.80061956,69.2147627 5.34488919,71.5549073 8.45417501,71.5549073" id="Fill-12" fill="#5BD6A2"></path>
			</g>
		</g>
	</svg>

	</div>
	<p>Level {{$level -> level_number}}</p>
	</a>


	@endforeach


	</div>


<style>
        /* Level style css */
         .level_body {
        background: #f2f4f8;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
        height: 100vh;
        font-family: "Open Sans";
        }


        .education {
        --bg-color: #ffd861;
        --bg-color-light: #ffeeba;
        --text-color-hover: #4C5656;
        --box-shadow-color: rgba(255, 215, 97, 0.48);
        }

        .credentialing {
        --bg-color: #B8F9D3;
        --bg-color-light: #e2fced;
        --text-color-hover: #4C5656;
        --box-shadow-color: rgba(184, 249, 211, 0.48);
        }

        .wallet {
        --bg-color: #CEB2FC;
        --bg-color-light: #F0E7FF;
        --text-color-hover: #fff;
        --box-shadow-color: rgba(206, 178, 252, 0.48);
        }

        .human-resources {
        --bg-color: #DCE9FF;
        --bg-color-light: #f1f7ff;
        --text-color-hover: #4C5656;
        --box-shadow-color: rgba(220, 233, 255, 0.48);
        }

        .card {
        width: 220px;
        height: 321px;
        background: #fff;
        border-top-right-radius: 10px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        box-shadow: 0 14px 26px rgba(0,0,0,0.04);
        transition: all 0.3s ease-out;
        text-decoration: none;
        }

        .card:hover {
        transform: translateY(-5px) scale(1.005) translateZ(0);
        box-shadow: 0 24px 36px rgba(0,0,0,0.11),
            0 24px 46px var(--box-shadow-color);
        }

        .card:hover .overlay {
        transform: scale(4) translateZ(0);
        }

        .card:hover .circle {
        border-color: var(--bg-color-light);
        background: var(--bg-color);
        }

        .card:hover .circle:after {
        background: var(--bg-color-light);
        }

        .card:hover p {
        color: var(--text-color-hover);
        }

        .card:active {
        transform: scale(1) translateZ(0);
        box-shadow: 0 15px 24px rgba(0,0,0,0.11),
            0 15px 24px var(--box-shadow-color);
        }

        .card p {
        font-size: 17px;
        color: #4C5656;
        margin-top: 30px;
        z-index: 1000;
        transition: color 0.3s ease-out;
        }

        .circle {
        width: 131px;
        height: 131px;
        border-radius: 50%;
        background: #fff;
        border: 2px solid var(--bg-color);
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease-out;
        }

        .circle:after {
        content: "";
        width: 118px;
        height: 118px;
        display: block;
        position: absolute;
        background: var(--bg-color);
        border-radius: 50%;
        top: 7px;
        left: 7px;
        transition: opacity 0.3s ease-out;
        }

        .circle svg {
        z-index: 10000;
        transform: translateZ(0);
        }

        .overlay {
        width: 118px;
        position: absolute; 
        height: 118px;
        border-radius: 50%;
        background: var(--bg-color);
        top: 70px;
        left: 50px;
        z-index: 0;
        transition: transform 0.3s ease-out;
        }
        
</style>


<!-- Subjects -->

<style>
    /* Subjects Cards style old */

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



