@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
</ul>
<!-- ./ tabs -->

{{-- Create User Form --}}
{{ Form::model($user, ['autocomplete'=>'off','class'=>'form-horizontal']) }}

<!-- Tabs Content -->
<div class="tab-content">
	<!-- General tab -->
	<div class="tab-pane active" id="tab-general">
		<!-- username -->
		<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
			<label class="col-md-2 control-label" for="username">Username</label>
			<div class="col-md-10">
				{{ Form::input('text', 'username', null, ['id'=>'username','class'=>'form-control']) }}
				{{ $errors->first('username', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		<!-- ./ username -->

		<!-- Email -->
		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			<label class="col-md-2 control-label" for="email">Email</label>
			<div class="col-md-10">
				{{ Form::input('text', 'email', null, ['id'=>'email','class'=>'form-control']) }}
				{{ $errors->first('email', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		<!-- ./ email -->

		<!-- Password -->
		<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
			<label class="col-md-2 control-label" for="password">Password</label>
			<div class="col-md-10">
				<input class="form-control" type="password" name="password" id="password" value="" />
				{{ $errors->first('password', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		<!-- ./ password -->

		<!-- Password Confirm -->
		<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
			<label class="col-md-2 control-label" for="password_confirmation">Password Confirm</label>
			<div class="col-md-10">
				<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" />
				{{ $errors->first('password_confirmation', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		<!-- ./ password confirm -->

		<!-- Activation Status -->
		<div class="form-group {{ $errors->has('activated') || $errors->has('confirm') ? 'has-error' : '' }}">
			<label class="col-md-2 control-label" for="confirm">Activate User?</label>
			<div class="col-md-6">
				@if ($mode == 'create')
				<select class="form-control select2" name="confirm" id="confirm">
					<option value="1"{{ (Input::old('confirm', 0) === 1 ? ' selected="selected"' : '') }}>{{ Lang::get('general.yes') }}</option>
					<option value="0"{{ (Input::old('confirm', 0) === 0 ? ' selected="selected"' : '') }}>{{ Lang::get('general.no') }}</option>
				</select>
				@else
				<select class="form-control select2" {{ ($user->id === Confide::user()->id ? ' disabled="disabled"' : '') }} name="confirm" id="confirm">
					<option value="1"{{ ($user->confirmed ? ' selected="selected"' : '') }}>{{ Lang::get('general.yes') }}</option>
					<option value="0"{{ ( ! $user->confirmed ? ' selected="selected"' : '') }}>{{ Lang::get('general.no') }}</option>
				</select>
				@endif
				{{ $errors->first('confirm', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		<!-- ./ activation status -->

		<!-- Groups -->
		<div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
			<label class="col-md-2 control-label" for="roles">Roles</label>
			<div class="col-md-6">
				<select class="form-control select2-multiple" name="roles[]" id="roles[]" multiple>
					@foreach ($roles as $role)
					@if ($mode == 'create')
					<option value="{{ $role->id }}"{{ ( in_array($role->id, $selectedRoles) ? ' selected="selected"' : '') }}>{{ $role->name }}</option>
					@else
					<option value="{{ $role->id }}"{{ ( array_search($role->id, $user->currentRoleIds()) !== false && array_search($role->id, $user->currentRoleIds()) >= 0 ? ' selected="selected"' : '') }}>{{ $role->name }}</option>
					@endif
					@endforeach
				</select>

				<span class="help-block">
					Select a group to assign to the user, remember that a user takes on the permissions of the group they are assigned.
				</span>
			</div>
		</div>
		<!-- ./ groups -->
	</div>
	<!-- ./ general tab -->

</div>
<!-- ./ tabs content -->

<!-- Form Actions -->
<div class="form-group">
	<div class="col-md-offset-2 col-md-10">
		<button type="button" class="btn btn-warning close_popup">Cancel</button>
		<button type="reset" class="btn btn-default">Reset</button>
		<button type="submit" class="btn btn-success">OK</button>
	</div>
</div>
<!-- ./ form actions -->
{{ Form::close() }}
@stop
