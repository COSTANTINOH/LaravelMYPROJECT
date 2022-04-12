@extends('layouts.base')
@section('contents')
<div class="main-panel">
	<div class="content">
		<div class="panel-header">
			<div class="page-inner py-5">
				<div class="page-header">
						<h4 class="page-title orange">Staff Opinion</h4>
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
					<h4 class="card-title">Use tab to shift between opinion statuses</h4>
				</div>
				<div class="card-body">
					<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Unread opinion</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-profile" aria-selected="false">Read opinion</a>
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
														<h4 class="card-title">staff opinions</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row" class="display table table-striped table-hover" >
															<thead>
																{{-- <tr>
																	<th>Date</th>
																	<th>Opinion</th>
																	<th>Opinion Status</th>
																	<th style="width: 10%">Action</th>	
																</tr> --}}
															</thead>
															<tfoot>
																{{-- <tr>
																	<th>Date</th>
																	<th>Opinion</th>
																	<th>Opinion Status</th>
																	<th style="width: 10%">Action</th>
																</tr> --}}

															</tfoot>
															<tbody>
                                                            {{-- @foreach ($op as $opinion)
                                                            @if($opinion->status == 1 || $opinion->status == 0)
                                                            <tr>
                                                            <td>{{$opinion->date}}</td>
                                                            <td>{!!Str::limit(strip_tags($opinion->description), 80,$end='.....')!!}</td>
                                                            <td><i class="fa fa-thumbs-down"> Not read </i></td>	
                                                            <td><a href="{{route('hr-view-full',$opinion->id)}}" class="badge badge-pill jatu-green px-3 py-2" ><i class="fa fa-eye" style="color: white"></i></td>																																																		
                                                            </tr> 
                                                            @endif
                                                            @endforeach		 --}}
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
														<h4 class="card-title"> staff opinion</h4>
													</div>
												</div>
												<div class="card-body">
													<!-- Modal -->
													<div class="table-responsive">
														<table id="add-row1" class="display table table-striped table-hover" >
															<thead>
																<tr>
																	{{-- <th>Date</th>
																	<th>Opinion</th>
																	<th>Opinion Status</th>
																	<th style="width: 10%">Action</th> --}}
																</tr>
															</thead>
															<tfoot>

																{{-- <tr>
                                                                   <th>Date</th>
																	<th>Opinion</th>
																	<th>Opinion Status</th>
																	<th style="width: 10%">Action</th>
																</tr> --}}

															</tfoot>
															<tbody>
                                                            {{-- @foreach ($op as $opinion)
                                                                @if( $opinion->status == 2)
                                                                <tr>
                                                                <td>{{$opinion->date}}</td>
                                                                <td>{!!Str::limit(strip_tags($opinion->description), 80,$end='.....')!!}</td>
                                                                <td><i class="fa fa-thumbs-up"> Read </i></td>	
                                                                <td><a href="{{route('hr-view-read',$opinion->id)}}" class="badge badge-pill jatu-green px-3 py-2" ><i class="fa fa-eye" style="color: white"></i></td>																																																		
                                                                </tr> 
                                                                @endif
                                                                @endforeach --}}
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