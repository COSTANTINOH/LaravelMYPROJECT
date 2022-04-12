@extends('layouts.base')
@section('contents')
<div class="main-panel">
			
            
            <div class="content">
				
                <div class="col-md-12">
					<div class="page-header">
						<h4 class="page-title">Print Report</h4>
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
								<a href="#">Staff Reports</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Reports</a>
							</li>
						</ul>
					</div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h2 class="card-title">{{$message}} From {{$datefrom}} TO {{$dateto}}</h2>
                            </div>
                        </div>
                      @if(!empty($staff_details))
                       	 <div class="card-body">
                       	 	 <div style="float: right;margin: 10px;">
                            	@if($yes == 1)
                            	  <a href="{{ route('report-print-name-staff-preview',['datefrom' => $datefrom, 'dateto' => $dateto])}}">
                            		<button class="btn jatu-green white" style="margin-right: 10px"> <i class="fa fa-print"></i> Print</button>
                            	</a>
                            	@else

                            	@endif
                            </div>
                        	<h3 class="jatu-orange-c">Staff Who Didn't Write Report Without Approval</h3>
                            <div class="table-responsive">
                                <table id="add-row1" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Approval</th>
											<th>Time Sent</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staff_details as $user_no_report)
                                        <tr>
                                        <td>{{$user_no_report->first_name}} {{$user_no_report->last_name}}</td>
                                        <td>{{$user_no_report->email}}</td>
                                        <td>
                                        	
                                        	@foreach($user_no_report->phones as $user_no)
                                        	 {{$user_no->phone}}
                                        	@endforeach

                                        </td>
                                        <td>
                                        	
                                         @if($user_no_report->approval_status  == 1)
                                        	<i class="fa fa-check"></i>
                                        @else
                                        	<i class="fa fa-times"></i>
                                        @endif

                                        </td>
                                        <td>N/A</td>
                                        <td>
                                        	<div class="form-button-action">

                                        		<a href="{{route('view-staff',$user_no_report->id)}}">
                                        			<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Profile">
                                        				<i class="fa fa-eye"></i>
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
                       @else

                       @endif
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