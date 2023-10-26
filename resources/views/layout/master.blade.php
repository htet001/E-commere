<!DOCTYPE html>
<html lang="en">
<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="Shortcut icon" href="{{asset('images/om.png')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: black;">
    <main>
        @include('layout.nav')

        @yield('content')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="<?php echo URL_ROOT . 'assets/js/app.js' ?>"></script>
        <script src="<?php echo URL_ROOT . 'assets/js/query.js' ?>"></script>
        <script src="<?php echo URL_ROOT . 'assets/js/custom.js' ?>"></script>
        <script src="<?php echo URL_ROOT . 'assets/js/boot_bundle.js' ?>"></script>
        <script src="<?php echo URL_ROOT . 'assets/js/tether.min.js' ?>"></script>
        @yield("script")

    </main>
</body>
<footer>
    @include('layout.footer')
</footer>


</html>