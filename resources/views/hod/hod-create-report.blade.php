@extends('layouts.base')
@section('contents')
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title orange">Reports</h4>
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
					<a href="#">Create Report</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
					<a href="{{route('hod-view-my-report')}}">View Report</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Create Report</div>
						</div>
						@if($errors->any())
						<div class="alert alert-danger alert-dismissible white" style="background-color:#f25961;" >
							@foreach($errors->all() as $error)
							{{$error}}
							@endforeach	
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span> 
							</button>								
						</div>
						@endif
						@if (session('status-okay'))
							{{-- <div class="alert jatu-green white alert-dismissible' role='alert'">
							{{ session('status-okay') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span> 
							</button>
							</div> --}}
							<script>
								var SweetAlert2Demo = function() {
									var initDemos = function() {							
										$(document).ready( function () {
											swal(" {{ Session::get('status-okay') }}", "Click anywhere or button to close!", {
												icon : "success",
												buttons: {        			
													confirm: {
														className : 'btn jatu-green'
													}
												},
											});
										});
									};

									return {
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
						<?php //$today = date('N', time()); echo $today; ?> 
						@if($x == 0)
							<div class="card-body">
								<div class="row">
								
									<div class="col-md-12 col-lg-12">
									<form action="{{route('hod-save-report')}}" method="POST">
										@csrf

										<div class="col-md-6 col-lg-6">
											<div class="form-group">
												<label for="report">Report Title</label>
											<input type="text" class="form-control" name="report_title" value="{{old('report_title')}}" placeholder="Enter Report Title" required>

											</div>
										</div>
										<div class="form-group">
											<label for="target">Write your weekly Target</label>
											<!-- <input type="text" class="form-control" name="target" id="target" placeholder="Enter Your Weekly Target"> -->
											<textarea name="report" id="editor" cols="30" rows="5" required></textarea>
										</div>
										<div class="form-group">
											<input type="submit" class="btn jatu-green white"  value="Save">
										</div>	
									</form>										
									</div>
								
								</div>
							</div>
						@elseif($x == 1)
							<div class="col-md-12">
								<div class="card full-height jatu-bd-orange">
									<div class="card-body" style="margin:20px;">
										<center><div class="card-title">
											Sorry! you have already write your weekly report wait for the next week
										</div></center>
										<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
											<div class="px-2 pb-2 pb-md-0 text-center">
												<div id="" class="jatu-orange-c">
													<i class="fa fa-tasks fa-5x"></i>
												</div>
												<a href="{{route('hod-view-my-report')}}" class="btn jatu-orange white mt-3">
													<h6 class="fw-bold mt-0 mb-0">Click to View Report</h6>
												</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="container-fluid">
			<div class="copyright ml-auto">
				Jatuplc@2020:All rights reserved 
			</div>				
		</div>
	</footer>
</div>
@endsection