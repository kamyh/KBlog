@extends('app')

@section('assets')

    <link href="{{ asset('/css/form.css') }}" rel="stylesheet">

@endsection

@section('content')
    <section class="sec-register">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('interface.register') }}</div>
                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> {{ trans('interface.issue') }}<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            @if(Config::get('app.registering'))
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ url('/auth/register') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('interface.name') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('interface.email') }}</label>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" name="email"
                                                   value="{{ old('email') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('interface.password') }}</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('interface.confirm_password') }}</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ trans('interface.register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <h3>{{ trans('interface.register_off') }}</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
