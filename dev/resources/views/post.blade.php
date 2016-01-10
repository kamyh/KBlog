@extends('app')

@section('content')
    <section id="home" class="sec-main" style="height: 890px;background: url('{{asset('/uploads/' . $post->img_path)}}') no-repeat center center;">
        <h1 class="main-heading title">{{$post->title}}</h1>
        <h1 class="main-heading">{{$post->sub_title}}</h1>
    </section>

    <section id="post" class="sec-post">
        <div class="container">
            <h4>{{$post->niceDate()}}</h4>
            {!! $post->content !!}
        </div>
    </section>
@endsection
