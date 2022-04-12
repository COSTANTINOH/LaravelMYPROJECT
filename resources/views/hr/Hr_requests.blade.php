@extends('layouts.base')
@section('contents')
<div class="main-panel">			
	<div class="content">
		<div class="col-md-12">
			<div class="page-header">
				<h4 class="page-title orange">Staff Request</h4>
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
						<a href="#">Permission Request</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">View Requests</a>
					</li>
				</ul>
			</div>
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						List of Staff Request
					</div>
					<div style="float: right;">
					</div>
				</div>
				<div class="card-body">
					<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pending Request</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-history-tab" data-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="false">Other Departments</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" id="pills-history-tab" data-toggle="pill" href="#pills-history-hr" role="tab" aria-controls="pills-history" aria-selected="false">Request History</a>
						</li>
					</ul>
					<div class="tab-content mt-2 mb-3" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
							
							<!-- Modal -->
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Staff Name</th>
											<th>Request</th>
											<th>Application Date</th>								
											<th>Date From</th>
											<th>Date To</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>   @foreach($request as $req)   
											<tr>
												<td>{{App\User::find($req->staff_id)->first_name}} {{App\User::find($req->staff_id)->last_name}}</td>
												<td>{!!Str::limit(strip_tags($req->request), 10,$end='.....')!!}
												<td>{{$req->created_at}}</td>
												<td>{{$req->date_from}}</td>
                                                <td>{{$req->date_to}}</td>
												<td>
													<a href="{{route('view-request',$req->id)}}" >
														<i class="fa fa-eye jatu-orange-c"></i>
													</a>
												</td>
												
										 	</tr>
				                             @endforeach
									</tbody> 
								</table> 
							</div>
												
						</div>
						<div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
							
							<!-- Modal -->
							<div class="table-responsive">
								<table id="add-row1" class="display table table-striped table-hover" >
                                <thead>
										<tr>
											<th>Staff Name</th>
											<th>Request</th>
											<th>Application Date</th>								
											<th>Date From</th>
											<th>Date To</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									           @foreach($other_request as $request)
											<tr>
												<td>{{App\User::find($request->staff_id)->first_name}} {{App\User::find($request->staff_id)->last_name}}</td>
												<td>{!!Str::limit(strip_tags($request->request), 10,$end='.....')!!}
												<td>{{$request->created_at}}</td>
												
												@if($request->date_from != '2000-01-01')
												<td>{{$request->date_from}}</td>
												<td>{{$request->date_to}}</td>
												@elseif($request->date_from == '2000-01-01')
												<td>--</td>
												<td>--</td>
												@endif

												<td>
													<a href="{{route('view-request',$request->id)}}" >
														<i class="fa fa-eye jatu-orange-c"></i>
													</a>
												</td>
										 	</tr>
											 @endforeach
									</tbody> 
								</table> 
							</div>
												
					    </div>

                        <div class="tab-pane fade" id="pills-history-hr" role="tabpanel" aria-labelledby="pills-history-tab">
							
							<!-- Modal -->
							<div class="table-responsive">
								<table id="add-row3" class="display table table-striped table-hover" >
                                <thead>
										<tr>
											<th>Staff Name</th>
											<th>Request</th>
											<th>Application Date</th>								
											<th>Date From</th>
											<th>Date To</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach($history_request as $history)
											<tr>
											    <td>{{App\User::find($history->staff_id)->first_name}} {{App\User::find($history->staff_id)->last_name}}</td>
												<td>{!!Str::limit(strip_tags($history->request), 10,$end='.....')!!}
												<td>{{$history->created_at}}</td>

												@if($history->date_from != '2000-01-01')
												<td>{{$history->date_from}}</td>
												<td>{{$history->date_to}}</td>
												@elseif($history->date_from == '2000-01-01')
												<td>--</td>
												<td>--</td>
												@endif

												<td>
													<a href="{{route('view-request',$history->id)}}" >
														<i class="fa fa-eye jatu-orange-c"></i>
													</a>
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