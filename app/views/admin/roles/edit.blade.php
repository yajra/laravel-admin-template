@extends('admin.layouts.modal')

@section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
</ul>

{{ Form::model($role, ['class'=>'form-horizontal', 'autocomplete'=>'off']) }}
<div class="tab-content">
	<div class="tab-pane active" id="tab-general">
		<div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
			<div class="col-md-12">
				<label class="control-label" for="name">Name</label>
				<div class="input-control">
					{{ Form::input('text', 'name', null, ['id'=>'name','class'=>'form-control', in_array($role->name, ['admin','comment']) ? 'readonly' : '' ]) }}
					{{ $errors->first('name', '<span class="help-block">:message</span>') }}
				</div>
			</div>
		</div>

		<div class="form-group {{{ $errors->has('permissions') ? 'has-error' : '' }}}">
			<div class="col-md-12">
				<label class="control-label" for="permission">Permissions</label>
				{{ Form::select('permissions[]', Permission::lists('display_name','id'), $role->perms()->lists('permission_id'), ['multiple','class'=>'select2-multiple','id'=>'permission']) }}
				{{ $errors->first('permissions', '<span class="help-block">:message</span>') }}
			</div>
		</div>
	</div>
</div>

<div class="form-group">
	<div class="col-md-12">
		<element class="btn btn-warning close_popup">{{ Lang::get('button.cancel') }}</element>
		<button type="reset" class="btn btn-default">{{ Lang::get('button.reset') }}</button>
		<button type="submit" class="btn btn-success">{{ Lang::get('button.save') }}</button>
	</div>
</div>
{{ Form::close() }}
@stop
