@extends('layouts.base')

@section('contents')
<div class="main-panel">
	<div class="container">
		<div class="page-inner">
			<h4 class="page-title orange">User Profile</h4>
			<div class="row">
				<div class="col-md-8">
					<div class="card card-with-nav">
						<div class="card-header">
							<div class="row row-nav-line ">
								<ul class="nav nav-tabs nav-line nav-color-secondary orange w-100 pl-3" role="tablist">
									<li class="nav-item"> <a class="nav-link active show orange" id="homee" data-toggle="tab" href="#home" role="tab" aria-selected="true">Personal Information</a> </li>
									<li class="nav-item"> <a class="nav-link orange" data-toggle="tab" id="profilee" href="#profile" role="tab" aria-selected="false">Oficcial Information</a> </li>
                                </ul>
							</div>
						</div>

						<div class="tab-content mt-2 mb-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="homee">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            @if($see_profile->count()>=1)
                                            @foreach($see_profile as $data)
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Full Name</label>
                                                        <input type="text"  class="form-control jatu-white"  value="{{$data->first_name}} {{$data->middle_name}} {{$data->last_name}}">
                                                    </div>
                                                    </div>
                                            </div>
                                            @endforeach
                                            @endif

                                            <div class="row mt-3">
                                                @if($phone)
                                                @foreach($phone as $mobile)
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Phone</label>
                                                        <input type="text"  class="form-control jatu-white" value="{{$mobile->phone}}" placeholder="Name">
                                                    </div>
                                                </div>
                                                    @endforeach
                                                @endif

                                                @if($see_profile->count()>=1)
                                                @foreach($see_profile as $data)
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" value="{{$data->email}}" placeholder="Name" >
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                            
                                            
                                            
                                            <div class="row mt-3">
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default">
                                                        <label>Region</label>
                                                        <input type="text" class="form-control" id="datepicker"   placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default">
                                                        <label>District</label>
                                                        <input type="text" class="form-control" id="datepicker" name="datepicker"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default">
                                                        <label>Ward</label>
                                                        <input type="text" class="form-control"  name="phone" placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default">
                                                        <label>street</label>
                                                        <input type="text" class="form-control"  name="phone" placeholder="Phone">
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
                                                    @if($location_name)
                                                    @foreach($location_name as $loc)
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Location</label>
                                                                <input type="text"  class="form-control jatu-white" value="{{$loc->name}}"  placeholder="Name">
                                                            </div>
                                                            </div>
                                                    </div>
                                                    @endforeach
                                                    @endif

                                                    @if($branch_name)
                                                    @foreach($branch_name as $branch)
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Branch</label>
                                                                <input type="text"  class="form-control jatu-white" value="{{$branch->name}}" placeholder="">
                                                            </div>
                                                            </div>
                                                    </div>
                                                    @endforeach
                                                    @endif

                                                    @if($department_name)
                                                    @foreach($department_name as $dept)
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Department</label>
                                                                <input type="text"  class="form-control jatu-white" value="{{$dept->fullname}}"   placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                    
                                                    @if($position_name)
                                                    @foreach($position_name as $pos)
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default">
                                                                <label> Position</label>
                                                                <input type="text"  class="form-control jatu-white" value="{{$pos->name}}"  placeholder="Name">
                                                            </div>
                                                            </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
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
                                                <div class="card-body">
                                                <form action="{{route('staff_updates')}}" method="post">
                                                      <div class="row mt-3">
                                                          <div class="col-md-12">
                                                              <div class="form-group form-group-default">
                                                                 <label>new password</label>
                                                                 <input type="text" name="pass_one" class="form-control jatu-white" >
                                                              </div>
                                                          </div>
                                                     </div>
                                                     <div class="row mt-3">
                                                          <div class="col-md-12">
                                                              <div class="form-group form-group-default">
                                                                 <label>confirm password</label>
                                                                 <input type="text" name="pass_two" class="form-control jatu-white" >
                                                              </div>
                                                          </div>
                                                     </div>
                                                     <div class="row mt-3">
                                                          <div class="col-md-12">    
                                                              <button type="submit"  class="btn jatu-green white" >Reset</button>  
                                                         </div>
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
								@if($photo_name->count()>=1)
                                    @foreach($photo_name as $name)
                                    <img src="/img/{{$name->path}}"  width="100px" height="100px" alt="..." class="avatar-img rounded-circle">
                                    @endforeach

                                @elseif($photo_name->count()==0)
                                    <img src="{{asset('img/one.png')}}" alt="..." class="avatar-img rounded-circle">
                                @endif
								</div>
							</div>
						</div>

						<div class="card-body ">
						
							<div class="user-profile text-center ">
                                @if($see_profile->count()>=1)
                                @foreach($see_profile as $data)
                                    <div class="name mt-4">{{$data->first_name}}   {{$data->last_name}}</div>
                                @endforeach
                                @endif

                                @if($position_name)
                                @foreach($position_name as $pos)
                                    <div class="job black">{{$pos->name}}</div>
                                @endforeach
                                @endif			
								<div class="view-profile mt-5">
									<a href="{{route('staff_edit_profile')}}" class="btn jatu-green white btn-block">Edit my profile</a>
								</div>
							</div><br>

						</div>
					</div>
				</div>
                
			</div><br>
		</div>
	</div><br><br<br><br><br>
	<footer class="footer mt-5">
		<div class="container-fluid">
				<div class="copyright ml-auto">
				2020@jatu:All rights reserved
			</div>				
		</div>
	</footer>
</div>
@endsection