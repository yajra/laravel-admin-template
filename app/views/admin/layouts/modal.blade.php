<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>
		@section('title')
		Administration
		@show
	</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- bootstrap 3.0.2 -->
	<link href="{{ url('adminlte/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- font Awesome -->
	<link href="{{ url('adminlte/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Ionicons -->
	<link href="{{ url('adminlte/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Daterange picker -->
	<link href="{{ url('adminlte/css/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
	<!-- bootstrap wysihtml5 - text editor -->
	<link href="{{ url('adminlte/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- DataTable -->
	<link href="{{ url('adminlte/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
	<!-- ColorBox -->
	<link rel="stylesheet" href="{{asset('assets/css/colorbox.css')}}">
	<!-- Select2 -->
	<link rel="stylesheet" href="{{asset('assets/js/select2/select2.css')}}">
	<link rel="stylesheet" href="{{asset('assets/js/select2/select2-bootstrap.css')}}">
	<!-- Theme style -->
	<link href="{{ url('adminlte/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

	@yield('styles')

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

	<style>
	body {margin-top: 20px;}
	.tab-pane {
		padding-top: 20px;
	}
	</style>
</head>

<body class="skin-blue">
	<!-- Container -->
	<div class="container">

		<!-- Notifications -->
		@include('admin.notifications')
		<!-- ./ notifications -->

		<div class="page-header">
			<h3>
				{{ $title }}
				<div class="pull-right">
					<button class="btn btn-default btn-small btn-inverse close_popup"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button>
				</div>
			</h3>
		</div>

		<!-- Content -->
		@yield('content')
		<!-- ./ content -->

		<!-- Footer -->
		<footer class="clearfix">
			@yield('footer')
		</footer>
		<!-- ./ Footer -->

	</div>
	<!-- ./ container -->

	<!-- Javascripts -->
	<!-- jQuery 2.0.2 -->
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
	<script src="{{ url('adminlte/js/jquery.min.js') }}"></script>
	<!-- jQuery UI 1.10.3 -->
	<script src="{{ url('adminlte/js/jquery-ui-1.10.3.min.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ url('adminlte/js/bootstrap.min.js') }}"></script>
	<!-- daterangepicker -->
	<script src="{{ url('adminlte/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="{{ url('adminlte/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<!-- iCheck -->
	<script src="{{ url('adminlte/js/plugins/iCheck/icheck.min.js') }}"></script>
	<!-- DataTables -->
	<script src="{{ asset('assets/js/datatables.min.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-bootstrap.js') }}"></script>
	<script src="{{ asset('assets/js/datatables.fnReloadAjax.js') }}"></script>
	<!-- Select2 -->
	<script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
	<!-- ColorBox -->
	<script src="{{ asset('assets/js/jquery.colorbox.js') }}"></script>
	<script src="{{ asset('assets/js/prettify.js') }}"></script>
	<!-- DatePicker -->
	<link rel="stylesheet" href="{{ asset('assets/js/datepicker/css/datepicker.css') }}">
	<script src="{{ asset('assets/js/datepicker/js/bootstrap-datepicker.js') }}"></script>

	@yield('scripts')

	<script>
	$(document).ready(function(){
		$('.close_popup').on('click',function(e){
			e.preventDefault();
			parent.jQuery.fn.colorbox.close();
			parent.oTable.fnReloadAjax();
		});
		$('#deleteForm').submit(function(event) {
			var form = $(this);
			$.ajax({
				type: form.attr('method'),
				url: form.attr('action'),
				data: form.serialize()
			}).done(function() {
				parent.jQuery.colorbox.close();
				parent.oTable.fnReloadAjax();
			}).fail(function() {
			});
			event.preventDefault();
		});
	});
	$('.wysihtml5').wysihtml5();
	$(prettyPrint)

	$(document).ready(function() {
    	// select2 style
    	$('.select2').select2();
        // dataTables bootstrap style
        $('.dataTables_length select').select2({width: 80});
        $('.dataTables_filter input').addClass('form-control');
        // Date picker
        $('.datepicker').datepicker({
        	format: 'yyyy-mm-dd'
        });
        // Dual List Box
        $('.select2-multiple').select2({
        	width: '100%'
        });
    });
	</script>
</body>

</html>
