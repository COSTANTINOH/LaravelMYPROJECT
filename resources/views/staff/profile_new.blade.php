@extends('layouts.base')
@section('contents')
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<h4 class="page-title">User Profile</h4>

			<div class="row">
				<div class="col-md-8">
					<div class="card card-with-nav">
						<div class="card-header">
							<div class="row row-nav-line ">
								<ul class="nav nav-tabs nav-line nav-color-secondary orange w-100 pl-3" role="tablist">
									<li class="nav-item"> <a class="nav-link active show orange" id="homee" data-toggle="tab" href="#home" role="tab" aria-selected="true">Personal Information</a> </li>
									<li class="nav-item"> <a class="nav-link orange" data-toggle="tab" id="profilee" href="#profile" role="tab" aria-selected="false">Oficcial Information</a> </li>
									<li class="nav-item"> <a class="nav-link orange" data-toggle="tab" id="settingse" href="#settings" role="tab" aria-selected="false">Password settings</a> </li>
								</ul>
							</div>
						</div>

						<div class="tab-content mt-2 mb-3" id="pills-tabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="homee">
								<div class="row">
									<div class="col-md-12">
										<div class="card-body">

											<div class="row mt-3">
												<div class="col-md-12">
													<div class="form-group form-group-default">
														<label>Full Name</label>
														<input type="text"  class="form-control jatu-white"  placeholder="Name">
													</div>
												</div>
											</div>
											
											<div class="row mt-3">
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label>Phone</label>
														<input type="text"  class="form-control jatu-white" value="" placeholder="Name">
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label>Email</label>
														<input type="email" class="form-control" value="" placeholder="Name" >
													</div>
												</div>
											</div>
											
											<div class="row mt-3">
												<div class="col-md-3">
													<div class="form-group form-group-default">
														<label>Region</label>
														<input type="text" class="form-control" id="datepicker"  value="" placeholder="">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group form-group-default">
														<label>District</label>
														<input type="text" class="form-control" id="datepicker" name="datepicker" value="" placeholder="">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group form-group-default">
														<label>Ward</label>
														<input type="text" class="form-control" value="" name="phone" placeholder="Phone">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group form-group-default">
														<label>street</label>
														<input type="text" class="form-control" value="" name="phone" placeholder="Phone">
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

													<div class="row mt-3">
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>Location</label>
																<input type="text"  class="form-control jatu-white" value=""  placeholder="Name">
															</div>
														</div>
													</div>

													<div class="row mt-3">
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>Branch</label>
																<input type="text"  class="form-control jatu-white" value="" placeholder="">
															</div>
														</div>
													</div>

													<div class="row mt-3">
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>Department</label>
																<input type="text"  class="form-control jatu-white" value=""   placeholder="">
															</div>
														</div>
													</div>

													<div class="row mt-3">
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label> Position</label>
																<input type="text"  class="form-control jatu-white" value=""  placeholder="Name">
															</div>
														</div>
													</div>

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
									
									<img src=""  width="100px" height="100px" alt="..." class="avatar-img rounded-circle">
									
								</div>
							</div>
						</div>
						<div class="card-body ">
							
							<div class="user-profile text-center ">
								<div class="name mt-4">Costa Costa</div>
								
								<div class="job black">Costa Costa</div>
								
								<div class="view-profile mt-5">
									<a href="{{route('staff_edit_profile')}}" class="btn jatu-green white btn-block">Edit my profile</a>
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