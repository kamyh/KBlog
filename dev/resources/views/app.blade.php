<!DOCTYPE html>
<html class=''>
<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">

    <link rel='stylesheet prefetch' href='//codepen.io/assets/reset/normalize.css'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700'>
    <link rel='stylesheet prefetch' href='//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

</head>
<body>

<div class="wrapper">
    <header role="header">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
                            data-target=".navbar-collapse" role="button">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">Home</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right js-nav">
                        <li><a href="#footer">About</a></li>
                        <li><a href="#post">Posts</a></li>
                        <li><a href="#news">News</a></li>
                        <li><a href="#divers">Divers</a></li>
                        <li><a href="#contact">Contact</a></li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section id="home" class="sec-main">
        <h1 class="main-heading title">Coming Soon</h1>
        <h1 class="main-heading">What we can do.</h1>
    </section>

    @yield('content')

    <section id="divers" class="sec-divers">
        <div class="container">
            <h1>Divers</h1>
            <hr/>
            <div class="row">
                <div class="col-sm-4">
                    <p class="text-center">"Alex did great job when designing our website. It was pleasure to work
                        with him and I'm sure we will hire him again."</p>
                    <p class="text-right">&mdash; Marc Andressen</p>
                </div>
                <div class="col-sm-4">
                    <p class="text-center">"Alex proved to be truly creative designer who is able to create just
                        stunning design I immediately fell in love with!"</p>
                    <p class="text-right">&mdash; Emily Cooper</p>
                </div>
                <div class="col-sm-4">
                    <p class="text-center">"I have worked with several different people and it always seemed like a
                        pain—luckily I found Alex Devero. Thank you Alex!"</p>
                    <p class="text-right">&mdash; Scott Grubber</p>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="sec-contact">
        <div class="container">
            <h1>Contact me</h1>
            <hr/>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <form class="center-block" action="#" method="post">
                        <div class="form-group">
                            <label class="sr-only" for="inputName">Full name</label>
                            <input id="inputName" class="form-control" type="text" placeholder="Adam Smith"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="inputMail" class="sr-only">Email Address</label>
                            <input id="inputMail" class="form-control" type="email"
                                   placeholder="adam.smith@mail.com" required/>
                        </div>
                        <div class="form-group">
                            <label for="inputMessage" class="sr-only">Your Message</label>
                                <textarea id="inputMessage" class="form-control" name="message" cols="30" rows="8"
                                          required></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default center-block" type="submit" value="Hire me">Contact
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <ul class="soc-media-ul">
                <li><a href="http://twitter.com/" class="fa fa-2x fa-twitter" target="_blank"></a></li>
                <li><a href="http://linkedin.com/" class="fa fa-2x fa-linkedin"
                       target="_blank"></a></li>
                <li><a href="https://github.com/kamyh" class="fa fa-2x fa-github" target="_blank"></a></li>
                <li><a href="mailto:deruazvincent@gmail.com" class="fa fa-2x fa-envelope"></a></li>
            </ul>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script language="JavaScript" src="{{ URL::asset('/') }}js/index.js"></script>

</div>
