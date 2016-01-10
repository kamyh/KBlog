@extends('app')

@section('assets')

    <link href="{{ asset('/css/form.css') }}" rel="stylesheet">

@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('interface.login') }}</div>
                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form">

                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">@</span>
                                        <input type="text" class="form-control"
                                               placeholder="{{ trans('interface.email') }}"
                                               aria-describedby="basic-addon1" type="email" name="email">
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><span
                                                    class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>
                                        <input type="text" class="form-control"
                                               placeholder="{{ trans('interface.password') }}"
                                               aria-describedby="basic-addon1" type="password" name="password">
                                    </div>

                                    <div class="input-group">
                                        <button type="submit"
                                                class="btn btn-default navbar-btn">{{ trans('interface.login') }}</button>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"
                                                       name="remember"> {{ trans('interface.remember') }}
                                            </label>
                                        </div>

                                        <a class="btn btn-link"
                                           href="{{ url('/password/email') }}">{{ trans('interface.forgot_password') }}</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
