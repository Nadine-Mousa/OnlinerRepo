<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

	  <!-- navbar color : #b3ffcc -->
	  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- Font awsome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

	  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	

	<style>
        /* nav bar style */
               @import url('https://fonts.googleapis.com/css?family=Roboto');
                body {
                  margin: 0%;
                  color: white;
                  background: white;
                  font-family: 'Roboto', sans-serif;
                }
                #nav-colors, #font-colors, #edges {
                  margin-top: 10px;
                }
                #nav-colors .btn, #font-colors .btn, #edges .btn {
                  display: inline-block;
                  padding: 10px;
                  margin: 0 5px;
                  border: 2px solid #111;
                  transition: 0.2s ease;
                }
                #nav-colors .btn:hover, #font-colors .btn:hover, #edges .btn:hover {
                  border: 2px solid white;
                }
                #nav-colors #pink {
                  background: linear-gradient(to right,#80ffaa, #f857a6);
                }
                #nav-colors #red {
                  background: linear-gradient(to right, #d31027, #ea384d);
                }
                #nav-colors #purple {
                  background: linear-gradient(to right, #41295a, #2f0743);
                }
                #nav-colors #blue {
                  background: linear-gradient(to right, #396afc, #2948ff);
                }
                #nav-colors #green {
                  background: linear-gradient(to right, #add100, #7b920a);
                }
                #nav-colors #yellow {
                  background: linear-gradient(to right, #f7971e, #ffd200);
                }
                #nav-colors #orange {
                  background: linear-gradient(to right, #e43a15, #e65245);
                }
                #font-colors #white {
                  background: white;
                }
                #font-colors #black {
                  background: black;
                }
                #edges #rounded {
                  background: black;
                }
                #edges #square {
                  background: black;
                  border-radius: 0px;
                }
                #edges #rounded:hover, #edges #square:hover {
                  color: white;
                }
                .navbar {
                  border: 0;
                  border-radius: 0;
                  background: linear-gradient(to right, #80ffaa, #f857a6);
                }
                .navbar .nav li > a, .navbar .navbar-brand {
                  max-height: 50px;
                  width: auto;
                  background: transparent !important;
                  font-size: 18px;
                  transition: 0.2s ease-in-out;
                }
                .navbar .nav li > a:hover, .navbar .navbar-brand:hover {
                  background-color: rgba(255, 255, 255, 0.2);
                  font-size: 14px;
                }
                .navbar .nav li > a:hover .link, .navbar .navbar-brand:hover .link {
                  width: 100%;
                  padding: 0 5px 0 5px;
                  visibility: visible;
                  font-size: 14px;
                }
                .navbar .link {
                  width: 0;
                  font-family: 'Roboto', sans-serif;
                  transition: 0.2s ease-in-out;
                  visibility: hidden;
                  font-size: 0px;
                }
                .navbar span {
                  color: white;
                }
                .navbar .navbar-toggle {
                  padding-right: 0;
                }
                .navbar .navbar-toggle .icon-bar {
                  background: white;
                }
                .navbar .navbar-collapse {
                  display: none;
                }
                .navbar button {
                  background: transparent;
                }
                .navbar button[type=submit] {
                  padding-right: 0;
                }
                .navbar button[type=submit] span {
                  transition: 0.3s ease-in-out;
                }
                .navbar button[type=submit]:hover span {
                  transform: scale(1.3) rotate(90deg);
                }
                .navbar form {
                  padding: 0;
                }
                .navbar form .form-control {
                  border: 0;
                  border-radius: 0;
                  color: black;
                  font-weight: bold;
                  background: rgba(255, 255, 255, 0.7);
                  transition: 0.2s ease-in-out;
                }
                .navbar form .form-control:hover {
                  background: white;
                }
                .navbar .dropdown .fa-caret-down {
                  padding-left: 3px;
                  font-size: 18px;
                  transition: 0.4s ease;
                }
                .navbar .dropdown.open {
                  background-color: rgba(255, 255, 255, 0.2);
                  font-size: 14px;
                }
                .navbar .dropdown.open .link {
                  width: 100%;
                  visibility: visible;
                  font-size: 14px;
                  padding: 0 5px 0 5px;
                }
                .navbar .dropdown.open .dropdown-toggle {
                  font-size: 14px;
                }
                .navbar .dropdown.open .fa-caret-down {
                  transform: rotate(180deg);
                }
                .navbar .dropdown .dropdown-menu {
                  min-width: 0px !important;
                  width: 100%;
                  background:  #80ffaa;
                  text-align: center;
                  border-radius: 0;
                }
                .navbar .dropdown .dropdown-menu li, .navbar .dropdown .dropdown-menu a {
                  color: white;
                  font-size: 14px;
                  line-height: 30px;
                }
                .navbar .dropdown .dropdown-menu li:hover, .navbar .dropdown .dropdown-menu a:hover {
                  color: white;
                  letter-spacing: 1px;
                  background: transparent;
                }
                .navbar .dropdown .dropdown-menu a {
                  padding: 0 15px 0 15px;
                }
                @media (max-width: 769px) {
                  .navbar .link {
                    padding-left: 10px;
                    visibility: visible;
                    width: 100%;
                    font-size: 14px;
                  }
                  .navbar .navbar-brand .link {
                    visibility: hidden;
                  }
                  .dropdown .dropdown-menu {
                    text-align: left !important;
                  }
                  button[type=submit] {
                    width: 50%;
                    float: left;
                  }
                  .navbar-form {
                    border: 0;
                  }
                  .form-group {
                    padding: 0;
                    margin: 0;
                  }
                  .form-group input {
                    width: 50%;
                    float: left;
                  }
                }
 
  </style>
	<style>
		.card__thumb {
		flex-shrink: 0;
		width: 50px;
		height: 50px;      
		border-radius: 50%;      
		}
	</style>

</head>
<body>
	<!-- nav bar  -->
		<nav class="navbar" style="margin:0;">
			<div class="containerNav-fluid">
				<!-- Nav Header -->
				<div class="navbar-header">
					<!-- Profile Image -->
				<img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
				width="40" height="40" style="border-radius: 50%;" class="rounded-circle float-left">
				
				 <!-- https://i.imgur.com/sjLMNDM.png a girl with two p -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<!-- <a class="navbar-brand" href="/hi"><span class="fa fa-home"></span><span class="link"> Home</span></a> -->

				<!-- Nav Collapse -->
				<div class="navbar-collapse collapse" id="collapse-1">
					<!-- Nav Left -->
					<ul class="nav navbar-nav">
					
					   <li><a href="{{ route($homeNavbar->route) }}"><span class="fa fa-home"></span><span class="link"> Home</span></a></li>

						<!-- Profile -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="fa fa-user"></span><span class="link"> {{$user->first_name}} {{$user->last_name}}</span> <span class="fa fa-caret-down"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><span class="fa fa-sign-out"></span> Logout</a></li>
								<li><a href="#"><span class="fa fa-tag"></span> Catalogue 2</a></li>
							</ul>
						</li>
						<!-- Services -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="fa fa-gears"></span><span class="link"> Services</span> <span class="fa fa-caret-down"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{route($departmentsIndexNavbar->route)}}"><span class="fa fa-gear"/></span> Departments</a></li>
								<li><a href="/dashboard"><span class="fa fa-gear"/></span> Dashboard</a></li>
								<li><a href="#"><span class="fa fa-gear"/></span> Service 3</a></li>
							</ul>
						</li>
						<!-- About -->
						<li><a href="#"><span class="fa fa-info-circle"></span><span class="link"> About</span></a></li>
						<!-- Contact -->
						<li><a href="#"><span class="fa fa-phone"></span><span class="link"> Contact</span></a></li>
					</ul>
					<!-- Nav Right -->
					<form class="navbar-form navbar-right">
						<div class="form-group">
							<input type="text" class="form-control rounded" style=" border-radius: 15px;" placeholder="Search">
						</div>
						<button type="submit" class="btn"><span class="fa fa-search"></span></button>
					</form>
			
				<!-- Nav Right -->
					<!-- <form class="navbar-form navbar-right">
						<div class="form-group">
							<input type="text" class="form-control rounded" style=" border-radius: 15px;" placeholder="exam_key">
						</div>
						<button type="submit" class="btn"><span class="fa fa-search"></span></button> &nbsp; &nbsp; &nbsp; &nbsp;
					</form> -->
					<!-- Profile Image -->
				

				</div>
				
		</div>
			</div>
		</nav>



    @yield('content')

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>