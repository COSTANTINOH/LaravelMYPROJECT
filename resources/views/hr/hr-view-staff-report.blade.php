@extends('layouts.base')
@section('contents')
<div class="main-panel">
	<div class="content">
		<div class="panel-header">
			<div class="page-inner py-3">
				<div class="page-header">
						<h4 class="page-title orange">Staff Reports</h4>
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
								<a href="#">View Reports</a>
							</li>
						</ul>
					</div>
			  </div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Use tab to shift between report states</h4>
				</div>
				<div class="card-body">
					<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Today's Reports</a>
						</li>
							<li class="nav-item">
							<a class="nav-link" id="pills-commentback-tab" data-toggle="pill" href="#pills-commentback" role="tab" aria-controls="pills-commentback" aria-selected="true">Commented Back Reports</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-profile" aria-selected="false">History</a>
						</li>
					</ul>
					<div class="tab-content mt-2 mb-3" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
							{{-- <div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">Pending Reports</h4>
													</div>
												</div>
												<div class="card-body"> --}}
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row" class="display table table-striped table-hover" >
															<thead>
																<tr>
																	<th>Name</th>
																	<th>Date Report</th>
																	<th>Time Sent</th>
																	<th>Report Status</th>
																	<th>Hod Report Status</th>
																	<th style="width: 10%">Action</th>
																</tr>
															</thead>
														
															<tbody>
																@foreach($staff_reports_today as $staff_report_comment_status_0)
																<tr>
																	@if($staff_report_comment_status_0 == [])
																	<td></td>
																	@else
																	<td>{{$staff_report_comment_status_0->user->first_name}} 
																		{{$staff_report_comment_status_0->user->last_name}}
																	</td>
																	@endif
																	<td>{{ $staff_report_comment_status_0->date }}</td>
																	<td>{{ $staff_report_comment_status_0->time_sent }}</td>
																	<td>
																		@if($staff_report_comment_status_0->status == 0)
																		<i class="fa fa-clock"> Late </i>
																		@else
																		<i class="fa fa-clock"> On Time</i>
																		@endif
																	</td>
																	<td>
																		@if($staff_report_comment_status_0->status_comment == 0)
																		<i class="fa fa-times-circle"> Not Commented</i>
																		@else
																		<i class="fa fa-check-circle"> Commented </i>
																		@endif
																	</td>
																	<td>
																		<div class="form-button-action">
																			<a href="{{route('hr-report-view',$staff_report_comment_status_0->id)}}">
																			<i class="fa fa-eye jatu-orange-c ml-3"></i>
																			</a>
																		</div>
																	</td>
																</tr>
																@endforeach
															</tbody>
														</table>
													</div>
												{{-- </div>
											</div>
										</div>
									</div>
								</div>
							</div> --}}
						</div>
						
							<div class="tab-pane fade" id="pills-commentback" role="tabpanel" aria-labelledby="pills-commentback-tab">
							{{-- <div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">Commented Back Reports</h4>
													</div>
												</div>
												<div class="card-body"> --}}
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
															<thead>
																<tr>
																	<th>Name</th>
																	<th>Date Report</th>
																	<th>Time Sent</th>
																	<th>Report Status</th>
																	<th>Report Comment Status</th>
																	<th style="width: 10%">Action</th>
																</tr>
															</thead>
															<tfoot>
																<tr>
																	<th>Name</th>
																	<th>Date Report</th>
																	<th>Time Sent</th>
																	<th>Report Status</th>
																	<th>Report Comment Status</th>
																	<th style="width: 10%">Action</th>
																</tr>
															</tfoot>
															<tbody>
																@foreach($staff_reports_comments_back as $report_comment_status_1)
																<tr>
																	@if($report_comment_status_1 == [])
																	<td></td>
																	@else
																	<td>{{$report_comment_status_1->user->first_name}} 
																		{{$report_comment_status_1->user->last_name}}
																	</td>
																	@endif
																	<td>{{ $report_comment_status_1->date }}</td>
																	<td>{{ $report_comment_status_1->time_sent }}</td>
																	<td>
																		@if($report_comment_status_1->status == 0)
																		<i class="fa fa-clock"> Late </i>
																		@else
																		<i class="fa fa-clock"> On Time</i>
																		@endif
																	</td>
																	<td>
																		@if($report_comment_status_1->status_comment == 2)
																		<i class="fa fa-thumbs-up"> Received </i>
																		@else
																		<i class="fa fa-thumbs-down"> Problem</i>
																		@endif
																	</td>
																	<td>
																		<div class="form-button-action">
																			<a href="{{route('hr-report-view',$report_comment_status_1->id)}}">
																			<i class="fa fa-eye jatu-orange-c ml-3"></i>
																			</a>
																		</div>
																	</td>
																</tr>
																@endforeach
															</tbody>
														</table>
													</div>
												{{-- </div>
											</div>
										</div>
									</div>
								</div>
							</div> --}}
			 			</div>
						<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
							{{-- <div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">Commented Back Reports</h4>
													</div>
												</div>
												<div class="card-body"> --}}
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
															<thead>
																<tr>
																	<th>Name</th>
																	<th>Date Report</th>
																	<th>Time Sent</th>
																	<th>Report Status</th>
																	<th>Report Comment Status</th>
																	<th style="width: 10%">Action</th>
																</tr>
															</thead>
															<tfoot>
																<tr>
																	<th>Name</th>
																	<th>Date Report</th>
																	<th>Time Sent</th>
																	<th>Report Status</th>
																	<th>Report Comment Status</th>
																	<th style="width: 10%">Action</th>
																</tr>
															</tfoot>
															<tbody>
																@foreach($staff_reports_comments as $report_comment_status_1)
																<tr>
																	@if($report_comment_status_1 == [])
																	<td></td>
																	@else
																	<td>{{$report_comment_status_1->user->first_name}} 
																		{{$report_comment_status_1->user->last_name}}
																	</td>
																	@endif
																	<td>{{ $report_comment_status_1->date }}</td>
																	<td>{{ $report_comment_status_1->time_sent }}</td>
																	<td>
																		@if($report_comment_status_1->status == 0)
																		<i class="fa fa-clock"> Late </i>
																		@else
																		<i class="fa fa-clock"> On Time</i>
																		@endif
																	</td>
																	<td>
																		@if($report_comment_status_1->status_comment == 2)
																		<i class="fa fa-thumbs-up"> Received </i>
																		@else
																		<i class="fa fa-thumbs-down"> Problem</i>
																		@endif
																	</td>
																	<td>
																		<div class="form-button-action">
																			<a href="{{route('hr-report-view',$report_comment_status_1->id)}}">
																			<i class="fa fa-eye jatu-orange-c ml-3"></i>
																			</a>
																		</div>
																	</td>
																</tr>
																@endforeach
															</tbody>
														</table>
													</div>
												{{-- </div>
											</div>
										</div>
									</div>
								</div>
							</div> --}}
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