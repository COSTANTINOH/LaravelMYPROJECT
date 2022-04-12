@extends('layouts.base')
@section('contents')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<h4 class="page-title orange">Edit Staff Profile</h4>
					<div class="row">
						<div class="col-md-8">
							<div class="card card-with-nav">
								<div class="card-header">
									<div class="row row-nav-line ">
										<ul class="nav nav-tabs nav-line nav-color-secondary orange w-100 pl-3" role="tablist">
											<li class="nav-item"> <a class="nav-link active show orange" id="homee" data-toggle="tab" href="#home" role="tab" aria-selected="true">Personal Information</a> </li>
											<li class="nav-item"> <a class="nav-link orange" data-toggle="tab" id="profilee" href="#profile" role="tab" aria-selected="false">Official Information</a> </li>
										</ul>
									</div>
								</div>
								<div class="tab-content mt-2 mb-3" id="pills-tabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="homee">
										<div class="row">
											<div class="col-md-12">
												<div class="card-body">
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
                                                   <form action="{{route('view-staff-edit')}}" method="post">
                                                   @csrf
													{{-- @foreach($myinfo as $my_data) --}}
                                                    <div class="row mt-3">
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>First name</label><br/>
																  <input type="text" value="{{$user->first_name}} " class="form-control" name="fname" placeholder="first name" > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>Middle name</label><br/>
																<input type="text" value="{{$user->middle_name}} " class="form-control"  name="mname" placeholder="middle name" > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group form-group-default">
																<label>Last name</label><br/>
																 <input type="text" value="{{$user->last_name}} " class="form-control" name="lname" placeholder="last name" >  
															</div>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<label>Phone</label><br/>	
																@foreach ($user->phones as $item)
																	<input type="text" value="{{$item->phone}}" name="phone"  class="form-control jatu-white"  placeholder="Name"> 
																@endforeach
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<label>Email</label><br>
															 <input type="email" value="{{$user->email}}" class="form-control" name="email" placeholder="Name" >  	
															</div>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>Region</label><br/>
																  <input type="text" name="region" value="{{$user->address->region}}" class="form-control"  placeholder="Region" > 
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>District</label><br/>
																<input type="text" name="district"  value="{{$user->address->district}}" class="form-control"  placeholder="district" > 
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>Ward</label><br/>
																 <input type="text" name="ward" value="{{$user->address->ward}}" class="form-control" placeholder="Ward" >  
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>street</label><br/>
																 <input type="text" name="street" value="{{$user->address->street}}" class="form-control"  placeholder="Street" >  
															</div>
														</div>
													</div>
                                                    <div class="row mt-3">
                                                    <input type="text" value="{{$user->id}}" style="visibility:hidden" class="form-control"  name="id" placeholder="Street" ><br>
                                                    <button type="submit" class="btn jatu-green white ml-3">Edit</button>
                                                    </div>
                                                 </form>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profilee">
										<div class="content">
											<div class="page-inner">
												<div class="row">
													<div class="col-md-12">
														<div class="card-body">
                                                          <form method="post" action="{{route('update-official')}}">
                                                          @csrf
														    
															<div class="row mt-3">
																<div class="col-md-12">
																	<div class="form-group form-group-default">
																		<label>Location</label>
                                                                        <select class="form-control" name="location">
                                                                        <option value="{{$user->ulbd->branch->location->id}}">{{$user->ulbd->branch->location->lname}}</option>
                                                                        @foreach($loc as $loc)
                                                                        <option value="{{$loc->id}}">{{$loc->lname}}</option>
                                                                        @endforeach
                                                                        </select> 
																	</div>
																</div>
															</div>
															<div class="row mt-3">
																<div class="col-md-12">
																	<div class="form-group form-group-default">
																		<label>Branch</label>
                                                                        <select class="form-control" name="name">
                                                                        <option value="{{$user->ulbd->branch->id}}">{{$user->ulbd->branch->bname}}</option>
                                                                        @foreach($bra as $bra)
                                                                        <option value="{{$bra->id}}">{{$bra->bname}}</option>
                                                                        @endforeach
                                                                        </select>  
																	</div>
																</div>
															</div>
															<div class="row mt-3">
																<div class="col-md-12">
																	<div class="form-group form-group-default">
																		<label>Department</label>
                                                                        <select class="form-control" name="dept">
                                                                        <option value="{{$user->ulbd->department->id}}">{{$user->ulbd->department->fullname}}</option>
                                                                        @foreach($dept as $dept)
                                                                        <option value="{{$dept->id}}">{{$dept->fullname}}</option>
                                                                        @endforeach
                                                                        </select> 
																	</div>
																</div>
															</div>

															<div class="row mt-3">
																<div class="col-md-12">
																	<div class="form-group form-group-default">
																		<label> Position</label>
                                                                        <select class="form-control" name="pos">
                                                                        <option value=" {{$user->position->id}}">{{$user->position->pname}}</option>
                                                                        @foreach($position as $position)
                                                                        <option value="{{$position->id}}">{{$position->pname}}</option>
                                                                        @endforeach
                                                                        </select>
																	</div>
																</div>
															</div>

                                                           
															<div class="row mt-3">
																<div class="col-md-12">
																	<div class="form-group form-group-default">
																		<label>Role</label>
                                                                        <select class="form-control" name="role">
																			<option>Choose Role...</option>
																			@foreach($roles as $rol)
																			<option value="{{$rol->id}}" {{ $user->role_id == $rol->id ? 'selected' : ''  }}>{{$rol->name}}</option>
																			@endforeach
                                                                        </select>
																	</div>
																</div>
															</div>
                                                            

                                                            <div class="row mt-3">
                                                            <input type="text" value="{{$user->id}}" style="visibility:hidden" class="form-control"  name="id" placeholder="Street" ><br>
                                                            <button type="submit" class="btn jatu-green white ml-3">Edit</button>
                                                            </div>
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
						<div class="col-md-4">
							<div class="card card-profile">
								<div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
									<div class="profile-picture">
										<div class="avatar avatar-xl">
											<img src="/img/{{$user->photo->path}}"  alt="..." class="avatar-img rounded-circle center">
										</div>
									</div>
								</div>
								<div class="card-body ">
									<div class="user-profile text-center ">
										<div class="name mt-4">
										{{-- @foreach($myinfo as $my_data) --}}
										{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}
										{{-- @endforeach --}}
										</div>
										<div class="job black">
										{{-- @foreach($user->uldb as $list) --}}
											{{$user->position->pname}}
										{{-- @endforeach --}}
										</div>	
										<div class="view-profile mt-5">
										</div>
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
								<a class="nav-link" href="https://www.themekita.com">
									JATU PLC
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
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