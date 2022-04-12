@extends('layouts.base')
@section('contents')
<div class="main-panel">
	<div class="content">
		<div class="panel-header">
			<div class="page-inner py-3">
				<div class="page-header">
					<h4 class="page-title orange">HR Reports</h4>
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
							<a href="#">HR Reports</a>
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
							<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Today's Report</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-profile" aria-selected="false">History Report</a>
						</li>
					</ul>
					<div class="tab-content mt-2 mb-3" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
							
							<!-- Modal -->
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Date Report</th>
											<th>Name</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
									<tfoot>

										<tr>
											<th>Date Report</th>
											<th>Name</th>
											<th style="width: 10%">Action</th>
										</tr>

									</tfoot>
									<tbody>
										
										@foreach($hr_reports_all as $staff_report_comment_status_0)
										@if($staff_report_comment_status_0->date == date('Y-m-d'))
										<tr>
											<td>{{ $staff_report_comment_status_0->date }}</td>
											<td>
												
												{{ $staff_report_comment_status_0->user->first_name }}

												{{ $staff_report_comment_status_0->user->last_name }}

											</td>
											
											<td>
												<div class="form-button-action">
													<a href="{{route('gm-hr-print-report-view',$staff_report_comment_status_0->id)}}">
													<i class="fa fa-eye jatu-orange-c ml-3"></i>
													</a>
												</div>
											</td>
										</tr>
										@endif
										@endforeach
										
									</tbody>
								</table>
							</div>
												
						</div>

						<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
							
							<!-- Modal -->
							<div class="table-responsive">
								<table id="add-row1" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Date Report</th>
											<th>Name</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
									<tfoot>

										<tr>
											<th>Date Report</th>
											<th>Name</th>
											<th style="width: 10%">Action</th>
										</tr>

									</tfoot>
									<tbody>

										
										
										@foreach($hr_reports_all as $report_comment_status_1)
										@if($report_comment_status_1->count()>=1)
										<tr>
											<td>{{ $report_comment_status_1->date }}</td>
											<td>
												
												{{ $report_comment_status_1->user->first_name }} {{ $report_comment_status_1->user->middle_name }}

												{{ $report_comment_status_1->user->last_name }}

											</td>
											<td>
												<div class="form-button-action">
													<a href="{{route('gm-hr-print-report-view',$report_comment_status_1->id)}}">
													<i class="fa fa-eye jatu-orange-c"></i>
													</a>
												</div>
											</td>
										</tr>
										@endif
										@endforeach
										
									</tbody>
								</table>
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
@endsection