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
                             <!-- <button type="submit" class="btn btn-primary">Change image</button>    -->
							 </div>
					         </div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Edit Personal information</div>
									      <hr width="100%" style="background-color:#db6e26; height:5px;">
                                                <form method="post" action="{{route('update_profile')}}">
                                                     @csrf
                                                    <div class="row">
                                                        <div class="col-6">
                                                        @if($showing)
                                                               @foreach($showing as $show)
                                                                    <label for="email2">First name</label>
                                                                    <input type="text" value="{{$show->first_name}}"  name="first_name" class="form-control" id="" placeholder=""><br>
                                                                    <label for="email2">Middle name</label>
                                                                    <input type="text"  value="{{$show->middle_name}}" name="middle_name" class="form-control" id="" placeholder=""><br>
                                                                    <label for="email2">Last name</label>
                                                                    <input type="text" value="{{$show->last_name}}" name="last_name" class="form-control" id="" placeholder=""><br>
                                                                    <label for="text">Email </label>
                                                                    <input type="email" value="{{$show->email}}" name="emails" class="form-control" id="" placeholder=""><br>
                                                              @endforeach
                                                              @endif
															  @if($phone)
															  @foreach($phone as $mobile)
                                                            <label for="email2">Phone</label>
                                                            <input type="text" value="{{$mobile->phone}}" name="phones"class="form-control" id="" placeholder=""><br>
															  @endforeach
                                                              @endif
													    </div>
                                                        <div class="col-6">
                                                            @if($show_address)
                                                               @foreach($show_address as $show)
                                                                    <label for="email2">Region</label>
                                                                    <input type="text" value="{{$show->region}}" name="reg" class="form-control" id="" placeholder=""><br>
                                                                    <label for="email2">District</label>
                                                                    <input type="text" value="{{$show->district}}" name="dist" class="form-control" id="" placeholder=""><br>
                                                                    <label for="email2">Ward</label>
                                                                    <input type="text" value="{{$show->ward}}" name="ward" class="form-control" id="" placeholder=""><br>
                                                                    <label for="email2">Street</label>
                                                                    <input type="text" value="{{$show->street}}" name="street" class="form-control" id="" placeholder=""><br>
                                                               @endforeach
                                                            @endif
                                                   </div>
                                                  <button type="submit" class="btn btn-primary ml-3 jatu-orange">Edit</button>
                                           </form>
                                    </div>
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