<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">

    <title>Menu responsive</title>

    <link href="{{ asset('/css/menu.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>


</head>

<body>

<nav class="menu">
    <ul class="menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">How-to</a></li>
        <li><a href="#">Icons</a></li>
        <li><a href="#">Design</a></li>
        <li><a href="#">Web 2.0</a></li>
        <li><a href="#">Tools</a></li>
    </ul>
    <a href="#" id="pull">Menu</a>
</nav>

@yield('content')

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>


</body>
</html>
