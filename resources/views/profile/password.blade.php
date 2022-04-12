@extends('layouts.base')
@section('contents')
<div class="main-panel">
	<div class="container">
		<div class="page-inner">
			<h4 class="page-title">User Password</h4>
			<div class="row">
				<div class="col-md-8">
					<div class="card card-with-nav">
						<div class="card-header">
							<div class="row row-nav-line ">
								<ul class="nav nav-tabs nav-line nav-color-secondary orange w-100 pl-3" role="tablist">
									<li class="nav-item"> <a class="nav-link active show orange" id="homee" data-toggle="tab" href="#home" role="tab" aria-selected="true">Password settings</a> </li>
								</ul>
							</div>
						</div>
						<div class="tab-content mt-2 mb-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="homee">                       
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                        @if($errors->any())
                                            <div class="alert alert-danger alert-dismissible white" style="background-color:#f25961;" >
                                                @foreach($errors->all() as $error)
                                                {{$error}}
                                                @endforeach	
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span> 
                                                </button>								
                                            </div>
											@endif
											@if (session('status'))
												<div class="alert alert-danger alert-dismissible white" style="background-color:#f25961;" >
													{{ session('status') }}
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span> 
													</button>
												</div>
											@endif 
												@if (session('status-okay'))
											<script>
												//== Class definition
												var SweetAlert2Demo = function() {

													//== Demos
													var initDemos = function() {

														$(document).ready( function () {
															swal(" {{ Session::get('status-okay') }}", "click anywhere to close!", {
																icon : "success",
																buttons: {        			
																	confirm: {
																		className : 'btn btn-success'
																	}
																},
															});
														});
													};

													return {
														//== Init
														init: function() {
															initDemos();
														},
													};
												}();
												//== Class Initialization
												jQuery(document).ready(function() {
													SweetAlert2Demo.init();
												});
											</script>
											@endif  
                                        <form action="{{route('pass_edit')}} "method="post">
                                            @csrf
											<div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Old password</label>
                                                        <input required type="password" name="old" class="form-control jatu-white" placeholder="Enter old password" value="">
                                                    </div>
                                                    </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>New password</label>
                                                        <input required type="password" name="one" class="form-control jatu-white" placeholder="Enter new password"  value="">
                                                    </div>
                                                    </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Confirm Password</label>
                                                        <input required type="password" name="two" class="form-control jatu-white" placeholder="Match new password" value="">
                                                    </div>
                                                    </div>
                                            </div>
                                            <button type="submit" class="btn jatu-green white mt-3">Change Password</button>
                                        </form>	
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
	<footer class="footer mt-5" style="bottom:0;">
		<div class="container-fluid">
				<div class="copyright ml-auto">
				2020@jatu:All rights reserved
			</div>				
		</div>
	</footer>
</div>
@endsection