@extends('layouts.base')
@section('contents')
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title orange">Task</h4>
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
					<a href="#">Create Task</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
					<a href="{{ route('task-list') }}">View Task</a>
					</li>
				</ul>
			</div>
			

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					@if(Session::get('success'))
					<!-- <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
						<strong> {{ Session::get('success') }} </strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div> -->

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

					@if(Session::get('failed'))
					<!-- <div class="alert alert-warning  .bg-danger alert-dismissible fade show" style="background-color: #f25961;" role="alert" id="gone">
						<strong style="color: white;font-weight: bold;"> {{ Session::get('failed') }} </strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div> -->

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
					@if($report_today == "")
					<a href="{{ route('task-list') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><div class="card-title jatu-green-c">Total Task Created : <i class="fa fa-tasks black"></i>
								<span class="notification">({{$count_list}})</span>
							
					</div></a>
					<div class="row">
						
					   <div class="alert alert-jatu col-9" role="alert" >
						   <div style="color: black;">Note : if you finish inserting your task click right buttom to see them befor sending...</div>
					   </div>
					   <div class="col-3">
							<a href="{{ route('task-list') }}" class="btn jatu-orange white">({{$count_list}}) <span style="font-size: 15px;font-weight: bold;">click here to see them</span></a>
						</div>
					</div>
					
					@endif

				</div>
				@if($target_name != "")
					@if($report_today != "")
						<div class="col-md-12">
							<div class="card full-height jatu-bd-orange">
								<div class="card-body" style="margin:20px;">
									<center><div class="card-title">
										Sorry! you have already sent your report
									</div></center>
									
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="" class="jatu-orange-c">
												<i class="fa fa-bullseye fa-5x"></i>
											</div>
											<a href="{{route('staff-view-report')}}" class="btn jatu-orange white mt-3">
												<h6 class="fw-bold mt-0 mb-0">Click to View report</h6>
											</a>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					@else
						<form action="{{ route('task-form') }}" method="post">
							@csrf
							<div class="card-body">
								<div class="row">
								
									<div class="col-md-6 col-lg-12">
										<div class="form-group">
											<label for="email2">Week Target</label>
											<p>{!!$target_name!!}</p>
											
										</div>
									</div>
								</div>
									
									<div class="row">
										@if($report_time == "")
										{{-- time picker for reporting time --}}
										<div class="col-md-4 col-lg-3">
											<div class="form-group">
												<label for="inputMDEx1">Reporting Time</label>
												<input type="time" id="inputMDEx1" name="reporting_time" class="form-control">
											</div>
										</div>
										@else
										<div class="col-md-4 col-lg-3">
											<div class="form-group">
												<label for="inputMDEx1">Reporting Time: </label>
												{{$report_time}}
											</div>
										</div>
										
										@endif
										{{-- end of tim piker --}}
									</div>
									<div class="row">
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<label for="email2">Task Title</label>
											<input type="text" class="form-control" name="task_title" placeholder="Enter Task Title" required="required">

										</div>
									</div>
									
									<div class="col-md-6 col-lg-4">
										<div class="form-group">
											<label for="email2">Time Taken(<span style="color:green"> (Hrs)</span></label>
											<input type="text" min="1" max="9" class="form-control" name="time_taken" placeholder="Eg. 1hr 30min" required="required">

										</div>
									</div>								

								</div>

								<div class="row">
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<label for="email2">Task Description</label>
											<textarea class="form-control" aria-describedby="emailHelp" placeholder="Task Desc" name="task_description" rows='5' required="required"></textarea>
										</div>
									</div>	

									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<label for="email2">Task Result</label>
											<textarea class="form-control" aria-describedby="emailHelp" placeholder="Task Result" name="task_result" rows='5' required="required"></textarea>

											<input type="hidden" name="report_id" value="{{$report_id}}">
										</div>
									</div>				
								</div>

								<div class="row">

								</div>

								<div class="row">
									<div class="col-md-6 col-lg-12">
										<div class="form-group">
											<label for="email2">Task Challenges</label>
											<textarea class="form-control" aria-describedby="emailHelp" placeholder="Task Challenges" name="task_challenges" rows='5' required="required"></textarea>

										</div>
									</div>				
								</div>
							</div>
							<div class="mb-5 ml-auto mr-0 float-right ">
								<button type="submit" class="btn jatu-green white">Submit</button>
								{{-- <button class="btn jatu-orange white">Cancel</button>	 --}}
							</div>
						</form>
					@endif
				@else
				<br/>
				<div class="col-md-12">
					<div class="card full-height jatu-bd-orange">
						<div class="card-body" style="margin:20px;">
							<center><div class="card-title">
								Sorry! you don't have your weekly target first set week target
							</div></center>
							
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								
								<div class="px-2 pb-2 pb-md-0 text-center">
									<div id="" class="jatu-orange-c">
										<i class="fa fa-bullseye fa-5x"></i>
									</div>
									<a href="{{route('create-target')}}" class="btn jatu-orange white mt-3">
										<h6 class="fw-bold mt-0 mb-0">Click to Create Target</h6>
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