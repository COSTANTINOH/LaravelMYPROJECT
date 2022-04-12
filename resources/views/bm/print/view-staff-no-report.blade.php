@extends('layouts.base')
@section('contents')
<div class="main-panel">
			{{-- <div class="content">
				<div class="panel-header">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="orange pb-2 fw-bold">Dashboard</h2>
								<h5 class="orange op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Overall statistics</div>
									<div class="card-category">Daily information about statistics in system</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">Total Reports Submited</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Pending Tasks</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Subscribers</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Total income & spend statistics</div>
									<div class="row py-3">
										<div class="col-md-4 d-flex flex-column justify-content-around">
											<div>
												<h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
												<h3 class="fw-bold">$9.782</h3>
											</div>
											<div>
												<h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
												<h3 class="fw-bold">$1,248</h3>
											</div>
										</div>
										<div class="col-md-8">
											<div id="chart-container">
												<canvas id="totalIncomeChart"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div> --}}
            
            <div class="content">
				
                <div class="col-md-12">
					<div class="page-header">
						<h4 class="page-title">Print Reports</h4>
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
								<a href="#">Staff Reports</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Reports</a>
							</li>
						</ul>
					</div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h2 class="card-title">{{$message}} From {{$from}} TO {{$to}}</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(!empty($report_with_reason_id))
                        	<div style="float: right;margin: 10px;">
                            	@if($yes == 1)
                            	  <a href="{{ route('bm-report-print-preview',['datefrom' => $from, 'dateto' => $to])}}">
                            		<button class="btn jatu-green white" style="margin-right: 10px"> <i class="fa fa-print"></i> Print</button>
                            	</a>
                            	@else

                            	@endif
                            </div>
                        	@if(empty($message))
                        	<h3 class="jatu-orange-c">Staff Who Didn't Write Report With Approval</h3>
                        	@else
                        	<h3 class="jatu-orange-c">{{$message}}</h3>
                        	@endif


                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Approval</th>
											<th>Time Sent</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($report_with_reason_id as $report_with_reason_id)
                                        <tr>
                                        <td>{{$report_with_reason_id->user->first_name}} {{$report_with_reason_id->user->last_name}}</td>
                                        <td>{{$report_with_reason_id->user->email}}</td>
                                        <td>
                                        	
                                        	@foreach($report_with_reason_id->user->phones as $user_no)
                                        	 {{$user_no->phone}}
                                        	@endforeach

                                        </td>
                                        <td>
                                        	
                                        @if($report_with_reason_id->approval_status  == 1)
                                        	<i class="fa fa-check"></i>
                                        @else
                                        	<!-- <i class="fa fa-times"></i> -->
                                        @endif

                                        </td>
                                        <td>{{$report_with_reason_id->time_sent}}</td>
                                        <td>
                                        	<div class="form-button-action">

                                        		<a href="{{route('bm-hod-print-report-view',$report_with_reason_id->id)}}">
                                        			<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Report">
                                        				<i class="fa fa-eye"></i>
                                        			</button>
                                        		</a>	
                                      	</div>
                                        </td>
                                        </tr> 
                                        @endforeach      
                                    </tbody> 
                                </table>
                                
                            </div>
                            @else

                            @endif
                        </div> 

                       @if(!empty($user_no_report))
                       	 <div class="card-body">
                       	 	 <div style="float: right;margin: 10px;">
                            	@if($yes == 1)
                            	  <a href="{{ route('bm-report-print-staff-preview',['datefrom' => $from, 'dateto' => $to])}}">
                            		<button class="btn jatu-green white" style="margin-right: 10px"> <i class="fa fa-print"></i> Print</button>
                            	</a>
                            	@else

                            	@endif
                            </div>
                        	<h3 class="jatu-orange-c">Staff Who Didn't Write Report Without Approval</h3>
                            <div class="table-responsive">
                                <table id="add-row1" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Approval</th>
											<th>Time Sent</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user_no_report as $user_no_report)
                                        <tr>
                                        <td>{{$user_no_report->first_name}} {{$user_no_report->last_name}}</td>
                                        <td>{{$user_no_report->email}}</td>
                                        <td>
                                        	
                                        	@foreach($user_no_report->phones as $user_no)
                                        	 {{$user_no->phone}}
                                        	@endforeach

                                        </td>
                                        <td>
                                        	
                                         @if($user_no_report->approval_status  == 1)
                                        	<i class="fa fa-check"></i>
                                        @else
                                        	<i class="fa fa-times"></i>
                                        @endif

                                        </td>
                                        <td>N/A</td>
                                        <td>
                                        	<div class="form-button-action">

                                        		<a href="{{route('view-staff',$user_no_report->id)}}">
                                        			<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Profile">
                                        				<i class="fa fa-eye"></i>
                                        			</button>
                                        		</a>	
                                      	</div>
                                        </td>
                                        </tr> 
                                        @endforeach      
                                    </tbody> 
                                </table>
                                
                            </div>
                        </div>
                       @else

                       @endif
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