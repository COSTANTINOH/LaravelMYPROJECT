@extends('layouts.base')
@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="panel-header">
					<div class="page-inner py-3">
						{{-- <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="orange pb-2 fw-bold">Dashboard</h2>
								<h5 class="orange op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5>
							</div>
						</div> --}}
					</div>
				</div>
				<div class="page-inner mt--5">
                    
                    <div class="content">
				
                        <div class="col-md-12">
                            <div class="page-header">
                                <h4 class="page-title orange">Reports</h4>
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
                                        <a href="#">View all reports</a>
                                    </li>
                                    <li class="separator">
                                        <i class="flaticon-right-arrow"></i>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">Print</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">History reports</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover" >
                                            <thead>
                                                <tr>
                                                    {{-- <th>Name</th>
                                                    <th>Date</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($users as $user)
                                                <tr>
                                                <td>{{$user->first_name}} {{$user->last_name}}</td>
                                                <td>{{$date}}</td>
                                                </tr> 
                                                @endforeach       --}}
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