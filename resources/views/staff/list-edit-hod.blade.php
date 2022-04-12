@extends('layouts.base')

@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Task</h4>
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
								<a href="#">Task List</a>
							</li>
						</ul>
					</div>
					<div class="row">
						

						

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title green">List of Task sent back for emendation and resend</h4>
									</div>
									<div style="float:right;">

										
										<a href="{{ URL::to('post-back-task-form-preview')}}\{{$id}}">
										 <button class="btn jatu-orange white" style="margin-right: 10px"> <i class="fa fa-eye"></i> Preview</button>
										</a>


									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Title</th>
													<th>Time Taken</th>
													<th>Date Task</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												
												<tr>
													<th>Title</th>
													<th>Time Taken</th>
													<th>Date Task</th>
													<th>Action</th>
												</tr>
												
											</tfoot>
											<tbody>

												@foreach($task_list as $task_lists)
												<tr>
													<td>{{ $task_lists->title }}</td>
													<td>{{ $task_lists->time_taken }}</td>
													<td>{{ $task_lists->date_task }}</td>
													<td>
														<div class="form-button-action">
															<a href="{{ route('edit-task',$task_lists->id) }}">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit jatu-green-c"></i>
															</button>
															</a>
															<a href="{{ route('delete-task',$task_lists->id) }}">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
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