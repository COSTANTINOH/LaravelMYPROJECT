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
						@if(Session::get('success-bm'))								
								<script>
									var SweetAlert2Demo = function() {
										var initDemos = function() {
											$(document).ready( function () {
												swal(" {{ Session::get('success-bm') }}", "Click Anywhere in Screen to close", {
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
											init: function() {
												initDemos();
											},
										};
									}();

									jQuery(document).ready(function() {
										SweetAlert2Demo.init();
									});
									
									 setTimeout(function(){
                                        window.location.href = '/bm/bm-report-view';
                                     }, 5000);
								</script>
						@endif

						@if(Session::get('failed-bm'))
							<script>
								var SweetAlert2Demo = function() {
									var initDemos = function() {
										$(document).ready( function () {
											swal(" {{ Session::get('failed-bm') }}", "Click Anywhere in Screen to close", {
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
							<form action="{{route('bm-report-comment-send',$id)}}" method="POST">
								@csrf
								<div class="row">
										<div class="col-md-6 col-lg-12">
											<div class="form-group">
											<label for="bmComment">Please Provide Your Review Here {{$id}}</label>
												<textarea class="form-control" id="editor" aria-describedby="BM comment" placeholder="Task Result" name="comment_bm" rows='20' required="required"></textarea>
											</div>
										</div>				
									</div>

								<div class="mb-5 ml-auto mr-0 float-right ">

									<div aria-label="Basic example">
										<input type="radio" name="check" value="confirm">
										<label style="font-size:30px;color: black;font-weight: bold;">Confirm Received</label><br>
										<input type="radio" name="check" value="return">
										<label style="font-size:30px;color: black;font-weight: bold;">Return For Changes</label><br>
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
@endsection