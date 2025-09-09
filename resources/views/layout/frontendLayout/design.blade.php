<!DOCTYPE html>
<!--
    App by FreeHTML5.co
    Twitter: http://twitter.com/fh5co
    URL: http://freehtml5.co
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/backend-images/logo.png') }}">
    <title>BookVR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
    <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="FreeHTML5.co" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('css/frontend-css/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend-css/css/bootstrap4.min.css') }}">
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('css/frontend-css/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend-css/css/owl.theme.default.min.css') }}">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('css/frontend-css/css/animate.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('css/frontend-css/css/style.css')}}">
</head>
<body>


<div id="page-wrap">
@include('layout.frontendLayout.header')

@yield('content')

@yield('scripts')

@include('layout.frontendLayout.footer')

</div> <!-- main page wrapper -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    
    <script src="{{ asset('js/frontend-js/js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/frontend-js/js/bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/frontend-js/js/main.js') }}"></script>
    <!--random fields JavaScript -->
    <script src="{{ asset('js/backend-js/random_fields.js') }}"></script>
</body>
</html>
