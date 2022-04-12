@extends('layouts.base')
@section('contents')
      <div class="main-panel">
			<div class="content">
                <div class="col-md-12">
				    <div class="page-header">
						<div class="page-header">
						<h4 class="page-title orange">Staff Approval</h4>
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
								<a href="">Staff Read Approval</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Approval</a>
							</li>
						</ul>
					</div> 
			    	</div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Staff Approval</h4>
                            </div>
                         </div>
                         <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <tbody>
										@foreach ($approval as $approval)
										<h3><span <h3 class="jatu-orange-c">Staff Name :</span> <span style="font-weight: bold;"> {{$approval->user->first_name}} {{$approval->user->middle_name}} {{$approval->user->last_name}}</span></s></h3>
										<hr/>
										<h3 class="jatu-orange-c">Reason for Approval</h3>
										<span style="font-weight: bold;"> {!! $approval->reason !!}</span>
										<hr/>
										<h4><span style="font-weight: bold;" class="jatu-orange-c">Date :</span> <span style="font-weight: bold;">{{$approval->date}}</span></h4>
										@endforeach
                                    </tbody> 
                                </table>  
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