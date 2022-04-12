@extends('layouts.base')

@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="panel-header">
                </div>        
    
                <div class="col-md-12">
                    <div class="page-header">
                        <h4 class="page-title orange">Permission</h4>
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
                                <a href=""></a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Requested Permission</h4>
                            </div>
                        </div>
                        <div class="card-body">
                        <center style="margin-top: 0px;">
                        <table style="margin:5px;">
                            <tr>
                                <td>
                                    <img src="{{asset('/public/img/perm.PNG')}}"  style="width: 992px; height:150px;" >	
                                </td>
                            </tr>	
                            <tr>
                                <td>
                                @foreach($hr_view as $details)
                                {!!$details->request!!} 

                                {!!$details->hod_recommendation!!} 

                                {!!$details->hr_recommendation!!} 
                                @endforeach	
                                </td>
                            </tr>								
                        </table>
						</center> 
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