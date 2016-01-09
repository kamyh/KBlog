@extends('app')

@section('assets')

    <link href="{{ asset('/css/form.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="container-fluid">
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
                            <div class="username">
                                <label class="col-md-4 control-label">{{ trans('interface.email') }}</label>
                                <div class="col-md-6">
                                    <input class="big" type="email" name="email" placeholder="USERNAME">
                                </div>
                            </div>

                            <div class="password">
                                <label class="col-md-4 control-label">{{ trans('interface.password') }}</label>
                                <div class="col-md-6">
                                    <input class="big" type="password" class="form-control" name="password" placeholder="PASSWORD">
                                </div>
                            </div>

                            <div class="login">
                                <button type="submit" class="login-btn">{{ trans('interface.login') }}</button>


                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> {{ trans('interface.remember') }}
                                    </label>
                                </div>

                                <a class="btn btn-link" href="{{ url('/password/email') }}">{{ trans('interface.forgot_password') }}</a>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
