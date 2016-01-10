@extends('app')

@section('content')

    <section id="news" class="sec-news">
        <div class="container">
            <h1>News</h1>
            <hr/>
            <div class="row">
                <div class="col-md-4"><img class="center-block"
                                           src="//c2.staticflickr.com/2/1688/23624251554_7a64ff2a09_h.jpg"
                                           alt="Posli layout"/></div>
                <div class="col-md-4"><img class="center-block"
                                           src="//c2.staticflickr.com/2/1688/23624251554_7a64ff2a09_h.jpg"
                                           alt="Off-road Park"/></div>
                <div class="col-md-4"><img class="center-block"
                                           src="//c2.staticflickr.com/2/1688/23624251554_7a64ff2a09_h.jpg"
                                           alt="Crossfit stars"/></div>
            </div>
            <div class="row">
                <div class="col-md-4"><img class="center-block"
                                           src="//c2.staticflickr.com/2/1688/23624251554_7a64ff2a09_h.jpg"
                                           alt="Green lotus yoga"/></div>
                <div class="col-md-4"><img class="center-block"
                                           src="//c2.staticflickr.com/2/1688/23624251554_7a64ff2a09_h.jpg"
                                           alt="TeplateStorm"/></div>
                <div class="col-md-4"><img class="center-block"
                                           src="//c2.staticflickr.com/2/1688/23624251554_7a64ff2a09_h.jpg"
                                           alt="Asperion"/></div>
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
                    <input type="submit" value="Read More">
                </div>
            </div>
        </section>
    @endforeach
@endsection
