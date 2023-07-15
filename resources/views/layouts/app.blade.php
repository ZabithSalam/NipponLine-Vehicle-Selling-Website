<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="img/png" href="/img/favicon.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
        html {
      height: 100%;
    }
    body {
      padding-top: 50px;
      padding-bottom: 40px;
      background: #ffffff;
      background: radial-gradient(ellipse at center, #ffffff 0%, #c1c1c1 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#c1c1c1', GradientType=1); /* IE6-9 fallback on horizontal gradient */
    }
    
    .form-signin {
      max-width: 330px;
      padding: 14px;
      margin: 0 auto;
      background-color: rgba(230,230,230, .5);
      box-shadow: 0 0 20px rgba(0,0,0, .6);
      border-radius: 6px;
      border: 1px solid #ddd;
      
      img {
        float:left;
        height: 48px;
        margin-bottom: 14px; margin-right: 14px;
        border-radius: 6px;
      }
      h1 {
        font-size: 18px; font-weight: bold;
        margin-top: 4px; margin-bottom: 8px;
      }
      h2 {
        font-size: 12px; font-weight: bold;
        margin-top: 0; margin-bottom: 10px;
      }
      .links { margin-top: 10px; a { color: #444; } }
      .checkbox {
        margin-bottom: 10px;
        font-weight: normal;
        text-align: left;
        padding-left: 12px;
      }
      .form-control {
        position: relative;
        height: auto;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
      }
      .form-control:focus {
        z-index: 2;
      }
      input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    }
    
    </style>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
    
        <main class="py-4">
            @yield('content')
        </main>
</body>
</html>
