<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Base</title>

	<link href="{{ asset('/css/menu.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        @yield('assets')

</head>
<body>
<nav class="menu">
    <ul class="menu">
        <li><a href="#">Honme</a></li>
        <li><a href="/auth/login">login</a></li>
        <li><a href="/auth/register">register</a></li>
        <li><a href="/auth/logout">logout</a></li>
        <li><a href="#">menu</a></li>
        <li><a href="#">menu</a></li>
    </ul>
    <a href="#" id="pull">Menu</a>
</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script language="JavaScript" src="{{ URL::asset('/') }}js/index.js"></script>
</body>
</html>
