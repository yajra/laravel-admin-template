@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.forgot_password') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="container">
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">{{{ Lang::get('user/user.forgot_password') }}}</div>
				<div style="float:right; font-size: 80%; position: relative; top:-20px">
					<a href="{{ URL::to('users/login') }}" class="btn btn-danger btn-xs">Back to Login</a>
				</div>
			</div>

			<div style="padding-top:30px" class="panel-body" >
				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
				{{ Form::open(['url'=>'users/forgot_password','class'=>'form-horizontal']) }}

				<div style="margin-bottom: 25px" class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input class="form-control" placeholder="Email" type="text" name="email" id="email" value="">
					<span class="input-group-btn">
						<input class="btn btn-default" type="submit" value="Continue">
					</span>
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop
