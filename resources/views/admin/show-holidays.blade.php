@extends('layouts.base')

@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Holidays</h4>
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
                                <a href="{{route('holiday-list')}}">Holiday</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Holiday List</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Holiday List</h4>
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
													<th>Holiday Name</th>
													<th>Date</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>											
											<tbody>
                                                @foreach($holiday_list as $loc)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{$loc->name}}</td>
													<td>{{$loc->date}}</td>
													<td>
														<div class="form-button-action">
															<a href="{{route('edit-holiday',$loc->id)}}">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Holiday">
																<i class="fa fa-edit jatu-green-c"></i>
															</button>
															</a>
															<a href="{{route('delete-holiday',$loc->id)}}">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove Holiday">
																<i class="fa fa-trash"></i>
															</button>
															</a>
															
															{{-- @foreach($d as $datez) --}}
															
																@if(in_array($loc->date, $rep_hol))
																
																@else
																<a href="{{route('aprroval-holiday',$loc->id)}}" >
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-link jatu-green-c" data-original-title="Holiday Approval">
																		<i class="fa fa-check"></i>
																	</button>
																</a>
																@endif
															{{-- @endforeach --}}
															
															
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