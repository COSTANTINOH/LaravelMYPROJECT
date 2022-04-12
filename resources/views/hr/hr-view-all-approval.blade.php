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
						<h4 class="page-title orange">Staff Approval</h4>
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
								<a href="#">Approval Approved</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">View Approvals</a>
							</li>
						</ul>
					</div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                               List of Approved
                            </div>
                            <div style="float: right;">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
										<th>Reason</th>
										<th>Date</th>
										<th>Staff Name</th>
										<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($approval as $approval)
                                        <tr>
                                        <td>{!!Str::limit(strip_tags($approval->reason), 80,$end='.....')!!}</td>
                                        <td>{{$approval->date}}</td>
                                        <td>
                                        	
                                        	{{$approval->user->first_name}} {{$approval->user->last_name}}

                                        </td>
                                        <td>
                                        	<div class="form-button-action">
											<a href="{{route('hr-view-approval-single',$approval->id)}}">
											<i class="fa fa-eye jatu-orange-c ml-3"></i>
											</a>	
                                      	</div>
                                        </td>
                                        </tr> 
                                        @endforeach      
                                    </tbody> 
                                </table> 
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