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
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>


</head>
<body>
    @include('layouts/header')
    @yield('content')
    @include('layouts/footer')
    <style> 
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");
        
        body {
            background-color: #eee;
            font-family: "Poppins", sans-serif
        }
        
        .card {
            background-color: #fff;
            padding: 14px;
            border: none
        }
        
        .demo {
            width: 100%
        }
        
        ul {
            list-style: none outside none;
            padding-left: 0;
            margin-bottom: 0
        }
        
        li {
            display: block;
            float: left;
            margin-right: 6px;
            cursor: pointer
        }
        
        img {
            display: block;
            height: auto;
            width: 100%
        }
        
        .stars i {
            color: #f6d151
        }
        
        .stars span {
            font-size: 13px
        }
        
        hr {
            color: #d4d4d4
        }
        
        .badge {
            padding: 5px !important;
            padding-bottom: 6px !important
        }
        
        .badge i {
            font-size: 10px
        }
        
        .profile-image {
            width: 35px
        }
        
        .comment-ratings i {
            font-size: 13px
        }
        
        .username {
            font-size: 12px
        }
        
        .comment-profile {
            line-height: 17px
        }
        
        .date span {
            font-size: 12px
        }
        
        .p-ratings i {
            color: #f6d151;
            font-size: 12px
        }
        
        .btn-long {
            padding-left: 35px;
            padding-right: 35px
        }
        
        .buttons {
            margin-top: 15px
        }
        
        .buttons .btn {
            height: 46px
        }
        
        .buttons .cart {
            border-color: #ff7676;
            color: #ff7676
        }
        
        .buttons .cart:hover {
            background-color: #e86464 !important;
            color: #fff
        }
        
        .buttons .buy {
            color: #fff;
            background-color: #ff7676;
            border-color: #ff7676
        }
        
        .buttons .buy:focus,
        .buy:active {
            color: #fff;
            background-color: #ff7676;
            border-color: #ff7676;
            box-shadow: none
        }
        
        .buttons .buy:hover {
            color: #fff;
            background-color: #e86464;
            border-color: #e86464
        }
        
        .buttons .wishlist {
            background-color: #fff;
            border-color: #ff7676
        }
        
        .buttons .wishlist:hover {
            background-color: #e86464;
            border-color: #e86464;
            color: #fff
        }
        
        .buttons .wishlist:hover i {
            color: #fff
        }
        
        .buttons .wishlist i {
            color: #ff7676
        }
        
        .comment-ratings i {
            color: #f6d151
        }
        
        .followers {
            font-size: 9px;
            color: #d6d4d4
        }
        
        .store-image {
            width: 42px
        }
        
        .dot {
            height: 10px;
            width: 10px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px
        }
        
        .bullet-text {
            font-size: 12px
        }
        
        .my-color {
            margin-top: 10px;
            margin-bottom: 10px
        }
        
        label.radio {
            cursor: pointer
        }
        
        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }
        
        label.radio span {
            border: 2px solid #8f37aa;
            display: inline-block;
            color: #8f37aa;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            text-transform: uppercase;
            transition: 0.5s all
        }
        
        label.radio .red {
            background-color: red;
            border-color: red
        }
        
        label.radio .blue {
            background-color: blue;
            border-color: blue
        }
        
        label.radio .green {
            background-color: green;
            border-color: green
        }
        
        label.radio .orange {
            background-color: orange;
            border-color: orange
        }
        
        label.radio input:checked+span {
            color: #fff;
            position: relative
        }
        
        label.radio input:checked+span::before {
            opacity: 1;
            content: '\2713';
            position: absolute;
            font-size: 13px;
            font-weight: bold;
            left: 4px
        }
        
        .card-body {
            padding: 0.3rem 0.3rem 0.2rem
        }
    </style>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}"></script>

    <script src="{{ asset('bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('bootstrap/js/mdb.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

</body>
</html>