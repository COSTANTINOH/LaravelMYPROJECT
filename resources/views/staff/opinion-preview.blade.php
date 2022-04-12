@extends('layouts.base')

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
                            <a href="{{route('staff')}}">
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
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Your opinions</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Opinions</th>
                                            <th>Date</th>
                                            <th>Action</th>
											<th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($opinion as $opin)
                                        <tr>
                                        <td>{!!Str::limit(strip_tags($opin->description), 80,$end='....')!!}</td>
                                        <td>{{$opin->date}}</td>
                                        <td><a href="{{route('staff-view-full', $opin->id)}}"><i class="fa fa-eye jatu-orange-c ml-3"></i></td>
										<td>
										@if ($opin->status== 0)
											<i class="fa fa-check" style="color: red"></i>
										@else
											<i class="fa fa-check-double" style="color: blue"></i>
										@endif											
									    </td>
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