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
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title" style="font-weight:bold;">Below are summary statistics</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="staff_commented_back"></div>
											<h6 class="fw-bold mt-3 mb-0">Total Comment Back Reports</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="total_rec"></div>
											<h6 class="fw-bold mt-3 mb-0">Total Received</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="staff_report"></div>
											<h6 class="fw-bold mt-3 mb-0">Total Received</h6>
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
													<div class="card-title card-category"> If you stuck don't hesitate just acces the <i class="fa fa-question-circle"></i> HELP section on left bottom menu will help to understand how to navigate in JRS.</div>
												</li>

												<li> 
													<div class="card-title card-category"> You Can use the tabs founded in tables to navigate through different section of reports.</div>
												</li>
											</ol>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body card-category">
									<div class="row py-3">
										<div class="col-md-12">
										<div class="card-body">
											<div class="card-title" style="font-weight:bold;">Quick Links</div>
											<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
												<div class="px-2 pb-2 pb-md-0 text-center">
													<div><a href="{{url('/bm/bm-report-view')}}"><i class="fa fa-book fa-3x jatu-orange-c"></i></a></div>
													<h6 class="fw-bold mt-3 mb-0">Staff Report</h6>
                                                    
												</div>
												<div class="px-2 pb-2 pb-md-0 text-center">
												<div><a href="{{route('bm-view')}}"><i class="fa fa-users fa-3x jatu-orange-c"></i></a></div>
													<h6 class="fw-bold mt-3 mb-0">staff list</h6>
												</div>
												<div class="px-2 pb-2 pb-md-0 text-center">
												<div><a href="{{route('bm-opinion-view')}}"><i class="fa fa-comments fa-3x jatu-orange-c"></i></a></div>
													<h6 class="fw-bold mt-3 mb-0">Opinions</h6>
												</div>
											</div>
							             	</div>
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
			value:{{ $dept_count }},
			maxValue:100,
			width:7,
			text:'{{ $dept_count }}',
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'staff_commented_back',
			radius:45,
			value:{{$pending_comment_report}},
			maxValue:100,
			width:7,
			text:'{{$pending_comment_report}}',
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'total_rec',
			radius:45,
			value:{{$received_report}},
			maxValue:100,
			width:7,
			text:'{{$received_report}}',
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'staff_report',
			radius:45,
			value:{{$pending_report}},
			maxValue:100,
			width:7,
			text:'{{$pending_report}}',
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