@extends('layouts.base')
@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Report</h4>
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
								<a href="{{route('hod-view-my-report')}}">Report</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Read Report</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Read Report</div>
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
									{{-- <div class="row">
										<div class="col-md-12"> --}}
											<div class="card">
												{{-- <div class="card-header">
													<div class="card-title ignore">Preview Report</div>
												</div> --}}
				
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
				
													@foreach($task as $key=>$task)
														<table>
															<tr>
																<h4 style="color:black;"><b>TASK:</b> {{ucwords($task->title)}} </h4>
				
																<p style="color:black;margin-bottom:10px;"> {!!nl2br($task->description)!!} </p>
																							
															</tr>
														</table>
														<br><br>
													@endforeach
												</div>	
											
											</div>
										{{-- </div> --}}
										{{-- ffdfd --}}
									
									{{-- </div> --}}
									<!--Receive comment from -->						
									<div style="margin: 20px;">
										@if(!($comment_gm->isEmpty()))
										<h4 class="orange" style="font-weight: bold;">Comment from General Manager</h4>	
										@foreach($comment_gm as $comment_gm)
										<p style="font-size:15px;"> {!! $comment_gm !!} </p>
										@endforeach
										@endif
									</div>
								</div>
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