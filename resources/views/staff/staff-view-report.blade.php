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
					<a href="#">Reports</a>
					</li>
				</ul>
			</div>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Use tab to shift between report states</h4>
				</div>
				<div class="card-body">
					<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Sent Back Reports</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-sent-tab" data-toggle="pill" href="#pills-sent" role="tab" aria-controls="pills-sent" aria-selected="false">Sent Reports</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-profile" aria-selected="false"> Report History</a>
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
														<h4 class="card-title">Commented Back Reports</h4>
													</div>
													<div style="float:right;">
													</div>
												</div>
												<div class="card-body"> --}}
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row" class="display table table-striped table-hover" >
															<thead>
																<tr>
																	<th>Report Date</th>
																	<th>Time Sent</th>
																	<th>Status</th>
																	<th>Status Comment</th>
																	<th style="width: 10%">Action</th>
																</tr>
															</thead>
															<tfoot>
																<tr>
																	<th>Report Date</th>
																	<th>Time Sent</th>
																	<th>Status</th>
																	<th>Status Comment</th>
																	<th style="width: 10%">Action</th>
																</tr>
															</tfoot>
															<tbody>
																@foreach($my_sent_reports_back as $my_reports)
																<tr>
																	<td>{{ $my_reports->date }}</td>
																	<td>{{ $my_reports->time_sent }}</td>
																	<td>
																		@if($my_reports->status == 0)
																		<i class="fa fa-clock"> Late </i>
																		@else
																		<i class="fa fa-clock"> On Time</i>
																		@endif
																	</td>
																	<td>
																		@if($my_reports->status_comment == 0)
																		<i class="fa fa-paper-plane"> Send </i>
																		@elseif($my_reports->status_comment == 1)
																		<i class="fa fa-thumbs-down"> Problem</i>
																        @else			
																    	<i class="fa fa-thumbs-up"> Received</i>
																		@endif
																	</td>
																	<td>
																		<div class="form-button-action">
																			<a href="{{route('staff-back-preview_report',$my_reports->id)}}">
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
						<div class="tab-pane fade" id="pills-sent" role="tabpanel" aria-labelledby="pills-sent-tab">
							{{-- <div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">Sents Reports</h4>
													</div>
													<div style="float:right;">
													</div>
												</div>
												<div class="card-body"> --}}
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
															<thead>
																<tr>
																	<th>Report Date</th>
																	<th>Time Sent</th>
																	<th>Status</th>
																	<th>Status Comment</th>
																	<th style="width: 10%">Action</th>
																</tr>
															</thead>
															<tfoot>
																<tr>
																	<th>Report Date</th>
																	<th>Time Sent</th>
																	<th>Status</th>
																	<th>Status Comment</th>
																	<th style="width: 10%">Action</th>
																</tr>

															</tfoot>
															<tbody>
																@foreach($my_sent_reports_sent as $my_reports)
																<tr>
																	<td>{{ $my_reports->date }}</td>
																	<td>{{ $my_reports->time_sent }}</td>
																	<td>
																		@if($my_reports->status == 0)
																		<i class="fa fa-clock"> Late </i>
																		@else
																		<i class="fa fa-clock"> On Time</i>
																		@endif
																	</td>
																	<td>
																		@if($my_reports->status_comment == 0)
																		<i class="fa fa-paper-plane"> Sent </i>
																		@elseif($my_reports->status_comment == 1)
																		<i class="fa fa-thumbs-down"> Problem</i>
																        @else			
																    	<i class="fa fa-thumbs-up"> Received</i>
																		@endif
																	</td>
																	<td>
																		<div class="form-button-action">
																			<a href="{{route('staff-preview_report',$my_reports->id)}}">
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
						<div class="tab-pane fade" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
							{{-- <div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">All reports</h4>
													</div>
													<div style="float:right;">
													</div>
												</div>
												<div class="card-body"> --}}
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row2" class="display table table-striped table-hover" >
															<thead>
																<tr>
																	<th>Report Date</th>
																	<th>Time Sent</th>
																	<th>Status</th>
																	<th>Status Comment</th>
																	<th style="width: 10%">Action</th>
																</tr>
															</thead>
															<tfoot>
																<tr>
																	<th>Report Date</th>
																	<th>Time Sent</th>
																	<th>Status</th>
																	<th>Status Comment</th>
																	<th style="width: 10%">Action</th>
																</tr>
															</tfoot>
															<tbody>
																@foreach($my_sent_reports as $my_reports)
																<tr>
																	<td>{{ $my_reports->date }}</td>
																	<td>{{ $my_reports->time_sent }}</td>
																	<td>
																		@if($my_reports->status == 0)
																		<i class="fa fa-clock"> Late </i>
																		@else
																		<i class="fa fa-clock"> On Time</i>
																		@endif
																	</td>
																	<td>
																		@if($my_reports->status_comment == 0)
																		<i class="fa fa-paper-plane"> Send </i>
																		@elseif($my_reports->status_comment == 1)
																		<i class="fa fa-thumbs-down"> Problem</i>
																        @else			
																    	<i class="fa fa-thumbs-up"> Received</i>
																		@endif
																	</td>
																	<td>   
																		<div class="form-button-action">
																			<a href="{{route('staff-preview_report',$my_reports->id)}}">
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
@endsection