@extends('layouts.base')
@section('contents')
<div class="main-panel">
    <div class="content">

        <div class="page-inner">
            <div class="page-header">  
                <h4 class="page-title orange">My Reports</h4>                  
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
					<a href="{{route('hod-create-report')}}">Create Report</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
					<a href="#">View Report</a>
					</li>
				</ul>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">My Reports</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{$task->title}}</td>      
                                                
                                            <td>{{$task->date_task}}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{route('hod-view-single-report',$task->id)}}">
                                                    <i class="fa fa-eye jatu-orange-c ml-3"></i>
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