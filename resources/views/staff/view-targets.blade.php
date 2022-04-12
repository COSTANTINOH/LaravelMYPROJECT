@extends('layouts.base')

@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Target</h4>
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
							<a href="{{route('create-target')}}">Create Target</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
							<a href="#">View Target</a>
							</li>
						</ul>
					</div>
					<div class="row">
					<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										
									</div>
								</div>
								<div class="card-body">
									

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Targets</th>
													<th>Set Date</th>
													<th>Deadline</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Targets</th>
													<th>Set Date</th>
													<th>Deadline</th>
												</tr>
											</tfoot>
											<tbody>
											@foreach($targets as $target)
												<tr>
													<td>{!! strip_tags($target->name) !!}</td>
													<td>{{$target->date}}</td>
													<td>
														<?php 
														// $N = date('N');
														$N = 5;
														$x = now()->addDays($N)->format('Y-m-d'); 
														echo "$x"; 
														?>
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