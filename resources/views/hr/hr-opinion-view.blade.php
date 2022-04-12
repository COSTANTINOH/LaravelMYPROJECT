@extends('layouts.base')
@section('contents')
<div class="main-panel">
	<div class="content">
		<div class="panel-header">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title orange">Staff Opinions</h4>
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
						<a href="#">Opinions</a>
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
							<a class="nav-link active " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fa fa-eye-slash"></i> Unread opinion</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fa fa-eye"></i> Read opinion</a>
						</li>
					</ul>
					<div class="tab-content mt-2 mb-3" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
							<!-- Modal -->
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Date</th>
											<th>Opinion</th>
											<th>Opinion Status</th>
											<th style="width: 10%">Action</th>	
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Date</th>
											<th>Opinion</th>
											<th>Opinion Status</th>
											<th style="width: 10%">Action</th>
										</tr>

									</tfoot>
									<tbody>
									@foreach ($op as $opinion)
									@if($opinion->status == 0)
									<tr>
									<td>{{$opinion->date}}</td>
									<td>{!!Str::limit(strip_tags($opinion->description), 80,$end='.....')!!}</td>
									<td><i class="fa fa-thumbs-down"> Not read </i></td>	
									<td><a href="{{route('hr-view-full',$opinion->id)}}" ><i class="fa fa-eye jatu-orange-c ml-3"></i></td>																																																		
									</tr> 
									@endif
									@endforeach		
									</tbody>
								</table>
							</div>					
						</div>
						<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
							<!-- Modal -->
							<div class="table-responsive">
								<table id="add-row1" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Date</th>
											<th>Opinion</th>
											<th>Opinion Status</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Date</th>
											<th>Opinion</th>
											<th>Opinion Status</th>
											<th style="width: 10%">Action</th>
										</tr>
									</tfoot>
									<tbody>
									@foreach ($op as $opinion)
										@if( $opinion->status == 1)
										<tr>
										<td>{{$opinion->date}}</td>
										<td>{!!Str::limit(strip_tags($opinion->description), 80,$end='.....')!!}</td>
										<td><i class="fa fa-thumbs-up"> Read </i></td>	
										<td><a href="{{route('hr-view-read',$opinion->id)}}" ><i class="fa fa-eye jatu-orange-c ml-3"></i></td>																																																		
										</tr> 
										@endif
										@endforeach
									</tbody>
								</table>
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