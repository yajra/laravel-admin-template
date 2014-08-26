@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div id="signupbox" style="margin-top: 50px;" class="mainbox col-md-10 col-md-offset-1">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">Sign Up</div>
			<div style="float:right; font-size: 85%; position: relative; top:-20px">
				<a class="btn btn-danger btn-xs" href="{{ url('users/login') }}">Sign In</a>
			</div>
		</div>
		<div class="panel-body">
			{{ Form::open(['url'=>'users','class'=>'form-horizontal']) }}
			<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
				<label for="username" class="col-md-2 control-label">Username</label>
				<div class="col-md-10">
					{{ Form::text('username', null, ['class'=>'form-control','placeholder'=>'Username']) }}
					{{ $errors->first('username', '<span class="help-block">:message</span>') }}
				</div>
			</div>
			<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
				<label for="email" class="col-md-2 control-label">Email</label>
				<div class="col-md-10">
					{{ Form::text('email', null, ['class'=>'form-control','placeholder'=>'Email Address']) }}
					{{ $errors->first('email', '<span class="help-block">:message</span>') }}
				</div>
			</div>
			<!-- <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
				<label for="firstname" class="col-md-2 control-label">First Name</label>
				<div class="col-md-10">
					{{ Form::text('firstname', null, ['class'=>'form-control','placeholder'=>'First Name']) }}
					{{ $errors->first('firstname', '<span class="help-block">:message</span>') }}
				</div>
			</div> -->
			<!-- <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
				<label for="lastname" class="col-md-2 control-label">Last Name</label>
				<div class="col-md-10">
					{{ Form::text('lastname', null, ['class'=>'form-control','placeholder'=>'Last Name']) }}
					{{ $errors->first('lastname', '<span class="help-block">:message</span>') }}
				</div>
			</div> -->
			<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
				<label for="password" class="col-md-2 control-label">Password</label>
				<div class="col-md-10">
					{{ Form::password('password', ['class'=>'form-control','placeholder'=>'Password']) }}
					{{ $errors->first('password', '<span class="help-block">:message</span>') }}
				</div>
			</div>
			<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
				<label for="password_confirmation" class="col-md-2 control-label">Confirm Password</label>
				<div class="col-md-10">
					{{ Form::password('password_confirmation', ['class'=>'form-control','placeholder'=>'Confirm Password']) }}
					{{ $errors->first('password_confirmation', '<span class="help-block">:message</span>') }}
				</div>
			</div>

			<div class="form-group">
				<!-- Button -->
				<div class="col-md-offset-2 col-md-10">
					<button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp; Sign Up</button>
					<span style="margin-left:8px;">or</span>
				</div>
			</div>
			<div style="border-top: 1px solid #999; padding-top:20px" class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i> &nbsp; Sign Up with Facebook</button>
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop
