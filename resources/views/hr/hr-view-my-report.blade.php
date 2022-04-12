@extends('layouts.base')
@section('contents')
<div class="main-panel">
    <div class="content">
        <div class="page-inner py-5">
            <div class="col-md-12">
                <div class="page-header">    
                <h4 class="page-title orange">View My reports</h4>                
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
                        <a href="{{route('hr-create-report')}}">Create Report</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">My Reports</a>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title orange">My Reports</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($report as $reports)
                                    <tr>     
                                        <td>
                                            @foreach ($reports->task as $task)
                                                {{$task->title}}
                                            @endforeach
                                        </td>
                                        <td>{{$reports->date}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{route('hr-view-single-report',$reports->id)}}">
                                                <i class="fa fa-eye jatu-orange-c ml-3"></i>
                                                </a>
                                            </div>
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