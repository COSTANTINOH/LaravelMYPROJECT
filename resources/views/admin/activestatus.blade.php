@extends('layouts.base')

@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Staff</h4>
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
                                <a href="{{route('branch-list')}}">Users</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">User List</a>
							</li>
						</ul>
					</div>
					<div class="row">

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Users List</h4>
									</div>									
									
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									
									<div class="table-responsive">
                                    @if (session('status-okay'))
												<script>
											//== Class definition
											var SweetAlert2Demo = function() {

												//== Demos
												var initDemos = function() {

													$(document).ready( function () {
														swal(" {{ Session::get('status-okay') }}", "Click Anywhere in Screen to close", {
															icon : "success",
															buttons: {        			
																confirm: {
																	className : 'btn btn-success'
																}
															},
														});
													});
												};

												return {
													//== Init
													init: function() {
														initDemos();
													},
												};
											}();
											//== Class Initialization
											jQuery(document).ready(function() {
												SweetAlert2Demo.init();
											});
										</script>
                                                @endif 
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Full Name</th>
													<th>Email</th>
                                                    <th>status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>											
											<tbody>
                                            @foreach($users as $detail)
												    <tr>
													<td>{{$detail->first_name}} {{$detail->middle_name}} {{$detail->last_name}}</td>
													<td>{{$detail->email}}</td>
                                                    <td>
                                                     @if($detail->active == 1) 
                                                     Active
                                                     @elseif($detail->active == 0) 
                                                     Not active
                                                     @endif
                                                    </td>
                                                    <td>
                                                    @if($detail->active == 1) 
                                                    <a href="{{route('statuschange',$detail->id)}}">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Change user status">
                                                        <i class="fa fa-lock jatu-orange-c"></i>
                                                    </button>
                                                    </a>
                                                     @elseif($detail->active == 0) 
                                                     <a href="{{route('statuschange',$detail->id)}}">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Change user status">
                                                        <i class="fa fa-unlock jatu-green-c"></i>
                                                    </button>
                                                    </a>
                                                     @endif



                                                    
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