@extends('layouts.base')
@section('contents')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<h4 class="page-title orange">Edit Profile</h4>

					<div class="row">
						<div class="col-md-8">
							<div class="card card-with-nav">
								<div class="card-header">
									<div class="row row-nav-line ">
										<ul class="nav nav-tabs nav-line nav-color-secondary orange w-100 pl-3" role="tablist">
											<li class="nav-item"> <a class="nav-link active show orange" id="homee" data-toggle="tab" href="#home" role="tab" aria-selected="true">Personal Information</a> </li>			
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
												@if (session('status-okay'))
												<script>
											//== Class definition
											var SweetAlert2Demo = function() {

												//== Demos
												var initDemos = function() {

													$(document).ready( function () {
														swal(" {{ Session::get('status-okay') }}", "Click Anywhere in Screen to close", {
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
                                                 <form method="post" action="{{route('staff_profile_editings')}}">
                                                @csrf
													{{-- @foreach($myinfo as $my_data) --}}
													<div class="row mt-3">
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>First Name</label>
																<input required type="text" name="firstname" disabled class="form-control jatu-white" value="{{$myinfo->first_name}}" placeholder="First Name">
															</div>
														</div>
													</div>
                                                    <div class="row mt-3">
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>Middle Name</label>
																<input required type="text" name="middlename" disabled class="form-control jatu-white" value="{{$myinfo->middle_name}}" placeholder="Middle Name">
															</div>
														</div>
													</div>
                                                    <div class="row mt-3">
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>Last Name</label>
																<input required type="text" disabled name="lastname" class="form-control jatu-white" value="{{$myinfo->last_name}}" placeholder="Last Name">
															</div>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<label>Phone</label>
																@foreach ($myinfo->phones as $item)
																	<input required type="text" name="phone" value="{{$item->phone}}"  class="form-control jatu-white" placeholder="Phone" >
																@endforeach								
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<label>Email</label>
																<input required type="email" name="email" value="{{$myinfo->email}}" class="form-control " disabled value="" placeholder="Email" >
															</div>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>Region</label>
																<input required type="text" name="region" value="{{$myinfo->address->region}}" class="form-control" id="datepicker"  value="" placeholder="Region">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>District</label>
																<input required type="text" name="district" value="{{$myinfo->address->district}}" class="form-control" id="datepicker"   placeholder="District">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>Ward</label>
																<input required type="text" name="ward" value="{{$myinfo->address->ward}}" class="form-control" value="" name="phone" placeholder="Ward">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>street</label>
																<input required type="text" name="street" value="{{$myinfo->address->street}}" class="form-control" value="" name="phone" placeholder="Street">
															</div>
														</div>
                                                     <button type="submit" class="btn ml-3 jatu-green white" >Edit profile</buttton>
													</div>
													{{-- @endforeach --}}
												</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settingse">
										<div class="content">
											<div class="page-inner">
												<div class="row">
													<div class="col-md-12">
														home 5
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
  
				<div class="col-md-4">
					<div class="card card-profile">
						<div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
							<div class="profile-picture">
								<div class="avatar avatar-xl">
									<img src="/public/img/{{Auth::user()->photo->path}}"  alt="..." class="avatar-img rounded-circle center">
								</div>
							</div>
						</div>
						<div class="card-body ">
						     <form action="{{route('pic_updatez')}}" method="post" enctype="multipart/form-data">
							     @csrf
								 <div class="user-profile text-center ">
									<div class="name mt-4">
									<input type="file" name="image" class="form-control">
									</div>					
									<div class="view-profile mt-5">
										<button type="submit" class="btn jatu-green white btn-block">Upload image</button>
									</div>
								 </div>
                             </form>
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
								<a class="nav-link" href="https://www.themekita.com">
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
					Designed and Developed <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">JATU PLC</a>
					</div>				
				</div>
			</footer>
		</div>		
@endsection		