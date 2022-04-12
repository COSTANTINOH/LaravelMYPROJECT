@extends('staff.layout.base')
<script>
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
				<div class="panel-header">

                </div>

                
            {{--YOUR OPINION FORM HERE--}}
                <div class="col-md-12">
                    <div class="page-header">
                        <h4 class="page-title orange">Opinions</h4>
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
                                <a href="{{route('opinion')}}">Create Opinions</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">View Opinions</a>
                            </li>
                        </ul>
                    </div>



                    <div class="card">
                        <div class="card-header">
                            {{-- <div class="d-flex align-items-center">
                                <h4 class="card-title">Your Opinions</h4>
                            </div> --}}
                            <div class="d-flex align-items-center">
                            {{-- <a href="{{route('printing')}}" class="btn jatu-green white">Print</a> --}}
                            {{-- <a href="" onclick="PrintElem('add-row')" class="btn jatu-green white">Print</a> --}}
                                <button class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                                onclick="printCont('el')">Print</button>
                            </div>
                        </div>
                        <div class="card-body"  id="el">
                            <div class="table-responsive">
                                <table id="el" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Report title</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($report as $report)
                                        <tr>
                                        <td>{{$report->first_name}}</td>
                                        <td>{{$report->title}}</td>
                                        <td>{{$report->description}}</td>
                                        </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                                
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