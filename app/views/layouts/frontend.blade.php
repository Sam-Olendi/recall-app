<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Recall - Children's Learning Application</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <style>
      body {
        padding-top: 50px;
      }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <script src="{{ asset('assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
    
</head>

<body>
	<!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!--Navigation-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      	<div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="/learner/classroom">Recall</a>
	        </div><!--/.navbar-header-->
	        <div id="navbar" class="navbar-collapse collapse">
	           <ul class="nav navbar-nav navbar-right">
	               <li><a href="/learner/classroom"><i class="fa fa-pencil"></i> Classroom</a></li>
	               <li><a href="/learner/library"><i class="fa fa-book"></i> Library</a></li>
	               <li class="dark-nav"><a href="#"><i class="fa fa-user"></i> Hello, {{ Auth::user()->first_name }}</a></li>
	               <li class="dark-nav"><a href="/learner/logout"><i class="fa fa-sign-out"></i> Log out</a></li>
	            </ul>
	        </div><!--/.navbar-collapse -->
        </div><!--/.container-->
    </nav>
    <!--/Navigation-->

    <!--Main Page-->
    @yield('content')
    <!--/Main Page-->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>