@extends('layouts.base')
@section('contents')
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title orange">All Staffs</h4>
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
						<a href="{{route('ceo-view-departments')}}">Department</a>
						</li>
						<li class="separator">
							<i class="flaticon-right-arrow"></i>
						</li>
						<li class="nav-item">
							<a href="#">staff</a>
						</li>
				</ul>
			</div>
		
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4>All Staffs</h4>
							</div>
						</div>
						<div class="card-body">
							<div class="tab-content mt-2 mb-3" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
									{{-- <div class="content">
										<div class="page-inner">
											<div class="row">
												<div class="col-md-12">
													<div class="card">
														<div class="card-header">
															<div class="d-flex align-items-center">
																<h4 class="card-title">List of staff</h4>
															</div>
														</div>
														<div class="card-body"> --}}
															<!-- Modal -->
															<div class="table-responsive">
																<table id="add-row" class="display table table-striped table-hover" >
																	<thead>
																		<tr>
																			<th>Name</th>
																			<th>Email</th>
																			<th>Hod</th>
																			<th>Branch Manager</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tfoot>
																		<tr>
																			<th>Name</th>
																			<th>Email</th>
																			<th>Hod</th>
																			<th>Branch Manager</th>
																			<th>Action</th>
																		</tr>
																	</tfoot>
																	<tbody>
																	@foreach($staff as $name)                            
																	<tr>
																	<td>{{$name->first_name}} {{$name->middle_name}} {{$name->last_name}}</td>
																	<td>{{$name->email}}</td>
																	<td>
																	@if($name->role_id == 3)
																	<i class="fa fa-check ml-3" style="color:"></i>
																	@endif
																	</td>
																	<td>
																	@if($name->role_id == 4)
																	<i class="fa fa-check ml-3" style="color:"></i>
																	@endif
																	</td>
																	<td><a href="{{route('view-staff',$name->id)}}"><i class="fa fa-eye jatu-orange-c ml-3" style="color: white"></i></td>																																																																																													
																	@endforeach
																	</tr> 	
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