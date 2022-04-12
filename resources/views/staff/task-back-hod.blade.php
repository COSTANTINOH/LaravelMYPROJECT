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
								<a href="#">Preview</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Preview Form</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Preview Tasks Form</div>
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

								<div class="pl-5 pr-5 mr-5 ml-5 font-jatu pb-5">

									<h4 class="orange" style="font-weight: bold;">Comment from HOD</h4>	

									@foreach($comment_hod as $comment_hod)
										<p style="font-size:15px;"> {!! $comment_hod !!} </p>
									@endforeach
									
									<div class="">										
										<a href="{{URL::to('list-edit-hod')}}\{{$id}}">
										<button class="btn jatu-orange white"><i class="fa fa-edit"></i> Edit</button>	
										</a>
									</div>
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
			<script>
        function checkComfirm() {
            var check = confirm('Once You Comfirm Send this Report You Cannot Send Any Task Again For Today...Are Sure You Want to Continue?');
            if(check){
                return true;
            }
            return false;
        }
    </script>
	@endsection