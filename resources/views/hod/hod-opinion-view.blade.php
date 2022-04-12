@extends('layouts.base')
@section('contents')
<div class="main-panel">
	<div class="content">
		
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title orange">Opinions</h4>
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
						<a href="#">Staff Opinions</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Staff opinions</h4>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Opinions</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($opinion as $opin)
										<tr>
										<td>{!!Str::limit(strip_tags($opin->description), 80,$end='.....')!!}</td>
										<td>{{$opin->date}}</td>
										<td><a href="{{route('hod-view-full', $opin->id)}}" ><i class="fa fa-eye jatu-orange-c ml-3"></i></td>
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