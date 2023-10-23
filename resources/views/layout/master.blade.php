<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="Shortcut icon" href="{{asset('images/om.png')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

@include('layout.nav')

@yield('content')

    <script src="<?php echo URL_ROOT . 'assets/js/app.js' ?>"></script>
    <script src="<?php echo URL_ROOT . 'assets/js/query.js' ?>"></script>
    <script src="<?php echo URL_ROOT . 'assets/js/custom.js' ?>"></script>
    
    @yield("script")
    
    <script src="{{asset('js/boot_bundle.js')}}"></script>
    <script src="{{asset('js/tether.min.js')}}"></script>

</body>
</html>