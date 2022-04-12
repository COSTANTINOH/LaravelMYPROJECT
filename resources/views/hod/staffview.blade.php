@extends('layouts.base')
@section('contents')
    <div class="main-panel">
        <div class="content">
            
            <div class="page-inner">                    
                <div class="page-header">
                    <h4 class="page-title orange">My Department Staffs</h4>
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
                            <a href="#">Staffs</a>
                        </li>
                    </ul>
                </div>
                
            
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">My Department Staffs</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Branch</th>
                                                <th>Phone Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staffs as $users)
                                            <tr>
                                            <td>{{$users->first_name}} {{$users->middle_name}} {{$users->last_name}}</td>      
                                            <td>{{$users->email}}</td>

                                            @foreach ($branch_name as $branch)
                                            <td>{{$branch->bname}}</td>
                                            @endforeach
                                            
                                            
                                            @foreach($users->phones as $phone)
                                            <td>{{$phone->phone}}</td>
                                            @endforeach

                                            <td>
                                                
                                            <a href="{{route('view-staff',$users->id)}}">
                                            <button type="button" data-toggle="tooltip" title=""  class="badge badge-pill jatu-green px-3 py-2" data-original-title="View staff">
											<i class="fa fa-eye" style="color: white"></i> 
										   </button>
                                            </a></td>
                                            
                                            </tr> 
                                            @endforeach
                                        </tbody> 
                                    </table>
                                    
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
@endsection