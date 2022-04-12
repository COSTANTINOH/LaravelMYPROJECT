@extends('layouts.base')
@section('contents')
<div class="main-panel">
	<div class="content">
		<div class="panel-header">
			<div class="page-inner py-3">
				<div class="page-header">
						<h4 class="page-title orange">Staff Reports</h4>
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
							<a href="{{route('permission_note')}}">Request Permission</a>
							</li>
						</ul>
					</div>
			  </div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Use tab to shift between request permission states</h4>
				</div>
				<div class="card-body">
					<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pending Request</a>
						</li>
							<li class="nav-item">
							<a class="nav-link" id="pills-commentback-tab" data-toggle="pill" href="#pills-commentback" role="tab" aria-controls="pills-commentback" aria-selected="true">Results</a>
						</li>
						</li>
							<li class="nav-item">
							<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-commentback" aria-selected="true">Request history</a>
						</li>
					</ul>
					<div class="tab-content mt-2 mb-3" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
							<!-- Modal -->
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Request</th>
											<th>From</th>
											<th>To</th>
											<th>status</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
									<tbody>
									@foreach($permission as $detail)
										<tr>
										<td>{!!Str::limit(strip_tags($detail->request), 10,$end='...')!!}</td>
											<td> {{$detail->date_from}} </td>
											<td> {{$detail->date_to}} </td>
											<td>
													@if($detail->hod_recommendation == "" AND $detail->hr_recommendation == "" )
													pending
													@endif
											</td>
											<td>
												<div class="form-button-action">
													<a href="{{route('view_request',$detail->id)}}">
													<i class="fa fa-eye jatu-orange-c"> </i>
													</a>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>					
						</div>
						<div class="tab-pane fade" id="pills-commentback" role="tabpanel" aria-labelledby="pills-commentback-tab">
							<!-- Modal -->
							<div class="table-responsive">
								<table id="add-row1" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Request</th>
											<th>From</th>
											<th>To</th>
											<th>status</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
									<tbody>
									@foreach($hod as $detailz)
										<tr>
										<td>{!!Str::limit(strip_tags($detailz->request), 10,$end='...')!!}</td>
											<td> {{$detailz->date_from}} </td>
											<td> {{$detailz->date_to}} </td>
											<td> hod   @if($detailz->date_from != '2000-01-01')<i class="fa fa-check"></i>@elseif($detailz->date_from == '2000-01-01')<i class="fa fa-times"></i>@endif </td>
											<td>
												<div class="form-button-action">
												<a href="{{route('view_request_hod',$detailz->id)}}">
													<i class="fa fa-eye jatu-orange-c"> </i>
													</a>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>					
			 			</div>
						 <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-commentback-tab">
							<!-- Modal -->
							<div class="table-responsive">
								<table id="add-row3" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Request</th>
											<th>From</th>
											<th>To</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
									<tbody>
									@foreach($hr as $item)
										<tr>
										<td>{!!Str::limit(strip_tags($item->request), 10,$end='...')!!}</td>
											@if($item->date_from != '2000-01-01')
											<td> {{$item->date_from}} </td>
											<td> {{$item->date_to}} </td>
											@elseif($item->date_from == '2000-01-01')
											<td></td>
											<td></td>
											@endif
											<td>
												<div class="form-button-action">
												<a href="{{route('request_history',$item->id)}}">
													<i class="fa fa-eye jatu-orange-c"> </i>
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