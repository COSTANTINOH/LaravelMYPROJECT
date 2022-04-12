@extends('layouts.base')
@section('contents')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Staff Reports</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">View Reports</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Preview Hr Reports</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Preview Report</div>
								</div>
								<div style="margin:20px">
									@if(Session::get('success'))
										<script>
											var SweetAlert2Demo = function() {
												var initDemos = function() {
													$(document).ready( function () {
														swal(" {{ Session::get('success') }}", "Click Anywhere in Screen to close", {
															icon : "success",
															buttons: {        			
																confirm: {
																	className : 'btn btn-success'
																}
															},
														});
													});
												};

												return {
													//== Init
													init: function() {
														initDemos();
													},
												};
											}();
											//== Class Initialization
											jQuery(document).ready(function() {
												SweetAlert2Demo.init();
											});
										</script>
									@endif

									@if(Session::get('failed'))
										<script>
											var SweetAlert2Demo = function() {
												var initDemos = function() {
													$(document).ready( function () {
														swal(" {{ Session::get('failed') }}", "Click Anywhere in Screen to close", {
															icon : "warning",
															buttons: {        			
																confirm: {
																	className : 'btn btn-warning'
																}
															},
														});
													});
												};

												return {
													//== Init
													init: function() {
														initDemos();
													},
												};
											}();
											//== Class Initialization
											jQuery(document).ready(function() {
												SweetAlert2Demo.init();
											});
										</script>
									@endif
								</div>
								<center style="margin-top: 20px;">
									<table style="margin:20px;padding: 20px">
									<img src="{{asset('assets/img/download.png')}}" width="100" height="100" style="margin-bottom:10px;">
									<br/>
									<h2  style="margin-bottom:10px;color:black;font-weight: bold;">JENGA AFYA TOKOMEZA UMASIKINI (JATU)</h2>

									<h3  style="margin-bottom:10px;color:black;">HR WEEKLY REPORT REVIEW FORM</h3>


									<h3  style="color:black;"><?php $today = date('Y-m-d'); echo "$today"; ?>  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp; STAFF REPORT</h3>
									<hr/>
								    </table>
								</center>
								@csrf
								<div style="margin: 100px">
								



								@foreach($task_list as $key=>$task)
									<table>
										<tr>
											<h2 style="color:black;margin-bottom:10px;">Report Title : <span style="color:black;font-weight:bold">{{$task->title}}</span></h2>

											<!-- <h2 style="color:black;margin-bottom:10px;">Task Time Taken : <span style="color:black;font-weight:bold">{{$task->time_taken}} (hrs)</span></h2> -->

											<h2 style="color:black;margin-bottom:10px;">Report Description</h2>
											<p style="color:black;margin-bottom:10px;font-size: 15px;font-weight:bold"> {!!$task->description!!} </p>

											<!-- <h2 style="color:black;margin-bottom:10px;">Task Result</h2>
											<p style="color:black;margin-bottom:10px;font-size: 15px;font-weight:bold"> {!!$task->result!!}</p>

											<h2 style="color:black;margin-bottom:10px;">Task Challenge</h2>
											<p style="color:black;margin-bottom:10px;font-size: 15px;font-weight:bold"> {!!$task->challenge!!}</p> -->


										</div>
										<br/>
										</tr>
									</table>
								@endforeach
							
							{{-- <form action="{{route('ceo-hod-report-comment-send',$id)}}" method="POST">
								@csrf
								<div class="row">
										<div class="col-md-6 col-lg-12">
											<div class="form-group">
												<label for="email2">Please Provide Your Review Here</label>
												<textarea class="form-control" id="editor" aria-describedby="emailHelp" placeholder="Task Result" name="comment_hr" rows='20' required="required"></textarea>
											</div>
										</div>				
									</div>
								<div class="mb-5 ml-auto mr-0 float-right ">
									<button type="submit" class="btn jatu-green white"><i class="fa fa-paper-plane"></i> Comfirm Submit</button>
								</div>
							</form> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="#">
									JATU PLC
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						Designed and Developed <i class="fa fa-heart heart text-danger"></i> by <a href="">JATU PLC</a>
					</div>				
				</div>
			</footer>
		</div>
		<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

	<!-- jQuery UI -->
	<script src="{{asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


	<!-- Chart JS -->
	<script src="{{asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

	<!-- Chart Circle -->
	<script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>

	<!-- Datatables -->
	<script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{asset('assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

	<!-- Sweet Alert -->
	<script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

	<!-- Atlantis JS -->
	<script src="{{asset('assets/js/atlantis.min.js')}}"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{asset('assets/js/setting-demo.js')}}"></script>
	<script src="{{asset('assets/js/demo.js')}}"></script>
		<script>
			$('#displayNotif').on('click', function(){
				var placementFrom = 'top';
				var placementAlign = 'center';
				var state = 'plain';
				var style = 'primary';
				var content = {};
	
				content.message = 'Turning standard Bootstrap alerts into "notify" like notifications';
				content.title = 'Bootstrap notify';
				if (style == "withicon") {
					content.icon = 'fa fa-bell';
				} else {
					content.icon = 'none';
				}
				content.url = 'index.html';
				content.target = '_blank';
	
				$.notify(content,{
					type: state,
					placement: {
						from: placementFrom,
						align: placementAlign
					},
					time: 1000,
					delay: 0,
				});
			});
		</script>
		 <script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
	@endsection