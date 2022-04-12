@extends('layouts.base')
@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						@if($check_null != 0)
						@else
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
							<a href="#">Create Target</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
							<a href="{{route('view-targets')}}">View Target</a>
							</li>
						</ul>
						@endif
					</div>

					<div class="row">
					@if($check_null == '0')
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Create Target</div>
							</div>

							@if($errors->any())								
								 <script>
									var SweetAlert2Demo = function() {
										var initDemos = function() {
											$(document).ready( function () {
												swal("Please provide target", "Click Anywhere in Screen to close", {
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
											init: function() {
												initDemos();
											},
										};
									}();
									jQuery(document).ready(function() {
										SweetAlert2Demo.init();
									});
								</script>
							@endif
							@if (session('status-okay'))
								<div class="alert jatu-green white alert-dismissible' role='alert'">
								{{ session('status-okay') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span> 
								</button>
								</div>

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

							<div class="card-body">
								<div class="row">
								 
									<div class="col-md-12 col-lg-12">
									<form action="{{route('save-target')}}" method="POST">
										@csrf
										<div class="form-group">
											<label for="target">Write your weekly Target</label>
											<!-- <input type="text" class="form-control" name="target" id="target" placeholder="Enter Your Weekly Target"> -->
										<textarea name="target" id="editor" cols="30" rows="5" required>{{old('target')}}</textarea>
										</div>
										<div class="form-group">
											<input type="submit" class="btn jatu-green white"  value="Save">
										</div>	
									</form>										
									</div>
								
								</div>
							</div>
						</div>							
					</div> 
					@elseif($check_null == '1')
					@if($target_status >= '0')
						<div class="col-md-12">
							<div class="card full-height jatu-bd-orange">
								<div class="card-body" style="margin:20px;">
									<center><div class="card-title">
										Sorry! you have already set your weekly target wait for the next week
									</div></center>
									
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="" class="jatu-orange-c">
												<i class="fa fa-tasks fa-5x"></i>
											</div>
											<a href="{{route('task-create')}}" class="btn jatu-orange white mt-3">
												<h6 class="fw-bold mt-0 mb-0">Click to Create Task</h6>
											</a>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						@else
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Create Target</div>
								</div>
								
								@if($errors->any())
								<div class="alert alert-danger alert-dismissible white" style="background-color:#f25961;" >
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>									
								</div>
								@endif

								<div class="card-body">
									<div class="row">
									 
										<div class="col-md-12 col-lg-12">
										<form action="{{route('save-target')}}" method="POST">
											@csrf
											<div class="form-group">
												<label for="target">Write your weekly Target</label>
												<!-- <input type="text" class="form-control" name="target" id="target" placeholder="Enter Your Weekly Target"> -->
											<textarea name="target" id="editor" cols="30" rows="5" required>{{old('target')}}</textarea>
											</div>
											<div class="form-group">
												<input type="submit" class="btn jatu-green white"  value="Save">
											</div>	
										</form>										
										</div>
									
									</div>
								</div>
							</div>							
						</div>
						@endif
					@elseif($check_null == '0')
					<div class="col-md-12">
						<div class="card full-height jatu-green white">
							<div class="card-body" style="margin:20px;">
								<center><div class="card-title white">
									Sorry! you have  already set your weekly target wait for the next week
								</div></center>
								
								<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
									<a href="{{route('task-create')}}" style="text-decoration:none;" class="white">
									<div class="px-2 pb-2 pb-md-0 text-center">
										<div id="">
											<i class="fa fa-tasks fa-5x"></i>
										</div>
										<h6 class="fw-bold mt-3 mb-0">Click to Create Task</h6>
									</div>
									</a>
								</div>
							</div>
						</div>
					</div>
					@endif
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