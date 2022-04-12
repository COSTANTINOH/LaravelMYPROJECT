@extends('layouts.base')

@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="panel-header">
					<div class="page-inner py-5 jatu-orange">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row ">
							<div class="col-12">
							<div class="col-6">
					          <div class="avatar float-left mr-2" style="height:100px; width:100px;">
						      	  <img src="{{asset('assets/img/profile.jpg')}}" width="100px" height="100px"  alt="..." class="avatar-img rounded-circle"> 
					           </div>      
					         </div>
					         <div class="col-8 mt-3">
							        @if($see_profile->count()>=1)
									@foreach($see_profile as $data)
					         <strong style="color:white; padding:10px; font-size:30px;">{{$data->first_name}}  {{$data->last_name}}</strong>
					                @endforeach
									@endif
							 </div>
					         </div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Personal information</div>
									<hr width="100%" style="background-color:#db6e26; height:5px;">
									<table>
									@if($see_profile->count()>=1)
									@foreach($see_profile as $data)
                                       <tr>
                                     	<td>Full Name:</td><td class="Black">{{$data->first_name}}  {{$data->last_name}}</td>
                                       </tr>
                                       <tr>
                                     	<td>Email:</td><td class="Black">{{$data->email}}</td>
                                       </tr>
									   @endforeach
									   @endif

									   @if($phone)
									   @foreach($phone as $mobile)
                                       <tr>
                                     	<td>phone:</td><td class="Black">{{$mobile->phone}}</td>
                                       </tr>
									   @endforeach
									   @endif

                                       @if($show_address)
									   @foreach($show_address as $add)
                                       <tr>
                                     	<td>Region:</td><td class="Black">{{$add->region}}</td>
                                       </tr>
            
									   <tr>
                                     	<td>District:</td><td class="Black">{{$add->district}}</td>
                                       </tr>

									   <tr>
                                     	<td>Ward:</td><td class="Black">{{$add->ward}}</td>
                                       </tr>

									   <tr>
                                     	<td>Street:</td><td class="Black">{{$add->street}}</td>
                                       </tr>
									   @endforeach
									   @endif
                                       <tr>
									   <td><br> <a href="{{route('edit-profile-view')}}" class="btn btn-primary jatu-orange">Edit</button></td>
                                       </tr>
									   
									</table>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Official information</div>
									<hr width="100%" style="background-color:#db6e26; height:5px;">
									<table>
									     @if($location_name)
										 @foreach($location_name as $loc)
									    <tr>
                                     	<td>Location:</td><td class="Black">{{$loc->name}}</td>
                                        </tr>
										 @endforeach
										 @endif

										 @if($branch_name)
										 @foreach($branch_name as $branch)
									    <tr>
                                     	<td>Branch:</td><td class="Black">{{$branch->name}}</td>
                                        </tr>
										 @endforeach
										 @endif

                                        @if($department_name)
										 @foreach($department_name as $dept)
									    <tr>
                                     	<td>Department:</td><td class="Black">{{$dept->fullname}}</td>
                                        </tr>
										 @endforeach
										 @endif

                                        @if($position_name)
										 @foreach($position_name as $pos)
									    <tr>
                                     	<td>Position:</td><td class="Black">{{$pos->name}}</td>
                                        </tr>
										 @endforeach
										 @endif

                                        <tr>
                                       </tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<div class="copyright ml-auto">
						Jatuplc@2020:All rights reserved 
					</div>				
				</div>
			</footer>
		</div>
@endsection