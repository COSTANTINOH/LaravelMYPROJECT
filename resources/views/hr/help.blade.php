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
							<a class="nav-link active " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">staff reports</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-profile" aria-selected="false">Hod reports</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" id="pills-x-tabs" data-toggle="pill" href="#pills-x" role="tab" aria-controls="pills-profile" aria-selected="false">Creating a Report</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-xdw-tabs" data-toggle="pill" href="#pills-xdw" role="tab" aria-controls="pills-profile" aria-selected="false">View staff</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-xdt-tabs" data-toggle="pill" href="#pills-xdt" role="tab" aria-controls="pills-profile" aria-selected="false">staff Approval</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-xda-tabs" data-toggle="pill" href="#pills-xda" role="tab" aria-controls="pills-profile" aria-selected="false">all reports</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-xdz-tabs" data-toggle="pill" href="#pills-xdz" role="tab" aria-controls="pills-profile" aria-selected="false">opinions</a>
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
														<h4 class="card-title">How to view staff reports</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row" class="display table table-striped table-hover" >
															<tbody>  
															1. Click the staff reports button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/hr-staff-report.PNG') }}"><br><br>                                                        
                                                            2. Click the view reports button on the leftside navigation bar to open a submenu. which will open a table holding list of reports<br>
															<img src="{{ asset('img/documentation/hr-staff-report-view.PNG') }}"><br><br>                                                          
															3. From the table holding list of reports click an action button on the action column to view respective report<br>
															<img src="{{ asset('img/documentation/hr-rep.PNG') }}"><br><br>                                                          
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
														<h4 class="card-title">Hod to view hod reports</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
															<tbody>
															1. Click the Hod's reports button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/hr-staff-report.PNG') }}"><br><br>
                                                            2. Once a submenu opens you will see view reports option. click it and a table holding reports will appear.<br>
															<img src="{{ asset('img/documentation/hr-see.PNG') }}"><br><br> 
															3. From the table holding a list of reports you will see an action column and will hold a button. Click it to view reports respectively.<br>
															<img src="{{ asset('img/documentation/hr-see-hod.PNG') }}"><br><br>
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
														<h4 class="card-title">How to create a Report</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
														<tbody>
															1. Click the Hod's reports button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/hr-create.PNG') }}"><br><br>
                                                            2. Once a submenu opens you will see create reports option. click it and a form to write a report will appear.<br>
															<img src="{{ asset('img/documentation/hr-create-rep.PNG') }}"><br><br> 
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
						 <div class="tab-pane fade" id="pills-xdw" role="tabpanel" aria-labelledby="pills-contact-tab">
							<div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">How to view staffs</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
														<tbody>
															1. Click the staff button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/hr-staff.PNG') }}"><br><br>
                                                            2. Once a submenu opens you will see view staff option. Click it and a table holding list of departments will appear.<br>
															<img src="{{ asset('img/documentation/hr-staff-see.PNG') }}"><br><br>
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
						 <div class="tab-pane fade" id="pills-xdt" role="tabpanel" aria-labelledby="pills-contact-tab">
							<div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">How to make approval</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
														<tbody>
															1. Click the Approval button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/hr-approve.PNG') }}"><br><br>
                                                            2. Once a submenu opens you will see staff Approval option. Click it and and Approval form will appear .<br>
															<img src="{{ asset('img/documentation/hr-approves.PNG') }}"><br><br> 
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
						 <div class="tab-pane fade" id="pills-xda" role="tabpanel" aria-labelledby="pills-contact-tab">
							<div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">How to search reports</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
														<tbody>
															1. Click the Reports button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/hr-reps.PNG') }}"><br><br>
                                                            2. Once a submenu opens you will see view option. after clicking it a form to search a report will appear .And from it you will be able to search a report<br>
															<img src="{{ asset('img/documentation/hr-reps-opt.PNG') }}"><br><br> 
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
						 <div class="tab-pane fade" id="pills-xdz" role="tabpanel" aria-labelledby="pills-contact-tab">
							<div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">How to view opinions</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
														<tbody>
															1. Click opinion button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/hr-op.PNG') }}"><br><br>
                                                            2. Once a submenu opens you will see view opinions option. after clicking it a table holding opinions will appear. from the table on the action column there is an action button click it to view respective opinion<br>
															<img src="{{ asset('img/documentation/hr-op-sv.PNG') }}"><br><br> 
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