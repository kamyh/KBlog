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

    <section id="messages">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('interface.upload') }}</div>
                        <div class="panel-body">

                            <form enctype="multipart/form-data"
                                  role="form"
                                  method="POST"
                                  accept-charset="utf-8"
                                  action="{{ url('/images') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                    </span>
                                    <input onchange="readURL(this)" class="form-control" type="file" id="illustration"
                                           name="illustration">
                                    <img class="thumbnail-prev" id="prev" src="http://placehold.it/400x300"
                                         alt="image preview"/>
                                </div>

                                <button type="submit"
                                        class="btn btn-default navbar-btn">{{ trans('interface.upload') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="sec-gallery">
        <div class="container">

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('interface.gallery') }}</div>
                    <div class="panel-body">

                        @foreach($images as $image)
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="#">
                                    <img class="img-responsive" src="{{asset('/uploads/gallery/' . $image)}}" alt="">

                                <form enctype="multipart/form-data"
                                      role="form"
                                      method="POST"
                                      accept-charset="utf-8"
                                      action="{{ url('/images/delete') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="path" value="{{ './uploads/gallery/' . $image }}">

                                    <button type="submit"
                                            class="btn btn-default navbar-btn">{{ trans('interface.delete') }}</button>
                                </form>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
