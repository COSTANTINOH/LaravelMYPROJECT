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
									<div class="card-title">Statistics</div>
									<div class="card-category">statistics in system</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="staff_num"></div>
											<h6 class="fw-bold mt-3 mb-0">Total  Staff</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="dept_num"></div>
											<h6 class="fw-bold mt-3 mb-0">Total  Departments</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="branch_num"></div>
											<h6 class="fw-bold mt-3 mb-0">Total Branches</h6>
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
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Staff Summary</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="ict"></div>
											<h6 class="fw-bold mt-3 mb-0">ICT Department</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="hr"></div>
											<h6 class="fw-bold mt-3 mb-0">HR Department</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="finance"></div>
											<h6 class="fw-bold mt-3 mb-0">Finance Department</h6>
										</div>
									</div>	
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="marketing"></div>
											<h6 class="fw-bold mt-3 mb-0"> Marketing Department</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="saccos"></div>
											<h6 class="fw-bold mt-3 mb-0">Jatu SACCOS Department</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="transport"></div>
											<h6 class="fw-bold mt-3 mb-0"> Transportation Department</h6>
										</div>
									</div>								
								</div>
							</div>
						</div>
						<!-- <div class="col-md-6">
							<div class="card full-height">
								<div class="card-body card-category">
									<div class="row py-3">
										<div class="col-md-12">
											<div class="card-title card-category">Staff Hours Spend</div>
											<div id="chartContainer" style="height: 300px; width: 100%;"></div>
											
										</div>
									</div>
								</div>
							</div>
						</div> -->
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Number of People who Write Report</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
									<div id="chartContainer4" style="height: 300px; width: 100%;"></div>
									</div>							
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body card-category">
									<div class="row py-3">
										<div class="col-md-12">
											<div class="card-title card-category" style="color:black;font-weight:bold;">Top 3 Staffs Having Many Tasks Today</div>
											<!-- <div id="chartContainer2" style="height: 300px; width: 100%;"></div> -->
											<div class="col-md-12" style="padding:30px;">
											@foreach($report_id as $reports)
												<center>
													<h2 class="jatu-green" style="padding-top:25px;"><span style="color:white;font-weight: bold;">{{ App\User::select('first_name')->where('id',App\Report::select('user_id')->where('id',$reports)->pluck('user_id')->first())->pluck('first_name')->first() }}

													{{ App\User::select('middle_name')->where('id',App\Report::select('user_id')->where('id',$reports)->pluck('user_id')->first())->pluck('middle_name')->first() }}

													 {{ App\User::select('last_name')->where('id',App\Report::select('user_id')->where('id',$reports)->pluck('user_id')->first())->pluck('last_name')->first() }}</span> <br/> <br/></h2>
												</center>
											@endforeach
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
			id:'staff_num',
			radius:45,
			value:{{ $user_num }},
			maxValue:100,
			width:7,
			text:'{{ $user_num }}',
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'dept_num',
			radius:45,
			value:{{ $dept_num}},
			maxValue:100,
			width:7,
			text:'{{ $dept_num}}',
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'branch_num',
			radius:45,
			value:{{$branch_num}},
			maxValue:100,
			width:7,
			text:'{{$branch_num}}',
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})


		Circles.create({
			id:'ict',
			radius:45,
			value:'{{$totals['ict']}}',
			maxValue:100,
			width:7,
			text:'{{$totals['ict']}}',
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'hr',
			radius:45,
			value:'{{$totals['hr']}}',
			maxValue:100,
			width:7,
			text:'{{$totals['hr']}}',
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'finance',
			radius:45,
			value:'{{$totals['finance']}}',
			maxValue:100,
			width:7,
			text:'{{$totals['finance']}}',
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})


		Circles.create({
			id:'marketing',
			radius:45,
			value:'{{$totals['marketing']}}',
			maxValue:100,
			width:7,
			text:'{{$totals['marketing']}}',
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'transport',
			radius:45,
			value:'{{$totals['transport']}}',
			maxValue:100,
			width:7,
			text:'{{$totals['transport']}}',
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'saccos',
			radius:45,
			value:'{{$totals['saccos']}}',
			maxValue:100,
			width:7,
			text:'{{$totals['saccos']}}',
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
	<script>
// window.onload = function () { {y:200}

var chart3 = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	data: [{        
		type: "line",
      	indexLabelFontSize: 16,
		dataPoints: [
			<?php
			  $i = 0;
			  while($i < $sum_count){
			  	  echo "{y:$sum_hours[$i]},";
			  	$i++;
			  }
			?>
		]
	}]
});
chart3.render();

// }
</script>



<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	theme: "light2",
	axisX:{
		valueFormatString: "DD-MMM",
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY: {
		title: "Number of People Write Report",
		includeZero: true,
		crosshair: {
			enabled: true
		}
	},
	toolTip:{
		shared:true
	},  
	legend:{
		cursor:"pointer",
		verticalAlign: "bottom",
		horizontalAlign: "left",
		dockInsidePlotArea: true,
		itemclick: toogleDataSeries
	},
	data: [{
		type: "line",
		showInLegend: true,
		name: "Total Number",
		markerType: "square",
		xValueFormatString: "YYYY-MMM-DD",
		color: "#F08080",
		dataPoints: [
			// { x: new Date(2017, 0, 3), y: 650 },
			<?php
			foreach ($sum_people as $i) {
             echo "{ x: ($i->date)}".','."{y: $i->reports },";
            }
			?>
		]
	}]
});
chart.render();

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>
@endsection
