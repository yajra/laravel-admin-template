@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

@section('keywords')Blogs administration @stop
@section('author')Laravel 4 Bootstrap Starter SIte @stop
@section('description')Blogs administration index @stop

{{-- Content --}}
@section('content')
<div class="box box-primary">
	<div class="box-header">
		<div class="pull-right box-tools">
			<a href="{{url('admin/blogs/create')}}" class="btn btn-primary btn-sm iframe">
				<span class="fa fa-plus-circle"></span> Create
			</a>
			<a href="#" onClick="oTable.fnReloadAjax()" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></a>
		</div>
		<i class="fa fa-list-alt"></i>
		<h3 class="box-title">Blogs</h3>
	</div>
	<div class="box-body">
		<table id="blogs" class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th class="col-md-4">{{{ Lang::get('admin/blogs/table.title') }}}</th>
					<th class="col-md-2">{{{ Lang::get('admin/blogs/table.comments') }}}</th>
					<th class="col-md-2">{{{ Lang::get('admin/blogs/table.created_at') }}}</th>
					<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
var oTable;
$(document).ready(function() {
	oTable = $('#blogs').dataTable( {
		"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		},
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "{{ URL::to('admin/blogs/data') }}",
		"fnDrawCallback": function ( oSettings ) {
			$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
		}
	});
});
</script>
@stop