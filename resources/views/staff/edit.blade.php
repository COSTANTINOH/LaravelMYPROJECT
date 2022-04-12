@extends('layouts.base')

@section('contents')
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title orange">Task</h4>
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
						<a href="#">Create Task</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Create Task Form</a>
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
	<div class="card-title jatu-green-c">Total Task Created : <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-tasks black"></i>
		<span class="notification">({{$count_list}})</span>
	</a>

	<a href="{{ route('task-list') }}" class="jatu-orange-c">click here to see them</a>
	</div>
</div>
<form action="{{ route('task-form-edit',$task_data->id) }}" method="post">
	@csrf
	<div class="card-body">
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<div class="form-group">
					<label for="email2">Task Title</label>
					<input type="text" class="form-control" value="{{ $task_data->title }}" name="task_title" placeholder="Enter Task Title" required="required">
					
				</div>
			</div>

			<div class="col-md-6 col-lg-6">
				<div class="form-group">
					<label for="email2">Task Time Taken</label>
					<input type="text" min="1" max="9" class="form-control" value="{{ $task_data->time_taken }}" name="time_taken" placeholder="Enter Task Title" required="required">
					
				</div>
			</div>								
			
		</div>

		<div class="row">
			<div class="col-md-6 col-lg-6">
				<div class="form-group">
					<label for="email2">Task Descriptions</label>
					<textarea class="form-control" aria-describedby="emailHelp" placeholder="Task Desc" name="task_description" rows='5' required="required">{!! $task_data->description !!}</textarea>
				</div>
			</div>
			<div class="col-md-6 col-lg-6">
				<div class="form-group">
					<label for="email2">Task Result</label>
					<textarea class="form-control"  aria-describedby="emailHelp" placeholder="Task Result" name="task_result" rows='5' required="required">{!! $task_data->result !!}</textarea>
				</div>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-6 col-lg-12">
				<div class="form-group">
					<label for="email2">Task Challenges</label>
					<textarea class="form-control" aria-describedby="emailHelp" placeholder="Task Challenges" name="task_challenges" rows='5' required="required">{!! $task_data->challenge !!}</textarea>
					
				</div>
			</div>				
		</div>
	</div>
	<div class="mb-5 ml-auto mr-0 float-right ">
		<button class="btn jatu-green white">Edit</button>
		<button class="btn jatu-orange white">Cancel</button>
	</div>
</form>
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