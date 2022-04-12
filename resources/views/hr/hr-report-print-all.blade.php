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
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title orange">Staff Reports</h4>
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
						<a href="#">View Reports</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Preview Staff Reports</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card" id="el">
						<div class="card-header">
							<div class="card-title" id="ignore">Preview Report Form</div>
						</div>
						@foreach($report_id as $report_no)
						<center style="margin-top: 0px;">
							<table style="margin:5px;">
								<img src="{{asset('/public/img/report2.png')}}" style="width: 623px; height:164px;" >									
							</table>
						</center> 
						<div class="pl-5 pr-5 mr-5 ml-5 font-jatu">
							<div class="row">
								<div class="col-6">
									<h4 style="color:black;"><b>Staff Details</b></h4>
									<h6 style="color:black;"><b>Name:</b> {{App\User::select('first_name')->where('id',App\Report::select('user_id')->where('id',$report_no)->pluck('user_id')->first())->pluck('first_name')->first()." ".App\User::select('middle_name')->where('id',App\Report::select('user_id')->where('id',$report_no)->pluck('user_id')->first())->pluck('middle_name')->first()." ".App\User::select('last_name')->where('id',App\Report::select('user_id')->where('id',$report_no)->pluck('user_id')->first())->pluck('last_name')->first()}}</h6>
									<h6 style="color:black;"><b>Department:</b> {{App\User::find(App\Report::select('user_id')->where('id',$report_no)->pluck('user_id')->first())->ulbd->department->short_form}}</h6>
									<h6 style="color:black;"><b>Position:</b> {{App\User::find(App\Report::select('user_id')->where('id',$report_no)->pluck('user_id')->first())->position->pname}}</h6>
									<h6 style="color:black;"><b>Phone:</b>
									@foreach (App\User::find(App\Report::select('user_id')->where('id',$report_no)->pluck('user_id')->first())->phones as $phones)
										{{$phones->phone}}
									@endforeach
									</h6>
								</div>
								<div class="col-6">
									<p class="float-right">
										<b>REPORTING TIME: </b>{{App\Report::find($report_no)->reporting_time}}			<br>								
												<b>REPORT SENT TIME: </b>{{date('H:i', strtotime(App\Report::find($report_no)->updated_at))}}			<br>
										<b>REPORT DATE: </b>{{App\Report::find($report_no)->date}}												
									</p>
								</div>
							</div>
							<br>
							<h4 style="color:black;"><b>Weekly Target</b></h4>
							<h5 class="text-justify" style="color:black;margin-bottom:40px;">
								{!!  App\Target::select('name')->where('id',App\Task::select('target_id')->where('report_id',$report_no)->get()->pluck('target_id')->first())->pluck('name')->first() !!}
							</h5>

							<?php

							$task_list = App\Task::select('id')->where('report_id',$report_no)->pluck('id');
	
							$task_list_no = App\Task::where('report_id',$report_no)->get();
	
							$count = count($task_list_no);
	
							$x = 0;
	
							while($x <  $count){
	
								?>
	
								<h4 style="color:black;"><b>TASK:</b> <u>{{App\Task::select('title')->where('id',$task_list[$x])->pluck('title')->first()}}</u> <b>({{App\Task::select('time_taken')->where('id',$task_list[$x])->pluck('time_taken')->first()}})</b></h4>
								<p style="color:black;margin-bottom:10px;"> {{App\Task::select('description')->where('id',$task_list[$x])->pluck('description')->first()}} </p>
								<table border="1" width="100%">
									<tr>
										<th style="color:black;padding-left: 10px;">Results</th>
										<th style="color:black;padding-left: 10px;">Challenges</th>
									</tr>
									<tr>
										<td style="padding:10px">{!!nl2br(App\Task::select('result')->where('id',$task_list[$x])->pluck('result')->first())!!}</td>
										<td style="padding:10px">{!!nl2br(App\Task::select('challenge')->where('id',$task_list[$x])->pluck('challenge')->first())!!}</td>
									</tr>
								</table>
							
								<?php
	
								$x++;
	
							}
	 
							?>


						</div>
						<div class="pl-5 pt-5 pb-3 pr-5 mr-5 ml-5">
							<h4  style="font-weight: bold;color:black;height:30px;padding-left:10px;">Comment from HOD</h4>	
							<p style="font-size:15px;"> {!! App\Comment::select('comment')->where('report_id',$report_no)->pluck('comment')->first() !!} </p>
							<hr/>
						</div>
					@endforeach
				</div>
				<div class="mb-5 ml-auto mr-0 float-right ">
					<button type="submit" style="width:200px;border-radius: 25px;padding: 10px; height: 50px;" class="ignore jatu-green white" onclick="printCont('el')" class="btn btn-success"><i class="fa fa-print" style="font-size:20px" ></i> <span style="font-weight: bold;font-size: 20px"> Print</span></button>
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
<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


<!-- Chart JS -->
<script src="{{asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- jQuery Vector Maps -->
<script src="{{asset('assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!-- Atlantis JS -->
<script src="{{asset('assets/js/atlantis.min.js')}}"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="{{asset('assets/js/setting-demo.js')}}"></script>
<script src="{{asset('assets/js/demo.js')}}"></script>
<script>
	$('#displayNotif').on('click', function(){
		var placementFrom = 'top';
		var placementAlign = 'center';
		var state = 'plain';
		var style = 'primary';
		var content = {};

		content.message = 'Turning standard Bootstrap alerts into "notify" like notifications';
		content.title = 'Bootstrap notify';
		if (style == "withicon") {
			content.icon = 'fa fa-bell';
		} else {
			content.icon = 'none';
		}
		content.url = 'index.html';
		content.target = '_blank';

		$.notify(content,{
			type: state,
			placement: {
				from: placementFrom,
				align: placementAlign
			},
			time: 1000,
			delay: 0,
		});
	});
</script>
<script >
	$(document).ready(function() {
		$('#basic-datatables').DataTable({
		});

		$('#multi-filter-select').DataTable( {
			"pageLength": 5,
			initComplete: function () {
				this.api().columns().every( function () {
					var column = this;
					var select = $('<select class="form-control"><option value=""></option></select>')
					.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
							);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
	@endsection