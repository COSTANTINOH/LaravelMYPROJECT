@extends('layouts.base')
@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="panel-header">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="orange pb-2 fw-bold">JATU REPORTING SYSTEM</h2>
								<h5 class=" op-7 mb-2" styel="color:black;"><?php date_default_timezone_set('Africa/Nairobi');  $date=date('Y-m-d h:m:s l'); echo $date?></h5>
							</div>
						</div>
					</div>
				</div>
				@if(Session::get('success'))
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
					</script>
				@endif
				@if($check == 0)
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Overall statistics</div>
									<div class="card-category">Daily information about statistics in system</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="name"></div>
											<h6 class="fw-bold mt-3 mb-0">Total Reports Submited</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="pending-task"></div>
											<h6 class="fw-bold mt-3 mb-0">Pending Tasks</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="targets"></div>
											<h6 class="fw-bold mt-3 mb-0">Total targets</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body card-category">
									<div class="row py-3">
										<div class="col-md-12">
											<div class="card-title card-category">Quick Tips</div>
											<ol>
												<li> 
													<div class="card-category"> If you stuck don't hesitate just acces the <i class="fa fa-question-circle"></i> HELP section on left bottom menu will help to understand how to navigate in JRS.</div>
												</li>

												<li> 
													<div class="card-category"> You Can use the tabs founded in tables to navigate through different section of reports.</div>
												</li>
											</ol>
											
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body card-category">
									<div class="row py-3">
										<div class="col-md-12">
											<div class="card-title card-category">Quick Links</div>
											<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
											<div class="px-2 pb-2 pb-md-0 text-center">
												<div><a href="{{route('create-target')}}"><i class="fas fa-bullseye fa-3x jatu-orange-c"></a></i></div>
											<h6 class="fw-bold mt-3 mb-0">Create Target</h6>
											</div>
											<div class="px-2 pb-2 pb-md-0 text-center">
												<div><a href="{{route('task-create')}}"><i class="fas fa-tasks fa-3x jatu-orange-c"></i></a></div>
											<h6 class="fw-bold mt-3 mb-0">Create Task</h6>
											</div>
											<div class="px-2 pb-2 pb-md-0 text-center">
												<div><a href="{{route('opinion')}}"><i class="fa fa-comments fa-3x jatu-orange-c"></i></a></div>
											<h6 class="fw-bold mt-3 mb-0">Write Opinion/suggestions</h6>
											</div>
											</div>										
											

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@elseif($check == 1)
				<div class="col-md-12">
					<div class="card full-height jatu-bd-orange">
						<div class="card-body" style="margin:20px;">
							<center><div class="card-title">
								If You are back to work submit the form bellow to notify your Head Of Department
							</div></center>
							
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								
								<div class="px-2 pb-2 pb-md-0 text-center">
									<div>
										<form action="{{route('return-day')}}" method="POST">
											@csrf
											<label for="date">MM/DD/YYYY</label>
											<input type="date" value="{{date('Y-m-j')}}" name="return_day" class="form-control" placeholder="Enter date" readonly>
											<button type="submit" class="btn jatu-green white mt-3">Submit</button>
										</form>
									</div>
									{{-- <a href="{{route('staff')}}" class="btn jatu-orange white mt-3">
										<h6 class="fw-bold mt-0 mb-0">Click Here to confirm return day</h6>
									</a> --}}
									
								</div>
								
							</div>
						</div>
					</div>
				</div>
				@endif
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
		<script>
		Circles.create({
			id:'name',
			radius:45,
			value:{{ $counts_status_comment }},
			minValue:0,
			maxValue:100,
			width:7,
			text:'{{$counts_status_comment}}',
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'pending-task',
			radius:45,
			value:{{ $counts_time_sent }},
			minValue:0,
			maxValue:100,
			width:7,
			text: '{{$counts_time_sent}}',
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'targets',
			radius:45,
			value:{{ $targets }},
			minValue:0,
			maxValue:100,
			width:7,
			text: '{{$targets}}',
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
@endsection