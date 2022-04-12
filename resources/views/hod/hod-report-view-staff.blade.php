@extends('layouts.base')
@section('contents')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Staff Reports</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="{{route('staff')}}">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
							<a href="{{url('/hod/hod-report-view')}}">View Reports</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Preview Staff Reports</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Preview Report Form</div>
								</div>
								<div style="margin:20px">
									@if(Session::get('success'))
								<script>
									//== Class definition
									var SweetAlert2Demo = function() {

										//== Demos
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
									
									setTimeout(function(){
										window.location.href = '/hod/hod-report-view';
									}, 5000);
                            	</script>
								@endif
								@if(Session::get('failed'))
							    	<script>
										//== Class definition
										var SweetAlert2Demo = function() {
											//== Demos
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
								<center style="margin-top: 0px;">
									<table style="margin:5px;">
										<img src="{{asset('/public/img/report2.png')}}"  style="width: 623px; height:164px;" >									
								    </table>
								</center> 
								@csrf
								<div class="pl-5 pr-5 mr-5 ml-5 font-jatu">
									<div class="row">
										<div class="col-6">
											<h4 style="color:black;"><b>Staff Details</b></h4>
											<h6 style="color:black;"><b>Name:</b> {{App\User::find($user_id)->first_name." ".App\User::find($user_id)->middle_name." ".App\User::find($user_id)->last_name}}</h6>
											<h6 style="color:black;"><b>Department:</b> {{App\User::find($user_id)->ulbd->department->short_form}}</h6>
											<h6 style="color:black;"><b>Position:</b> {{App\User::find($user_id)->position->pname}}</h6>
											<h6 style="color:black;"><b>Phone:</b>
											@foreach (App\User::find($user_id)->phones as $phones)
												{{$phones->phone}}
											@endforeach
											</h6>
										</div>
										<div class="col-6">
											<p class="float-right">
												<b>REPORTING TIME: </b>{{App\Report::find(request()->route('id'))->reporting_time}}			<br>								
												<b>REPORT SENT TIME: </b>{{date('H:i', strtotime(App\Report::find(request()->route('id'))->updated_at))}}			<br>
												<b>REPORT DATE: </b>{{App\Report::find(request()->route('id'))->date}}												
											</p>
										</div>
									</div>
									<br>
									<h4 style="color:black;"><b>Weekly Target</b></h4>
									@foreach($target_name as $target_name)
										<h5 style="color:black;margin-bottom:40px;">{!!$target_name->name!!}</h5>
									@endforeach
									@foreach($task_list as $key=>$task)
										<table>
											<tr>
												<h4 style="color:black;"><b>TASK:</b> {{ucwords($task->title)}} <b>({{$task->time_taken}})</b></h4>
												<p style="color:black;margin-bottom:10px;"> {!!nl2br($task->description)!!} </p>
												<table border="1" width="100%">
													<tr>
														<th style="color:black;padding-left: 10px;">Results</th>
														<th style="color:black;padding-left: 10px;">Challenges</th>
													</tr>
													<tr>
														<td style="padding:10px">{!!nl2br($task->result)!!}</td>
														<td style="padding:10px">{!!nl2br($task->challenge)!!}</td>
													</tr>
												</table>										
											</tr>
										</table>
										<br><br>
									@endforeach
								</div>
								<div class="pl-5 pr-5 mr-5 ml-5 font-jatu">							
									<form action="{{route('hod-report-comment-send',$id)}}" method="POST">
										@csrf
										<div class="row">
											<div class="col-md-6 col-lg-12">
												<div class="form-group">
													<label for="email2">Please Provide Your Review Here</label>
													<textarea class="form-control" id="editor" aria-describedby="emailHelp" placeholder="Task Result" name="comment_hod" rows='20' required="required"></textarea>
												</div>
											</div>				
										</div>
										<div class="mb-5 ml-0 mr-auto float-left ">
											<div aria-label="Basic example">
												<input type="radio"id="male"  name="check" value="confirm" checked> 
												<label for="male" style="font-size:30px;color: black;font-weight: bold;">Confirm Received</label><br>
												<input type="radio" id="female" name="check" value="return">
												<label for="female" style="font-size:30px;color: black;font-weight: bold;">Return For Changes</label><br>
											</div>
										</div> 
										<div class="mb-5 ml-auto mr-0 float-right ">
											<button type="submit" class="btn jatu-green white"><i class="fa fa-paper-plane"></i> Comfirm Submit</button>
										</div>
									</form>
								</div>
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