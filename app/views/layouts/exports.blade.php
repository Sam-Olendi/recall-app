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

    <style>
      body {
        padding-top: 50px;
        font-family: sans-serif;
        color: #222;
      }
        table {
            border-collapse: collapse;
            font-weight: lighter;
            width: 100%;
            margin-bottom: 30px;
        }

        /*table, th, td {
            border: 1px solid black;
        }*/

        thead {
            background-color: #1F282F;
            color: #fff;
        }

        th {
            text-align: left;
            height: 40px;
            padding-left: 10px;
            font-weight: normal;
        }

        td {
            height: 40px;
            border-bottom: 1px solid #ddd;
            padding-left: 10px;
        }

      .page-title {
        /*text-align: center;*/
        color: #3EC8D5;
        margin-bottom: 0;
      }

      .page-subtitle {
        /*text-align: center;*/
        margin-top: 0;
        font-style: italic;
        color: #909090;
      }

      .report-title {
        /*text-align: center;*/
      }

      .section-title {
        font-style: italic;
        margin-bottom: 0;
      }

      .section-subtitle {
        color: #666;
        margin-top: 0;
        font-size: 12px;
        font-style: italic;
      }

    </style>
    
</head>

<body>
	<!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <h1 class="page-title">Recall Learning Application</h1>
    <p class="page-subtitle">Performance Report</p> 

    <h2 class="report-title">@yield('title')</h2>


    <!--Main Page-->
    @yield('content')
    <!--/Main Page-->



</body>
</html>