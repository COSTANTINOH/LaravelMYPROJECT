@extends('layouts.base')
<style>
    #box_date{
        display: none;
    }
</style>
<script>
	function show(){
		document.getElementById('box_date').style.display ='block';
	}
	function hide(){
		document.getElementById('box_date').style.display = 'none';
	}

	function printCont(el) {
        var rePage = document.body.innerHTML;
        var x = document.getElementsByClassName("ignore");
        var i;
        for(i =0;i<x.length;i++){
            x[i].style.display = "none";
        }
        var printCont = document.getElementById(el).innerHTML;
        document.body.innerHTML = printCont;
        window.print();
        document.body.innerHTML = rePage;
        window.close();
    }
</script>
@section('contents')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Staff request</h4>
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
							<a href="{{url('/hod/permission-requests')}}">View Staff Requests</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Preview Staff Request</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card" id="el">
								<div class="card-header">
									<div class="card-title ignore" id="ignore">Preview Request</div>
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
										window.location.href = '/hod/permission-requests';
									}, 5000);
                            	</script>
								@endif
								@if(Session::get('hr-success'))
								<script>
									//== Class definition
									var SweetAlert2Demo = function() {

										//== Demos
										var initDemos = function() {

											$(document).ready( function () {
												swal(" {{ Session::get('hr-success') }}", "Click Anywhere in Screen to close", {
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
										window.location.href = '/hr/permission-process';
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
									<table>
										<img src="{{asset('/public/img/perm.PNG')}}"  style="width: 520px; height:130px;" >									
									</table>
								</center> 
									
								<div class="pl-5 pr-5 pb-5 mr-5 ml-5 font-jatu">
									<hr class="hr">
									<center class="font-weight-bold Black">PERMISSION NOTE</center>
									<hr class="hr" style="border:1px solid #000;">

									<h4 class="font-weight-bold Black">STAFF DETAILS:</h4>
									<div class="row">
										<div class="col-12">
											<h6 class="Black"><b>Name:</b> {{App\User::find($user_id)->first_name." ".App\User::find($user_id)->middle_name." ".App\User::find($user_id)->last_name}}</h6>
											<h6 class="Black"><b>Position:</b> {{App\User::find($user_id)->position->pname}}</h6>
											<h6 class="Black"><b>Department:</b> {{App\User::find($user_id)->ulbd->department->short_form}}</h6>
											<h6 class="Black"><b>Phone:</b>
											@foreach (App\User::find($user_id)->phones as $phones)
												{{$phones->phone}}
											@endforeach
											</h6>
											<h4 class="font-weight-bold Black mt-4">REQUESTED PERMISSION:</h4>
											@foreach ($perm as $perm)
												<h5 class="Black">I Request
												<h5 class="Black text-justify">{!!$perm->request!!}</h5>
												@if($perm->to == "")
												<h5 class="Black text-justify"><b>From: </b><u>{{$perm->date_from}}</u></h5>
												@elseif($perm != "")
												<h5 class="Black text-justify"><b>From: </b> <u>{{$perm->date_from}}</u> <b>To</b> <u>{{$perm->date_to}}</u></h5>
												@endif
											@endforeach	
										</div>
									</div>
									<h4 class="font-weight-bold Black mt-3">HEAD OF DEPARTMENT RECOMMENDATION:</h4>
									@if ($perm->hod_recommendation == NULL)
										<form action="{{route('save-hod-recommendation',request()->route('id'))}}" method="POST">
											@csrf
											<div class="form-group">
											<label>Accept</label><input type="radio" name="permission" value="accept" class="ml-1" onclick="show();">
											<label class="ml-3"> Reject</label><input type="radio" name="permission" value="[reject]" class="ml-1" onclick="hide();">
											</div>
											<div class="form-group box_date" id="box_date">
												<label for="recomend" class="Black">RERMISSION DURATION:</label>
												{{-- @foreach($perm as $perms) --}}
													<div class="row">
														<div class="col-4">
															<label for="target">From:</label>
															<input type="date" class="form-control" name="from"  value="{{$perm->date_from}}" > 
														</div>
														<div class="col-4">
															<label for="target">To:</label>
															<input type="date" class="form-control" name="to" value="{{$perm->date_to}}" > 
														</div>
													</div>
												{{-- @endforeach --}}
											</div>
											<div class="form-group">
												<label for="recomend">Please Provide Your Recommendation Here</label>
												<textarea class="form-control" id="editor" aria-describedby="emailHelp" placeholder="Recommendation" name="recommend_hod" rows='20' required="required"></textarea>
											</div>
											
											
											<div class="mb-5 ml-auto mr-2 float-right">
												<button type="submit" class="btn jatu-green white"><i class="fa fa-paper-plane"></i>Submit</button>
											</div>
										</form>
									@else
										<h6 class="Black"><b>Name:</b> {{App\User::find(Auth::user()->id)->first_name." ".App\User::find(Auth::user()->id)->middle_name." ".App\User::find(Auth::user()->id)->last_name}}</h6>
										<h6 class="Black"><b>Position:</b> {{App\User::find(Auth::user()->id)->position->pname}}</h6>
										<h6 class="Black text-justify"><b>Recommendation:</b>{!!$perm->hod_recommendation!!}</h6>
										<h6 class="Black text-justify"><b>Date:</b>{!!$perm->hod_comment_date!!}</h6>
									@endif

									@if ($perm->hr_recommendation != NULL)
									
									@else
										{{-- <h4 class="font-weight-bold Black mt-5">HUMAN RESOURCE MANAGER RECOMMENDATION:</h4>

										<h6 class="Black"><b>Prroved by:</b> _________________________________________________</h6>
										<h6 class="Black"><b>Position:</b> _________________________________________________</h6>
										<h6 class="Black text-justify"><b>Recommendation:</b>___________________________________________________________________________________________________________________________________________________________________________________________</h6>
										<h6 class="Black text-justify"><b>Signature:</b>_________________________________________________</h6>
										<h6 class="Black text-justify"><b>Date:</b>_________________________________________________</h6>					 --}}
									@endif
									
									@if ($perm->hod_recommendation != NULL)
									<hr class="hr">
									<button class="btn jatu-green white pull-right ignore" onclick="printCont('el')">
										Print
									</button>
									@endif
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