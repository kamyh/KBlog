@extends('app')

@section('content')
    <section id="home" class="sec-main">
        <h1 class="main-heading title">{{ Config::get('app.blog_title')}}</h1>
        <h1 class="main-heading">{{ Config::get('app.blog_slogant')}}</h1>
    </section>

    <section id="news" class="sec-news">
        <div class="container">
            <h1>News</h1>
            <hr/>
            <div class="row">
                @foreach(\App\Post::news() as $news)
                    <div class="col-md-4">
                        <div class="image-news">
                            <img src="{{asset('/uploads/' . $news->img_path)}}">
                            <a href="{{url('post/' . $news->id)}}">
                                <div class="overlay">
                                    <span>{{$news->title}}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @foreach($posts as $number => $post)
        <section id="post" class="@if($number%2 == 1)sec-post-2 @else sec-post-1 @endif">
            <div class="container">
                <h1>{{$post->title}}</h1>
                <h2>{{$post->sub_title}}</h2>
                <hr/>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <img class="center-block"
                             src="{{asset('/uploads/' . $post->img_path)}}"
                             alt="Posli layout"/>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3">
                        <p>{!!$post->preview!!}</p>
                    </div>
                    <input type="submit" value="Read More" onclick="window.location='{{url('/post/' . $post->id) }}'">
                    <span>{{$post->published_at}}</span>
                </div>

                <a href="{{url('category/' . $post->getCategory()->name)}}" role="button"><span class="tag"><i class="fa fa-tag"></i> {{$post->getCategory()->name}}</span></a>
                <span class="extra-post-infos">{{$post->getNumberOfComments()}} {{ trans('interface.comments') }} || </span>
            </div>

        </section>
    @endforeach

    <section>
        <div class="container">
            <nav>
                <ul class="pager">
                    @if(!isset($category))
                        @if($page > 1)
                            <li class="previous"><a href="{{url('page/' . ($page - 1))}}"><span
                                            aria-hidden="true">&larr;</span> {{ trans('interface.newer') }}</a></li>
                        @endif
                        @if($morePage)
                            <li class="next"><a href="{{url('page/' . ($page + 1))}}">{{ trans('interface.older') }}
                                    <span
                                            aria-hidden="true">&rarr;</span></a></li>
                        @endif
                    @else
                        @if($page > 1)
                            <li class="previous"><a href="{{url('category/'. $category .'/page/' . ($page - 1))}}"><span
                                            aria-hidden="true">&larr;</span> {{ trans('interface.newer') }}</a></li>
                        @endif
                        @if($morePage)
                            <li class="next"><a href="{{url('category/'. $category .'/page/' . ($page + 1))}}">{{ trans('interface.older') }}
                                    <span
                                            aria-hidden="true">&rarr;</span></a></li>
                        @endif
                    @endif
                </ul>
            </nav>
        </div>
    </section>
@endsection
