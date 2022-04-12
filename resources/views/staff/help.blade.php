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
							<a class="nav-link active " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Setting a target</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-profile" aria-selected="false">Creating a task</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" id="pills-x-tabs" data-toggle="pill" href="#pills-x" role="tab" aria-controls="pills-profile" aria-selected="false">Edit task</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-xd-tab" data-toggle="pill" href="#pills-xd" role="tab" aria-controls="pills-profile" aria-selected="false">Submiting report</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-xds-tab" data-toggle="pill" href="#pills-xds" role="tab" aria-controls="pills-profile" aria-selected="false">Sending opinion</a>
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
														<h4 class="card-title">How to set weekly target</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row" class="display table table-striped table-hover" >
															<tbody>                                                            
															1. Click the weekly target button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/weekly.PNG') }}"><br><br>
														    2. once a submenu is open you will view two options.
															click create target which will open a form which allows you to set your weekly target<br>
															<img src="{{ asset('img/documentation/opt.PNG') }}"><br>  
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
														<h4 class="card-title">How to create a task</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
															<tbody>
															1. Click the task button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/task.PNG') }}"><br><br>
														    2. once a submenu is open you will view two options.
															click create task which will open a form which allows you to fill yoyr tasks<br>
															<img src="{{ asset('img/documentation/opt-task.PNG') }}"><br>  
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
														<h4 class="card-title">How to edit a task before submission</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
															<tbody>
															1. Click the task button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/task.PNG') }}"><br><br>
														    2. once a submenu is open you will view two options.
															click create task which will open a form which allows you to fill your tasks<br>
															<img src="{{ asset('img/documentation/edit.PNG') }}"><br><br>
															3. A table with a list of your task will appear. from it on the action column click an action icon on the row with a respective task and the task to be edited will open. 
															<img src="{{ asset('img/documentation/editing-table.PNG') }}"><br><br>
															<tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
			 			</div>

						 <div class="tab-pane fade" id="pills-xd" role="tabpanel" aria-labelledby="pills-contact-tab">
							<div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">How to edit a task before submission</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
															<tbody>
															1. Click the task button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/task.PNG') }}"><br><br>
														    2. once a submenu is open you will view two options.
															click create task which will open a form which allows you to fill your tasks<br>
															<img src="{{ asset('img/documentation/edit.PNG') }}"><br><br>
															3. A table with a list of your task will appear. from it on the top right corner there is a green button to preview. Click it and a page to submit your report will appear. 
															<img src="{{ asset('img/documentation/submit.PNG') }}"><br><br>
															<tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
			 			</div>
						 <div class="tab-pane fade" id="pills-xds" role="tabpanel" aria-labelledby="pills-contact-tab">
							<div class="content">
								<div class="page-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-header">
													<div class="d-flex align-items-center">
														<h4 class="card-title">How to send opinions/suggestions</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
															<tbody>
															1. Click the opinion button on the leftside navigation bar to open a submenu.<br>
															<img src="{{ asset('img/documentation/opinion.PNG') }}"><br><br>
														    2. once a submenu is open you will view two options.
															click create write opinions/suggestions which will open a form which allows you to fill your opinions/suggestions and send them<br>
															<img src="{{ asset('img/documentation/sendopinion.PNG') }}"><br><br>
															<tbody>
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