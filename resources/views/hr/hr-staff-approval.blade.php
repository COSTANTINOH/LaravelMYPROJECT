@extends('layouts.base')
@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Staff Approval</h4>
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
								<a href="#">Approval</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
							<a href="{{route('hr-staff-view-approval')}}">View Approvals</a>
							</li>
						</ul>
					</div>
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
								</script>
								@endif
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Staff Approval Form</div>
								</div>
								<form action="{{route('hr-staff-approval-give')}}" method="post">
								@csrf
								<div class="card-body">
								<div class="row">
										<div class="col-md-12 col-lg-12">
											<div class="form-group">
												<label for="email2">Reason For Approval</label>
												<textarea class="form-control" name="approal_reason" rows="6" required></textarea>
											</div>
										</div>						
								</div>
								<div class="row">
										<div class="col-md-6 col-lg-6">
											<div class="form-group">
												<label for="email2">Provide User Email</label>
												<select name="email" class="form-control">
													<option value="">Select Email</option>
													@foreach($user_email  as $email)
														<option value="{{$email->id}}">{{$email->email}}</option>
													@endforeach
												</select>
											</div>
										</div>						
							    	</div>
								</div>
								<div class="mb-5 ml-auto mr-0 float-right ">
									<button class="btn jatu-green white"><i class="fa fa-check-circle"></i>  Approval</button>
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
@endsection