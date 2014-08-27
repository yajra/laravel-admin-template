@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	<li><a href="#tab-permissions" data-toggle="tab">Permissions</a></li>
</ul>
<!-- ./ tabs -->

{{-- Edit Role Form --}}
{{ Form::model($role, ['class'=>'form-horizontal', 'autocomplete'=>'off']) }}
<!-- Tabs Content -->
<div class="tab-content">
	<!-- General tab -->
	<div class="tab-pane active" id="tab-general">
		<!-- Name -->
		<div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
			<div class="col-md-12">
				<label class="control-label" for="name">Name</label>
				<div class="input-control">
					{{ Form::input('text', 'name', null, ['id'=>'name','class'=>'form-control']) }}
					{{ $errors->first('name', '<span class="help-block">:message</span>') }}
				</div>
			</div>
		</div>
		<!-- ./ name -->
	</div>
	<!-- ./ general tab -->

	<!-- Permissions tab -->
	<div class="tab-pane" id="tab-permissions">
		<div class="form-group">
			<div class="col-md-12">
				<select name="permissions[]" id="permission" class="select2-multiple" multiple>
					@foreach ($permissions as $permission)
					<option value="{{ $permission['id'] }}" {{{ (isset($permission['checked']) && $permission['checked'] == true ? ' selected="selected"' : '')}}}>{{ $permission['display_name'] }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<!-- ./ permissions tab -->
</div>
<!-- ./ tabs content -->

<!-- Form Actions -->
<div class="form-group">
	<div class="col-md-12">
		<element class="btn btn-warning close_popup">Cancel</element>
		<button type="reset" class="btn btn-default">Reset</button>
		<button type="submit" class="btn btn-success">Update Role</button>
	</div>
</div>
<!-- ./ form actions -->
{{ Form::close() }}
@stop
