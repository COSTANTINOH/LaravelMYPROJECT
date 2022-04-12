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
							<a class="nav-link active " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Roles</a>
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
														<h4 class="card-title">Details about user roles</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row" class="display table table-striped table-hover" >
															<tbody>                                                            
                                                             <ul>
                                                             <h4>Admin</h4>
                                                             <li>This role is  assigned to user who will be a system administrator</li></br>
                                                             <h4>Staff</h4>
                                                             <li>This role is assigned to a user who a user who will use a system as a normal staff </li></br>
                                                             <h4>Hod</h4>
                                                             <li>This role is assigned to a user who a user who will use a system as a head of department</li></br>
                                                             <h4>Bm</h4>
                                                             <li>This role is assigned to a user who a user who will use a system as a Branch manager</li></br>
                                                             <h4>Hr</h4>
                                                             <li>This role is assigned to a user who a user who will use a system as a Human resource manager</li></br>
                                                             <h4>Gm</h4>
                                                             <li>This role is assigned to a user who a user who will use a system as a General manager</li></br>
                                                             <h4>Ceo</h4>
                                                             <li>This role is assigned to a user who a user who will use a system as a Chief executive officer</li></br>
                                                             </ul>
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