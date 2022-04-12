@extends('layouts.base')
@section('contents')
		<div class="main-panel">

			

			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Tasks Preview</h4>
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
								<a href="#">Preview</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
							<a href="{{ route('task-create') }}">Create Task</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title ignore">Preview Tasks</div>
								</div>

								<center style="margin-top: 0px;">
									<table style="margin:5px;">
										<img src="{{asset('/public/img/report2.png')}}" style="width: 623px; height:164px;" >									
								    </table>
								</center> 
								@csrf
								<div class="pl-5 pr-5 mr-5 ml-5 font-jatu">
									<div class="row">
										<div class="col-6">
											<h4 style="color:black;"><b>Staff Details</b></h4>
											<h6 style="color:black;"><b>Name:</b> {{Auth::user()->first_name." ".Auth::user()->middle_name." ".Auth::user()->last_name}}</h6>
											<h6 style="color:black;"><b>Department:</b> {{Auth::user()->ulbd->department->short_form}}</h6>
											<h6 style="color:black;"><b>Position:</b> {{Auth::user()->position->pname}}</h6>
											<h6 style="color:black;"><b>Phone:</b>
											@foreach (Auth::user()->phones as $phones)
												{{$phones->phone}}
											@endforeach
											</h6>
										</div>
										<div class="col-6">
											<p class="float-right">
												{{-- <b>REPORT DATE: </b>{{App\Report::find(request()->route('id'))->date}}												 --}}
											</p>
										</div>
									</div>
									<br>
									<h4 style="color:black;"><b>Weekly Target</b></h4>
								
									@foreach($target_name as $target_name)
										<h5 class="text-justify" style="color:black;margin-bottom:40px;">{!! $target_name !!}</h5>
									@endforeach



									@foreach($task_list as $key=>$task)
										<table>
											<tr>
												<h4 style="color:black;"><b>TASK:</b> {{ucwords($task->title)}} <b>({{$task->time_taken}})</b></h4>

												<p style="color:black;margin-bottom:10px;"> {!!nl2br($task->description)!!} </p>
												<table border="1" width="100%">
													<tr style="padding-left: 10px;">
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

									<div class="mb-5 ml-auto mr-0 float-right">
										<a id="alert_demo_8" >
											<button class="btn jatu-green white" ><i class="fa fa-paper-plane"></i> Confirm Submit</button>
										</a>
										<a href="{{route('task-list')}}">
											<button class="btn jatu-orange white"><i class="fa fa-edit"></i> Edit</button>	
										</a>
									</div>
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
			<script>
         function checkUser(){
            var check = confirm('Once You Comfirm Send this Report You Cannot Send Any Task Again For Today...Are Sure You Want to Continue?');
            if(check){
                return true;
            }
            return false;
        }
            	
          var SweetAlert2Demo = function() {

			//== Demos
			var initDemos = function() {
				//== Sweetalert Demo 1
				
				$('#alert_demo_8').click(function(e) {
					swal({
						title: 'Notification',
						text: "Once You Comfirm Send this Report You Cannot Send Any Task Again For Today...Are Sure You Want to Continue?",
						type: 'warning',
						buttons:{
							confirm: {
								text : 'Yes,Sent Report!',
								className : 'btn btn-success',
							},
							cancel: {
								visible: true,
								className: 'btn btn-danger'
							}
						}
					}).then((willDelete) => {
						if (willDelete) {
							window.location = "/comfirm-task-submision";
						} else {
							swal.close();
						}
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

	@endsection