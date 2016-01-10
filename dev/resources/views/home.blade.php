@extends('app')

@section('content')

    <section id="messages">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('interface.messages') }}</div>

                        <div class="panel-body">
                            {{ trans('interface.loginSuccess') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="edition">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('interface.createEdit') }}</div>
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
                                    <input type="text" class="form-control" placeholder="{{ trans('interface.title') }}"
                                           aria-describedby="basic-addon1" name="title">
                                </div>

                                <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                    <input type="text" class="form-control"
                                           placeholder="{{ trans('interface.subTitle') }}"
                                           aria-describedby="basic-addon1" name="subTitle">
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
                                          placeholder="{{ trans('interface.preview') }}" name="preview"></textarea>
                                </div>

                                <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                <textarea class="form-control" rows="5" id="editor-content" name="editor-content"
                                          placeholder="{{ trans('interface.content') }}"></textarea>
                                </div>

                                <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                <input class="form-control" type="file" id="editor-content" name="illustration"
                                          placeholder="{{ trans('interface.content') }}">
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

    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('interface.posts') }}</div>
                        <div class="panel-body">
                            <nav class="navbar navbar-default">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <p class="navbar-text">Signed in as Mark Otto</p>
                                        <button type="button"
                                                class="btn btn-default navbar-btn">{{ trans('interface.published') }}</button>
                                        <button type="button"
                                                class="btn btn-default navbar-btn">{{ trans('interface.unpublished') }}</button>
                                        <button type="button"
                                                class="btn btn-default navbar-btn">{{ trans('interface.edit') }}</button>
                                        <button type="button"
                                                class="btn btn-default navbar-btn">{{ trans('interface.delete') }}</button>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
