@extends('app')

@section('content')
    <section id="home" class="sec-main"
             style="height: 890px;background: url('{{asset('/uploads/' . $post->img_path)}}') no-repeat center center;">
        <h1 class="main-heading title">{{$post->title}}</h1>
        <h1 class="main-heading">{{$post->sub_title}}</h1>
    </section>

    <section id="post" class="sec-post">
        <div class="container">
            <h4>{{$post->niceDate()}}</h4>
            {!! $post->content !!}
        </div>
    </section>

    <section id="news" class="sec-news">
        <div class="container">
            <h1>Comments</h1>
            <hr/>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('interface.comment') }}</div>
                    <div class="panel-body">

                        <form enctype="multipart/form-data"
                              role="form"
                              method="POST"
                              accept-charset="utf-8"
                              action="{{ url('/comment/create') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">

                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control"
                                       placeholder="{{ trans('interface.name') }}"
                                       aria-describedby="basic-addon1" name="name"
                                       value="{{old('name')}}">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control"
                                       placeholder="{{ trans('interface.email') }}"
                                       aria-describedby="basic-addon1" name="email"
                                       value="{{old('email')}}">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control"
                                       placeholder="{{ trans('interface.website') }}"
                                       aria-describedby="basic-addon1" name="website"
                                       value="{{old('website')}}">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control"
                                       placeholder="{{ trans('interface.text') }}"
                                       aria-describedby="basic-addon1" name="text"
                                       value="{{old('text')}}">
                            </div>

                            <button type="submit"
                                    class="btn btn-default navbar-btn">{{ trans('interface.comment') }}</button>

                        </form>
                    </div>
                </div>
                @foreach(\App\Comment::getComments($post->id) as $comment)
                    @if(!$comment->isPrincipal())
                        <div class="jumbotron">

                            <h3>{{$comment->name}} <span class="comment-date">{{$comment->niceDate()}}</span></h3>
                            <div class="btn-group btn-group-xs reply" role="group">
                                <button onclick="comment('c_{{$comment->id}}')" type="button" class="btn btn-default">reply</button>
                            </div>
                            <p>{{$comment->text}}</p>

                            <div id="c_{{$comment->id}}" class="panel panel-default comment-hide">
                                <div class="panel-heading">{{ trans('interface.comment') }}</div>
                                <div class="panel-body">

                                    <form enctype="multipart/form-data"
                                          role="form"
                                          method="POST"
                                          accept-charset="utf-8"
                                          action="{{ url('/comment/create') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" class="form-control"
                                                   placeholder="{{ trans('interface.name') }}"
                                                   aria-describedby="basic-addon1" name="name"
                                                   value="{{old('name')}}">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" class="form-control"
                                                   placeholder="{{ trans('interface.email') }}"
                                                   aria-describedby="basic-addon1" name="email"
                                                   value="{{old('email')}}">
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" class="form-control"
                                                   placeholder="{{ trans('interface.website') }}"
                                                   aria-describedby="basic-addon1" name="website"
                                                   value="{{old('website')}}">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" class="form-control"
                                                   placeholder="{{ trans('interface.text') }}"
                                                   aria-describedby="basic-addon1" name="text"
                                                   value="{{old('text')}}">
                                        </div>

                                        <button type="submit"
                                                class="btn btn-default navbar-btn">{{ trans('interface.comment') }}</button>

                                    </form>
                                </div>
                            </div>

                            @foreach($comment->getSubComments() as $sub)
                                <div class="jumbotron sub">
                                    <h3>{{$sub->name}}</h3>
                                    <p>{{$sub->text}}</p>

                                    @foreach($sub->getSubComments() as $sub)
                                        <div class="jumbotron sub">
                                            <h3>{{$sub->name}}</h3>
                                            <p>{{$sub->text}}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
