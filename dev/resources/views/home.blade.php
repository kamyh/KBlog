@extends('app')

@section('content')

    <section id="messages">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('interface.messages') }}</div>

                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger error-update">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(isset($post))
        <section id="edition">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ trans('interface.edit') }}</div>
                            <div class="panel-body">

                                <form enctype="multipart/form-data"
                                      role="form"
                                      method="POST"
                                      accept-charset="utf-8"
                                      action="{{ url('/post/save') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ $post->id }}">

                                    <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                        <input type="text" class="form-control"
                                               placeholder="{{ trans('interface.title') }}"
                                               aria-describedby="basic-addon1" name="title"
                                               value="{{$post->title}}">
                                    </div>

                                    <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                        <input type="text" class="form-control"
                                               placeholder="{{ trans('interface.subTitle') }}"
                                               aria-describedby="basic-addon1" name="subTitle"
                                               value="{{$post->sub_title}}">
                                    </div>

                                    <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                        <input type="text" class="form-control"
                                               placeholder="{{ trans('interface.category') }}"
                                               aria-describedby="basic-addon1" name="category"
                                               value="{{$post->getCategory()->name}}">
                                    </div>

                                    <div class="input-group">
                                        <select id="lang" name="lang">
                                            <option value="0" @if($post->lang == 0) selected @endif>{{ trans('interface.french') }}</option>
                                            <option value="1" @if($post->lang == 1) selected @endif>{{ trans('interface.english') }}</option>
                                        </select>
                                    </div>

                                    <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                <textarea class="form-control" rows="5" id="comment"
                                          placeholder="{{ trans('interface.preview') }}" name="preview">{{$post->preview}}</textarea>
                                    </div>

                                    <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                <textarea class="form-control" rows="5" id="editor-content" name="editor-content"
                                          placeholder="{{ trans('interface.content') }}">{!! $post->content !!}</textarea>
                                    </div>

                                    <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                        <input class="form-control" type="file" id="editor-content" name="illustration"
                                               placeholder="{{ trans('interface.content') }}">
                                    </div>

                                    <button type="submit"
                                            class="btn btn-default navbar-btn">{{ trans('interface.save') }}</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section id="creation">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ trans('interface.create') }}</div>
                            <div class="panel-body">

                                <form enctype="multipart/form-data"
                                      role="form"
                                      method="POST"
                                      accept-charset="utf-8"
                                      action="{{ url('/post/create') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                        <input type="text" class="form-control"
                                               placeholder="{{ trans('interface.title') }}"
                                               aria-describedby="basic-addon1" name="title"
                                               value="{{old('title')}}">
                                    </div>

                                    <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                        <input type="text" class="form-control"
                                               placeholder="{{ trans('interface.subTitle') }}"
                                               aria-describedby="basic-addon1" name="subTitle"
                                               value="{{old('subTitle')}}">
                                    </div>

                                    <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                        <input type="text" class="form-control"
                                               placeholder="{{ trans('interface.category') }}"
                                               aria-describedby="basic-addon1" name="category">
                                    </div>

                                    <div class="input-group">
                                        <select id="lang" name="lang">
                                            <option value="0">{{ trans('interface.french') }}</option>
                                            <option value="1">{{ trans('interface.english') }}</option>
                                        </select>
                                    </div>

                                    <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                <textarea class="form-control" rows="5" id="comment"
                                          placeholder="{{ trans('interface.preview') }}"
                                          name="preview">{{old('preview')}}</textarea>
                                    </div>

                                    <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                <textarea class="form-control" rows="5" id="editor-content" name="editor-content"
                                          placeholder="{{ trans('interface.content') }}">{{old('editor-content')}}</textarea>
                                    </div>

                                    <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                        <input class="form-control" type="file" id="editor-content" name="illustration"
                                               placeholder="{{ trans('interface.content') }}"
                                               value="{{old('content')}}">
                                    </div>

                                    <button type="submit"
                                            class="btn btn-default navbar-btn">{{ trans('interface.create') }}</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('interface.posts') }}</div>
                        <div class="panel-body">
                            @foreach(\App\Post::getAll(0) as $post)

                                <nav class="navbar navbar-default">
                                    <div class="container-fluid">
                                        <div class="navbar-header">
                                            <p class="navbar-text">{{$post->title}}</p>
                                            <form enctype="multipart/form-data"
                                                  role="form"
                                                  method="POST"
                                                  accept-charset="utf-8"
                                                  action="{{ url('/post/publish/' . $post->id) }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit"
                                                        class="btn btn-default navbar-btn">@if($post->published) {{ trans('interface.unpublished') }} @else {{ trans('interface.published') }} @endif</button>
                                            </form>

                                            <form enctype="multipart/form-data"
                                                  role="form"
                                                  method="POST"
                                                  accept-charset="utf-8"
                                                  action="{{ url('/post/edit/'.$post->id) }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit"
                                                        class="btn btn-default navbar-btn">{{ trans('interface.edit') }}</button>
                                            </form>

                                            <form enctype="multipart/form-data"
                                                  role="form"
                                                  method="POST"
                                                  accept-charset="utf-8"
                                                  action="{{ url('/post/delete/' . $post->id) }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit"
                                                        class="btn btn-default navbar-btn">{{ trans('interface.delete') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </nav>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
