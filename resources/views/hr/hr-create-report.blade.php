@extends('layouts.base')
<style>
    @media screen and (min-width: 1000px) {
        .modal-dialog {
          max-width: 1000px; /* New width for default modal */
        }
    }
</style>
@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">My Report</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Create Report</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
							<a href="{{route('hr-view-my-report')}}">View Report</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Create Report</div>
								</div>
								<!-- Modal -->
									<div class="col-lg-12" style="width: 100%">
										<div class="modal fade col-lg-12" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-lg" role="document">
									    <div class="modal-content col-lg-12">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel">Preview Report</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body col-lg-12">
									      <div>
									      	<center style="margin-top: 20px;">
									      		<table style="margin:20px;">
									      			<img src="{{asset('assets/img/download.png')}}" width="75" height="75" style="margin-bottom:10px;">
									      			<br/>
									      			<h4  style="margin-bottom:5px;color:black;font-weight: bold;">JENGA AFYA TOKOMEZA UMASIKINI (JATU)</h4>
									      			<h5  style="margin-bottom:5px;color:black;">STAFF DAILY REPORT REVIEW FORM</h5>

									      			<h5  style="color:black;"><?php $today = date('Y-m-d'); echo "$today"; ?>  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp; STAFF REPORT</h3>
									      				<hr/>
									      		</table>
									      	</center>
									      </div>
									      <p id="data" style="color:black;">
									      	Tanzania is an East African country known for its vast wilderness areas. They include the plains of Serengeti National Park, a safari mecca populated by the “big five” game (elephant, lion, leopard, buffalo, rhino), and Kilimanjaro National Park, home to Africa’s highest mountain. Offshore lie the tropical islands of Zanzibar, with Arabic influences, and Mafia, with a marine park home to whale sharks and coral reefs.
									      </p>
									      <div class="modal-footer">
									        <button type="button" class="btn jatu-green" style="color:white" data-dismiss="modal">Close</button>
									      </div>
									    </div>
									  </div>
									</div>
									</div>
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
									{{-- <div class="alert jatu-green white alert-dismissible' role='alert'">
									{{ session('status-okay') }}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span> 
									</button>
									</div> --}}
									<script>
										var SweetAlert2Demo = function() {
											var initDemos = function() {							
												$(document).ready( function () {
													swal(" {{ Session::get('status-okay') }}", "Click anywhere or button to close!", {
														icon : "success",
														buttons: {        			
															confirm: {
																className : 'btn jatu-green'
															}
														},
													});
												});
											};
	
											return {
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
								<?php //$today = date('N', time()); echo $today; ?> 
								@if($x == 0)
									<div class="card-body">
										<div class="row">
											<div class="col-md-12 col-lg-12">
											<form action="{{route('hr-save-report')}}" method="POST">
												@csrf
												<div class="col-md-6 col-lg-6">
													<div class="form-group">
														<label for="report">Report Title</label>
													<input type="text" class="form-control" name="report_title" value="{{old('report_title')}}" placeholder="Enter Report Title" required>
													</div>
												</div>
												<div class="form-group">
													<label for="target">Write your weekly Target</label>
													<!-- <input type="text" class="form-control" name="target" id="target" placeholder="Enter Your Weekly Target"> -->
													<textarea name="report" id="editor" cols="30" rows="5" required></textarea>
												</div>
												<div class="form-group">
													<input type="submit" class="btn jatu-green white"  value="Save">
													<!-- <button type="button" data-id="editor" class="mypreview btn jatu-orange" data-toggle="modal" style="color:white" data-target="#exampleModal">
													  Preview My Report
												</button> -->
												</div>		
											</form>										
											</div>
										</div>
									</div>
								@elseif($x == 1)
									<div class="col-md-12">
										<div class="card full-height jatu-bd-orange">
											<div class="card-body" style="margin:20px;">
												<center><div class="card-title">
													Sorry! you have already write your weekly report wait for the next week
												</div></center>
												<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
													<div class="px-2 pb-2 pb-md-0 text-center">
														<div id="" class="jatu-orange-c">
															<i class="fa fa-tasks fa-5x"></i>
														</div>
														<a href="{{route('hr-view-my-report')}}" class="btn jatu-orange white mt-3">
															<h6 class="fw-bold mt-0 mb-0">Click to View Report</h6>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endif
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
		<script type="text/javascript">
			$(document).on("click", ".mypreview", function () {
			     var editor_data = $(this).data('id');
			     $(".modal-body #data").val( editor_data );
			     // As pointed out in comments, 
			     // it is unnecessary to have to manually call the modal.
			     // $('#addBookDialog').modal('show');
			});
		</script>
@endsection