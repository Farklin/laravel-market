<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title') </title>
    
    <link rel="stylesheet" href="{{ asset('static/font_awesome/css/all.css') }}">
    <link href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('static/bootstrap/css/mdb.css') }}" rel="stylesheet">
    <link href="{{ asset('static/bootstrap/css/style.css') }}" rel="stylesheet">
    


</head>
<body>

    @yield('content')


    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}"></script>

    <script src="{{ asset('bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('bootstrap/js/mdb.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

</body>
</html>