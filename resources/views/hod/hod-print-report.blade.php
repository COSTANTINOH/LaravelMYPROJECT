@extends('layouts.base')
@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Print Reports</h4>
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
								<a href="#">Print</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Advance Print Reports</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
								
									<div class="card-title">Multi Selection Report</div>
								</div>
								<form action="" method="post">
									
								<div class="card-body">

								<div class="row">
										<div class="col-md-6 col-lg-6">
											<div class="form-group">
												<label for="email2">Select Report Type..</label>
												<select class="form-control">
													<option value="">Select Report Type..</option>
													<option value="late_report">Late Report</option>
													<option value="on_time">On Time Report</option>
													<option value="individual">Individual</option>
													<option value="all_report">All Report</option>
												</select>
											</div>
										</div>	

													
									</div>
									
								 <div class="row">
										<div class="col-md-6 col-lg-6">
											<div class="form-group">
												<label for="email2">From Date</label>
												<input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Task Desc" name="task_description" rows='5' required="required">
											</div>
										</div>	

										<div class="col-md-6 col-lg-6">
											<div class="form-group">
												<label for="email2">To Date</label>
												<input type="date" name="" class="form-control" aria-describedby="emailHelp" placeholder="Task Result" name="task_result" rows='5' required="required">

												<input type="hidden" name="report_id" value="">
											</div>
										</div>				
									</div>

								</div>
								<div class="mb-5 ml-auto mr-0 float-right ">
									<button class="btn jatu-green white">Submit</button>
									<button class="btn jatu-orange white">Cancel</button>	
								</div>
							</form>
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