@extends('layouts.base')
@section('contents')
<div class="main-panel">
	<div class="content">
		<div class="panel-header">
			<div class="page-inner py-5">
				<div class="page-header">
					<h4 class="page-title orange">Documentation</h4>
					<ul class="breadcrumbs">
						<li class="nav-home">
							<a href="#">
								<i class="flaticon-home"></i>
							</a>
						</li>			
					</ul>
		    	</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Use tab to view more documentation</h4>
				</div>
				<div class="card-body">
					<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Hr reports</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-profile" aria-selected="false">View staffs</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" id="pills-x-tabs" data-toggle="pill" href="#pills-x" role="tab" aria-controls="pills-profile" aria-selected="false">search reports</a>
						</li>
					</ul>
					<div class="tab-content mt-2 mb-3" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">To view Hr reports</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row" class="display table table-striped table-hover" >
														<tbody>
															1. Click the Hr Report button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/gmhr.PNG') }}"><br><br>
                                                            2. Once a submenu opens you will see view Hr reports option which will bring a table holding hr reports.<br>
															<img src="{{ asset('img/documentation/gmhrs.PNG') }}"><br><br>
															3. From that table you can view the reports respectivel.<br>
															<img src="{{ asset('img/documentation/gmhh.PNG') }}"><br><br>  
														</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
							<div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">Creating a task</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
															<tbody>
															1. Click the staff button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/gm-staff.PNG') }}"><br><br>
                                                            2. Once a submenu opens you will see view department option. Click it and a table holding list of departments will appear.<br>
															<img src="{{ asset('img/documentation/gm-dept.PNG') }}"><br><br>
															3. From the table holding the list of departments select action button on the action column to view staffs of a respective department.<br>
															<img src="{{ asset('img/documentation/hr-dept.PNG') }}"><br><br>  
														</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
			 			</div>
                         <div class="tab-pane fade" id="pills-x" role="tabpanel" aria-labelledby="pills-contact-tab">
							<div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">Searching a Report</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
														<tbody>
															1. Click the Report button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/gm-rep.PNG') }}"><br><br>
                                                            2. Once a submenu opens you will see view reports option.<br>
															<img src="{{ asset('img/documentation/gm-rep-view.PNG') }}"><br><br>
															3. From the form you can search different types of reports and view them .<br>
															<img src="{{ asset('img/documentation/gm-rep-see.PNG') }}"><br><br>  
														</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
			 			</div>
				 </div>
			</div>
		</div>
	</div>
	<footer class="footer mt-5" style="bottom:3;">
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