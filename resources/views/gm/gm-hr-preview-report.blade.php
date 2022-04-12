@extends('layouts.base')
<script type="text/javascript">
    function printCont(el) {
        var rePage = document.body.innerHTML;
        var x = document.getElementsByClassName("ignore");
        var i;
        for(i =0;i<x.length;i++){
            x[i].style.display = "none";
        }
        var printCont = document.getElementById(el).innerHTML;
        document.body.innerHTML = printCont;
        window.print();
        document.body.innerHTML = rePage;
        window.close();
    }
</script>
@section('contents')
		<div class="main-panel">

			@if(Session::get('success'))
					<!-- <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
						<strong> {{ Session::get('success') }} </strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div> -->

					<script>
		//== Class definition
		var SweetAlert2Demo = function() {

			//== Demos
			var initDemos = function() {

				$(document).ready( function () {
					swal(" {{ Session::get('success') }}", "Click Anywhere in Screen to close", {
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

		setTimeout(function(){
			window.location.href = '/gm/view-hr-report';
		}, 5000);
	</script>

					@endif

					@if(Session::get('failed'))
					<!-- <div class="alert alert-warning  .bg-danger alert-dismissible fade show" style="background-color: #f25961;" role="alert" id="gone">
						<strong style="color: white;font-weight: bold;"> {{ Session::get('failed') }} </strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div> -->

					<script>
		//== Class definition
		var SweetAlert2Demo = function() {

			//== Demos
			var initDemos = function() {

				$(document).ready( function () {
					swal(" {{ Session::get('failed') }}", "Click Anywhere in Screen to close", {
						icon : "warning",
						buttons: {        			
							confirm: {
								className : 'btn btn-warning'
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

			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">HR Reports</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="{{route('staff')}}">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
							<a href="{{route('gm-view-hr-report')}}">	Reports</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Preview Report</a>
							</li>
						</ul>
					</div> 
					<div class="row">
						<div class="col-md-12">
							<div class="card" id="el">
								<div class="card-header">
									<div class="card-title" id="ignore">Preview Report</div>
								</div>
 
								<center style="margin-top: 0px;">
									<table style="margin:5px;">
										<img src="{{asset('/public/img/report2.png')}}" style="width: 623px; height:164px;" >									
									</table>
								</center> 
								@csrf
								<div class="pl-5 pr-5 mr-5 ml-5 font-jatu">
									<div class="row">
										<div class="col-6">
											<h4 style="color:black;"><b>Staff Details</b></h4>
											<h6 style="color:black;"><b>Name:</b> {{App\User::find($user_id)->first_name." ".App\User::find($user_id)->middle_name." ".App\User::find($user_id)->last_name}}</h6>
											<h6 style="color:black;"><b>Department:</b> {{App\User::find($user_id)->ulbd->department->short_form}}</h6>
											<h6 style="color:black;"><b>Position:</b> {{App\User::find($user_id)->position->pname}}</h6>
											<h6 style="color:black;"><b>Phone:</b>
											@foreach (App\User::find($user_id)->phones as $phones)
												{{$phones->phone}}
											@endforeach
											</h6>
										</div>
										<div class="col-6">
											<p class="float-right">
												{{-- <b>REPORT DATE: </b>{{App\Report::find(request()->route('id'))->date}}												 --}}
											</p>
										</div>
									</div>
									<br>

									@foreach($task_list as $key=>$task)
										<table>
											<tr>
												<h4 style="color:black;"><b>TASK:</b> {{ucwords($task->title)}} </h4>

												<p style="color:black;margin-bottom:10px;"> {!!nl2br($task->description)!!} </p>
																			
											</tr>
										</table>
										<br><br>
									@endforeach
								</div>	
                                
                                @if(Auth::user()->role_id == '6')
								<div class="pl-5 pr-5 mr-5 ml-5 font-jatu">
								
                                <form action="{{route('gm-hr-report-comment-send',$id)}}" method="POST">
                                    @csrf
                                    <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="email2">Please Provide Your Review Here</label>
                                                    <textarea class="form-control" id="editor" aria-describedby="emailHelp" placeholder="Task Result" name="comment_gm" rows='20' required="required"></textarea>
                                                </div>
                                            </div>				
                                        </div>
                                    <div class="mb-5 ml-auto mr-0 float-right ">
                                        <button type="submit" class="btn jatu-green white"><i class="fa fa-paper-plane"></i> Confirm Submit</button>
                                    </div>
                                </form>
                                @elseif(Auth::user()->role_id == '7')
                                	<div style="margin: 20px;">
										@if(!($comment_gm->isEmpty()))
										<h4 class="orange" style="font-weight: bold;">Comment from General Manager</h4>	
										@foreach($comment_gm as $comment_gm)
										<p style="font-size:15px;"> {!! $comment_gm !!} </p>
										@endforeach
										@endif
									</div>
                                @endif
							</div>
							</div>


								<div class="mb-5 ml-auto mr-0 float-right ">
									<button type="submit" style="width:200px;border-radius: 25px;padding: 10px; height: 50px;" class="ignore jatu-green white" onclick="printCont('el')" class="btn btn-success"><i class="fa fa-print" style="font-size:20px" ></i> <span style="font-weight: bold;font-size: 20px"> Print</span></button>
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
								<a class="nav-link" href="#">
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
						Designed and Developed <i class="fa fa-heart heart text-danger"></i> by <a href="">JATU PLC</a>
					</div>				
				</div>
			</footer>
		</div>
	@endsection