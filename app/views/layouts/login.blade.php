<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Recall: Learning Application</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">


        <script src="{{ asset('assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!--Main section-->
        <div class="landing">
            <div class="container">
                <a href="/" class="btn btn-go btn-back"> <i class="fa fa-angle-left"></i> Go Back Home</a>
                <h1> @yield('heading') </h1>
                @yield('alerts')
                <p class="subtitle">Simplifying the learning process</p>

                @if(Session::has('flash_message'))
                    <div class="flash-message">
                        <p> {{ Session::get('flash_message') }} </p>
                    </div>
                @endif

                @if(Session::has('success_message'))
                    <div class="success-message">
                        <p> {{ Session::get('success_message') }} </p>
                    </div>
                @endif

                <div class="login-box">
                    <h3>@yield('purpose')</h3>
                    @yield('form')
                </div>

            </div>
        </div>
        <!--/Main section-->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

        <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>

    </body>
</html>
