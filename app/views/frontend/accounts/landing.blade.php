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

        <script src="{{ asset('assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!--Main section-->
        <div class="landing">
            <div class="container">
                <h1>Recall Learner</h1>
                <p class="subtitle">Simplifying the learning process</p>

                <div class="login">
                    <p>Do you have an account?</p>
                    <a href="/learner/login" class="btn btn-go btn-lg"><span class="glyphicon glyphicon-log"></span> Log in</a>
                </div>

                <div class="register">
                    <p>Register for an account</p>
                    <a href="/learner/register" class="btn btn-default"><span class="glyphicon glyphicon-log"></span> Register</a>
                </div>

                <!-- <div class="continue">
                    <p>Continue without an account?</p>
                    <a href="/learner/classroom" class="btn btn-default"><span class="glyphicon glyphicon-log"></span> Continue without account</a>
                </div> -->
            </div>
        </div>
        <!--/Main section-->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

        <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>

    </body>
</html>
