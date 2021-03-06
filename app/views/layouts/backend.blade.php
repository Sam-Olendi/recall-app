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

        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">


        <script src="{{ asset('assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/chart.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/masonry.pkgd.min.js') }}"></script>


    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="wrapper">
            <!--Navigation-->
            <nav class="navbar navbar-inverse navbar-inverse-admin navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand navbar-brand-admin" href="/teacher/dashboard">Recall: Teacher</a>
                </div><!--/.navbar-header-->
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        {{-- <li class=""> <a href="/learner/classroom"> View classroom </a> </li> --}}
                        <li class=""><a href="/teacher/profile"><span class="glyphicon glyphicon-user"></span> Hello, {{ Auth::user()->first_name }}</a></li>
                        <li class=""><a href="/teacher/logout"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                    </ul>
                </div><!--/.navbar-collapse -->

                <!--Sidebar Menu-->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="/teacher/dashboard"><span class="fa fa-bar-chart icon"></span><br> Performance <br> Reports</a>
                        </li>
                        <li>
                            <a href="/teacher/mysubjects"><span class="fa fa-bookmark icon"></span><br> My Subjects</a>
                        </li>
                        <li>
                            <a href="/teacher/myexercises"><span class="fa fa-pencil icon"></span><br> My Exercises</a>
                        </li>
                        <li>
                            <a href="/teacher/mybooks"><span class="fa fa-book icon"></span><br> Books</a>
                        </li>
                        <li>
                            <a href="/teacher/mylearners"><span class="fa fa-child icon"></span><br> My Learners</a>
                        </li>
                        {{-- <li>
                            <a href="/teacher/mystudents"><span class="glyphicon glyphicon-book icon"></span><br> Learner <br> Accounts</a>
                        </li> --}}
                    </ul>
                </div>
                <!--/Sidebar Menu-->
            </nav>
            <!--/Navigation-->

            <!--Main Page-->
            <div id="page-wrapper">
                <div class="container-fluid">

                    <h3 class="backend-heading">
                    @yield('heading')
                    </h3>

                    @yield('content')

                </div>
            </div>
            <!--/Main Page-->
        </div>
     
 
        <script src=" {{ asset('assets/js/vendor/jquery-1.11.1.min.js') }} "></script>
        <script src=" {{ asset('assets/js/vendor/highcharts.js') }} "></script>
        <script>window.jQuery || document.write('<script src="{{ asset('assets/js/vendor/jquery-1.11.1.min.js') }}"><\/script>')</script>

        <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>

        <script src="{{ asset('assets/js/main.js') }}"></script>


    </body>
</html>
