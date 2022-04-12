@extends('layouts.base')
@section('contents')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<h4 class="page-title orange">User Profile</h4>
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
													{{-- @foreach($myinfo as $my_data) --}}
													<div class="row mt-3">
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>Full Name</label><br/>
																{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}	{{-- <input type="text"  class="form-control jatu-white" value="{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}" placeholder="Name"> --}}
															</div>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<label>Phone</label><br/>
																	{{-- {{$user->phones}} --}}
																@foreach ($user->phones as $item)
																{{$item->phone}}	{{--	<input type="text" value="{{$item->phone}}"  class="form-control jatu-white" value="" placeholder="Name"> --}}
																@endforeach
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<label>Email</label><br>
																{{$user->email}}   {{-- <input type="email" value="{{$user->email}}" class="form-control" value="" placeholder="Name" >  --}}	
															</div>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>Region</label><br/>
																{{$user->address->region}} {{-- <input type="email" value="{{$user->address->region}}" class="form-control" value="" placeholder="Name" >  --}}
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>District</label><br/>
																{{$user->address->district}} {{-- <input type="email" value="{{$user->address->district}}" class="form-control" value="" placeholder="Name" >  --}}
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>Ward</label><br/>
																{{$user->address->ward}} {{-- <input type="email" value="{{$user->address->ward}}" class="form-control" value="" placeholder="Name" >  --}}
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>street</label><br/>
																{{$user->address->street}} {{-- <input type="email" value="{{$user->address->street}}" class="form-control" value="" placeholder="Name" >  --}}
															</div>
														</div>
													</div>
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
														    {{-- @foreach($myinfo2 as $my_dataz) --}}
															<div class="row mt-3">
																<div class="col-md-12">
																	<div class="form-group form-group-default">
																		<label>Location</label>
																		{{$user->ulbd->branch->location->lname}}{{-- <input type="text"  class="form-control jatu-white" value="{{$my_dataz->lname}}"  placeholder="Name"> --}}
																	</div>
																</div>
															</div>
															<div class="row mt-3">
																<div class="col-md-12">
																	<div class="form-group form-group-default">
																		<label>Branch</label>
																		{{$user->ulbd->branch->bname}}{{-- <input type="text"  class="form-control jatu-white" value="{{$my_dataz->bname}}" placeholder=""> --}}
																	</div>
																</div>
															</div>
															<div class="row mt-3">
																<div class="col-md-12">
																	<div class="form-group form-group-default">
																		<label>Department</label>
																		{{$user->ulbd->department->fullname}}{{-- <input type="text"  class="form-control jatu-white" value="{{$my_dataz->fullname}}"   placeholder=""> --}}
																	</div>
																</div>
															</div>
															{{-- @endforeach
                                                            @foreach($myinfo as $my_data) --}}
															<div class="row mt-3">
																<div class="col-md-12">
																	<div class="form-group form-group-default">
																		<label> Position</label>
																		{{$user->position->pname}}{{-- <input type="text"  class="form-control jatu-white" value="{{$my_data->pname}}"  placeholder="Name"> --}}
																	</div>
																</div>
															</div>
                                                            {{-- @endforeach --}}
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
											<img src="/public/img/{{Auth::user()->photo->path}}"  alt="..." class="avatar-img rounded-circle center">
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
											<a href="{{route('pro-edit')}}" class="btn jatu-green white btn-block">Edit my profile</a>
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