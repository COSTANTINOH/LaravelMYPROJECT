@extends('layouts.base')
@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Print Reports</h4>
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
								<a href="#">Print</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Advance Print Reports</a>
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
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
								
									<div class="card-title">Multi Selection Report</div>
								</div>
								<form action="{{route('hr-print-report-section')}}" method="post">
								@csrf
								<div class="card-body">

								<div class="row">
										<div class="col-md-6 col-lg-6">
											<div class="form-group">
												<label for="email2">Select Report Type..</label>
												<select class="form-control" name="report_type">
													<option value="">Select Report Type..</option>
													<option value="individual">Individual</option>
													<option value="all_report">All Report</option>
												</select>
											</div>
										</div>	
										<div class="col-md-6 col-lg-6">
											<div class="form-group">
												<label for="email2">Select Report For</label>
												<select class="form-control" name="report_for">
													<option value="">Select For..</option>
													<option value="staff_write">Staff Write</option>
													<option value="staff_no_write">Staff Did't Write</option>
												</select>
											</div>
										</div>							
								</div>

								
								<div class="row">
										<div class="col-md-6 col-lg-6">
											<div class="form-group">
												<label for="email2">From Date</label>
												<input type="date" name="from" class="form-control" aria-describedby="emailHelp" placeholder="Task Desc" rows='5' required="required">
											</div>
										</div>	
										<div class="col-md-6 col-lg-6">
											<div class="form-group">
												<label for="email2">To Date</label>
												<input type="date" name="to" class="form-control" aria-describedby="emailHelp" placeholder="Task Result" rows='5' required="required">
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
												<span style="color:black;"> * Use email if you choose report type for Individual Staff *</span>
											</div>
										</div>	
												
									</div>

								</div>
								<div class="mb-5 ml-auto mr-0 float-right ">
									<button class="btn jatu-green white"><i class="fa fa-search"></i> Check</button>
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