<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">


    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">

    <title>{{ Config::get('app.blog_title')}}</title>

    <link rel='stylesheet prefetch' href='//codepen.io/assets/reset/normalize.css'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700'>
    <link rel='stylesheet prefetch' href='//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
</head>
<body>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5&appId=1530260103921247";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

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
                    <a href="{{url('/')}}" class="navbar-brand">{{ trans('interface.home') }}</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right js-nav">
                        <li><a class="menu" href="#footer">{{ trans('interface.about') }}</a></li>
                        <li><a class="menu" href="#post">{{ trans('interface.posts') }}</a></li>
                        <li><a class="menu" href="#news">{{ trans('interface.news') }}</a></li>
                        <li><a class="menu" href="#category">{{ trans('interface.categories') }}</a></li>
                        <li><a class="menu" href="#contact">{{ trans('interface.contact') }}</a></li>
                        <li>
                            <select id="langSelector" onchange="languageChange('{{url('language/')}}/');" class="menu">
                                @foreach(Config::get('app.languages') as $lang => $langStr)
                                    <option value="{{$lang}}"
                                            @if(Lang::getLocale() == $lang) selected @endif>{{$langStr}}</option>
                                @endforeach
                            </select>
                        </li>
                        @if(Auth::check())
                            <li><a href="{{url('/auth/logout')}}">{{ trans('interface.logout') }}</a></li>
                            <li><a href="{{url('/home')}}">{{ trans('interface.admin') }}</a></li>
                            <li><a href="{{url('/images')}}">{{ trans('interface.gallery') }}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    @yield('content')

    <section id="category" class="sec-category">
        <div class="container">
            <h1>{{ trans('interface.categories') }}</h1>
            <hr/>
            <div class="row">

                @foreach(\App\Category::getCategories() as $key => $value)
                    <div class="col-xs-6 col-md-3">
                        <p>
                            <a class="btn btn-primary btn-lg" href="{{url('category/' . $key)}}" role="button">
                                {{$key}} <span class="badge">{{$value}}</span>
                            </a>
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section id="contact" class="sec-contact">
        <div class="container">
            <h1>Contact me</h1>
            <hr/>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <form enctype="multipart/form-data"
                          role="form"
                          method="POST"
                          accept-charset="utf-8"
                          action="{{ url('/contact') }}">
                        <div class="form-group">
                            <label class="sr-only" for="inputName">{{ trans('interface.name') }}</label>
                            <input name="name" id="inputName" class="form-control" type="text"
                                   placeholder="Paquito Guzman"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="inputMail" class="sr-only">{{ trans('interface.email') }}</label>
                            <input name="email" id="inputMail" class="form-control" type="email"
                                   placeholder="paquito.guzman@mail.com" required/>
                        </div>
                        <div class="form-group">
                            <label for="inputMessage" class="sr-only">{{ trans('interface.yourMessage') }}</label>
                                <textarea id="inputMessage" class="form-control" name="message" cols="30" rows="8"
                                          required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-default center-block btn-clean" type="submit">{{ trans('interface.contact') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <div class="subject">
                Blog Subject
            </div>
            <ul class="soc-media-ul">
                <li><a href="{{ Config::get('app.twitter')}}" class="fa fa-2x fa-twitter" target="_blank"></a></li>
                <li><a href="{{ Config::get('app.linkedin')}}" class="fa fa-2x fa-linkedin"
                       target="_blank"></a></li>
                <li><a href="{{ Config::get('app.github')}}" class="fa fa-2x fa-github" target="_blank"></a></li>
                <li><a href="mailto:{{ Config::get('app.email')}}" class="fa fa-2x fa-envelope"></a></li>
                <li><a href="{{url('feed/' . Lang::getLocale())}}" class="fa fa-2x fa-rss"></a></li>
            </ul>

        </div>
        <a href="https://github.com/kamyh/KBlog"><span>KBlog - {{ Config::get('app.version')}}</span></a>
        <a href="{{url('auth/login')}}"><span>{{ trans('interface.login') }}</span></a>
    </footer>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script language="JavaScript" src="{{ URL::asset('/') }}js/index.js"></script>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor-content');
    </script>
</div>
