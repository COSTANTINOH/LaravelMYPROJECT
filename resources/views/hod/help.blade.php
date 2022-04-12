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
					<h4 class="card-title">Use tab to view more Documentation</h4>
				</div>
				<div class="card-body">
					<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"> Staff reports</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-profile" aria-selected="false">view staff</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" id="pills-x-tabs" data-toggle="pill" href="#pills-x" role="tab" aria-controls="pills-profile" aria-selected="false">Creating a Report</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-xk-tabs" data-toggle="pill" href="#pills-xk" role="tab" aria-controls="pills-profile" aria-selected="false">view opinion</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-xkl-tabs" data-toggle="pill" href="#pills-xkl" role="tab" aria-controls="pills-profile" aria-selected="false">print reports</a>
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
															<img src="{{ asset('img/documentation/staffrep.PNG') }}"><br><br>
															2. Once a submenu opens you will see reports button.Click it and a page with a table holding different reports will open<br>
															<img src="{{ asset('img/documentation/reps.PNG') }}"><br><br>
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
														<h4 class="card-title">How to view staff in your department</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
														<tbody>                                                            
                                                            1. Click the staffs button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/staff.PNG') }}"><br><br>
															2. Once a submenu opens you will see view staff button.Click it and a page with a table holding a list of your staff<br>
															<img src="{{ asset('img/documentation/staffview.PNG') }}"><br><br>
															3. From the table on the action column.Click action button of to view a profile of a respective staff<br>
															<img src="{{ asset('img/documentation/listofstaff.PNG') }}"><br><br>
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
														<h4 class="card-title">How to create a  Report</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
														<tbody>                                                            
                                                            1. Click My report button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/hodreports.PNG') }}"><br><br>
															2. Once a submenu opens you will see two options.Click create report and a page for you to write reports will open<br>
															<img src="{{ asset('img/documentation/hodcreate.PNG') }}"><br><br>
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
						 <div class="tab-pane fade" id="pills-xk" role="tabpanel" aria-labelledby="pills-contact-tab">
							<div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">How to view Opinions</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
														<tbody>                                                            
                                                            1. Click My report button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/hodopinion.PNG') }}"><br><br>
															2. Once a submenu opens you will see view opinion button.Click it and a page with table holding list of opinions will appear<br>
															<img src="{{ asset('img/documentation/hod-view-op.PNG') }}"><br><br> 
															3. From the table holding list of opinions there is an action button in the action column. Click it and you will view opinion respectively<br>
															<img src="{{ asset('img/documentation/hod-opinion-table.PNG') }}"><br><br>
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
						 <div class="tab-pane fade" id="pills-xkl" role="tabpanel" aria-labelledby="pills-contact-tab">
							<div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">How to print reports</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
														<tbody>                                                            
                                                            1. Click Print reports button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/hod-print.PNG') }}"><br><br>
															2. Once a submenu opens you will see a view reports button.Click it and a page with a form to search a report you want will appear<br>
															<img src="{{ asset('img/documentation/hod-printing.PNG') }}"><br><br> 
															3. From the table with the form you can search different reports accordingly and the report will appear with a printing option<br>
															<img src="{{ asset('img/documentation/hod-report-form.PNG') }}"><br><br>
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