@extends('layouts.base')

@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Departments</h4>
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
                                <a href="{{route('department-list')}}">Department</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Department List</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Departments List</h4>
									</div>									
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>#</th>
													<th>Fullname</th>
													<th>Short Form</th>
													<th>View staff</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>											
											<tbody>
                                                @foreach($dept_list as $dept)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{$dept->fullname}}</td>
													<td>{{$dept->short_form}}</td>
													<td>
													<a href="">
															<button type="button" data-toggle="tooltip" title=""  class="badge badge-pill jatu-green px-3 py-2 white ml-2" data-original-title="view">
															<a href="{{route('admin-viewing-staff',$dept->id)}}">
															<i class="fa fa-eye white"></i>
																</button>
															</a>
													</td>
													<td>
														<div class="form-button-action">
															<a href="{{route('edit-department',$dept->id)}}">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Department">
																<i class="fa fa-edit jatu-green-c"></i>
															</button>
															</a>
															<a href="{{route('delete-department',$dept->id)}}">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-trash"></i>
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