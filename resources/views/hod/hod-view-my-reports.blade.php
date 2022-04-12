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
							<div class="card-title">Preview Report</div>
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
						<?php //$today = date('N', time()); echo $today; ?> 
						<div class="card-body">
							<div class="row">
								@if($task->count()>=1)
								<div class="col-md-12 col-lg-12">
									<form action="{{route('hod-save-report')}}" method="POST">
										@csrf

										<div class="col-md-6 col-lg-6">
											<div class="form-group">
												<label for="report">Report Title:</label>
												<p>{{$task->title}}</p>
												
											</div>
										</div>
										<div class="form-group ml-3">
											<label for="target">Description</label>
											<!-- <input type="text" class="form-control" name="target" id="target" placeholder="Enter Your Weekly Target"> -->
											<!--<textarea name="report" id="editor" cols="30" rows="5" readonly></textarea>-->
											<p>{!!$task->description!!}</p>
										</div>	
									</form>										
								</div>


								@endif
							</div>
							<div style="margin: 20px;">
								@if(!($comment_hr->isEmpty()))
								<h4 class="orange" style="font-weight: bold;">Comment from HR</h4>	
								@foreach($comment_hr as $comment_hr)
								<p style="font-size:15px;"> {!! $comment_hr !!} </p>
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