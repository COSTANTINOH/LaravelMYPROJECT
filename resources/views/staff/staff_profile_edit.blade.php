@extends('staff.layout.base')

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
                                                        <div class="alert jatu-green white alert-dismissible' role='alert'">
                                                        {{ session('status-okay') }}
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span> 
                                                        </button>
                                                        </div>
                                                    @endif 
                                                 <form method="post" action="{{route('staff_profile_editings')}}">
                                                @csrf
													@foreach($myinfo as $my_data)
													<div class="row mt-3">
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>First Name</label>
																<input type="text" name="firstname" class="form-control jatu-white" value="{{$my_data->first_name}} " placeholder="Name">
															</div>
														</div>
													</div>
                                                    <div class="row mt-3">
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>Middle Name</label>
																<input type="text" name="middlename"  class="form-control jatu-white" value=" {{$my_data->middle_name}} " placeholder="Name">
															</div>
														</div>
													</div>
                                                    <div class="row mt-3">
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>Last Name</label>
																<input type="text" name="lastname" class="form-control jatu-white" value=" {{$my_data->last_name}}" placeholder="Name">
															</div>
														</div>
													</div>
													
													<div class="row mt-3">
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<label>Phone</label>
																<input type="text" name="phone" value="{{$my_data->phone}}"  class="form-control jatu-white" value="" placeholder="Name">
															</div>
														</div>
														
														<div class="col-md-6">
															<div class="form-group form-group-default">
																<label>Email</label>
																<input type="email" name="email" value="{{$my_data->email}}" class="form-control" value="" placeholder="Name" >
															</div>
														</div>
													</div>
													
													<div class="row mt-3">
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>Region</label>
																<input type="text" name="region" value="{{$my_data->region}}" class="form-control" id="datepicker"  value="" placeholder="">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>District</label>
																<input type="text" name="district" value="{{$my_data->district}}" class="form-control" id="datepicker" name="datepicker" value="" placeholder="">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>Ward</label>
																<input type="text" name="ward" value="{{$my_data->ward}}" class="form-control" value="" name="phone" placeholder="Phone">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group form-group-default">
																<label>street</label>
																<input type="text" name="street" value="{{$my_data->street}}" class="form-control" value="" name="phone" placeholder="Phone">
															</div>
														</div>
                                                     <button type="submit" class="btn ml-3 jatu-green white" >Edit profile</buttton>
													</div>
													@endforeach
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
														 @foreach($myinfo2 as $my_datas)
															<div class="row mt-3">
																<div class="col-md-12">
																	<div class="form-group form-group-default">
																		<label>Location</label>
																		<input type="text"  class="form-control jatu-white" value="{{$my_datas->lname}}"  placeholder="Name">
																	</div>
																</div>
															</div>

															<div class="row mt-3">
																<div class="col-md-12">
																	<div class="form-group form-group-default">
																		<label>Branch</label>
																		<input type="text"  class="form-control jatu-white" value="{{$my_datas->bname}}" placeholder="">
																	</div>
																</div>
															</div>

															<div class="row mt-3">
																<div class="col-md-12">
																	<div class="form-group form-group-default">
																		<label>Department</label>
																		<input type="text"  class="form-control jatu-white" value="{{$my_datas->fullname}}"   placeholder="">
																	</div>
																</div>
															</div>
                                                            @endforeach
															@foreach($myinfo as $my_data)
															<div class="row mt-3">
																<div class="col-md-12">
																	<div class="form-group form-group-default">
																		<label> Position</label>
																		<input type="text"  class="form-control jatu-white" value="{{$my_data->pname}}"  placeholder="Name">
																	</div>
																</div>
															</div>
															@endforeach
                                                            </form>
														 </div>										
													</div>
												</div>
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
								@if(Auth::user()->photo_id=='')
									<img src="/img/one.PNG" width ="100px" height="100px" alt="..." class="avatar-img rounded-circle">
								@else
								@foreach($myinfo as $my_data)
								<img src="/img/{{$my_data->path}}"  width="100px" height="100px" alt="..." class="avatar-img rounded-circle">
								@endforeach
							    @endif
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
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
					</div>				
				</div>
			</footer>
		</div>		
@endsection		