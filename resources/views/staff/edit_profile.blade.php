@extends('layouts.base')

@section('contents')
<style>
/*Profile Pic Start*/
.picture-container{
    position: relative;
    cursor: pointer;
    text-align: center;
}
.picture{
    width: 106px;
    height: 106px;
    background-color: #999999;
    border: 4px solid #CCCCCC;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 0px auto;
    overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;
}
.picture:hover{
    border-color: #2ca8ff;
}
.content.ct-wizard-green .picture:hover{
    border-color: #05ae0e;
}
.content.ct-wizard-blue .picture:hover{
    border-color: #3472f7;
}
.content.ct-wizard-orange .picture:hover{
    border-color: #ff9500;
}
.content.ct-wizard-red .picture:hover{
    border-color: #ff3b30;
}
.picture input[type="file"] {
    cursor: pointer;
    display: block;
    height: 100%;
    left: 0;
    opacity: 0 !important;
    position: absolute;
    top: 0;
    width: 100%;
}

.picture-src{
    width: 100%;
    
}
/*Profile Pic End*/
</style>
 
<div class="main-panel">
			<div class="content">
				<div class="panel-header">
				@if($showing)
				@foreach($showing as $shows)
				@if($shows->photo_id == '')
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row ">
							<div class="col-12">
							<div class="col-6">
					          <div class="avatar float-left mr-2" style="height:100px; width:100px;">
							  <div class="picture-container">
                                  <div class="picture">
								  <form method="post" action="{{route('update_pic')}}"  enctype="multipart/form-data">
									  @csrf<br><br>
										  <input type="file" name="image" class="form-control mt-3">
										  <input type="file" name="image" class="form-control mt-1">
										  <input type="file" name="image" class="form-control mt-1">
										  </div>
									</div>
							   </div> 
							   <button type="submit" class="btn ml-4 mt-4 white jatu-green">Upload</button>
								 </form>     
                                </div>
					         </div>
						</div>
					</div>
					@elseif($shows->photo_id !='')
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row ">
							<div class="col-12">
							<div class="col-6">
					          <div class="avatar float-left mr-2" style="height:100px; width:100px;">
							  <div class="picture-container">
                                  <div class="picture">
								  <form method="post" action="{{route('update_pic')}}"  enctype="multipart/form-data">
									  @csrf<br><br>
									  @if($pic)
                                 
									  <img src="/img/{{$shows->path}}"  width="100px" class="heigavatar-img rounded-circle">
										  <input type="file" name="image" class="form-control mt-3">
										@endif 
										</div>
									</div>
							   </div> 
							   <button type="submit" class="btn ml-4 mt-4 white jatu-green">Upload</button>
								 </form>     
                                </div>
					         </div>
						</div>
					</div>
					@endif
					@endforeach
					@endif
				</div>
				<div class="page-inner">
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
															<br>				
                                                   </div>
												   <button type="submit" class="btn ml-4 mt-4 white jatu-green">Edit</button>
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
<script>
$$(document).ready(function(){
// Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>