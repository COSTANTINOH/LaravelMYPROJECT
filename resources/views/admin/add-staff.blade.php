@extends('layouts.base')
@section('contents')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
            <h4 class="page-title orange">Staffs</h4>					
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
                        <a href="{{route('department-list')}}">staff</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add Staff</a>
                    </li>
                </ul>						
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Staff</div>
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
                        
                        @if(Session::get('fail'))
                        <script>
                            //== Class definition
                            var SweetAlert2Demo = function() {
                                //== Demos
                                var initDemos = function() {
                                    $(document).ready( function () {
                                        swal(" {{ Session::get('fail') }}", "Click Anywhere in Screen to close", {
                                            icon : "warning",
                                            buttons: {        			
                                                confirm: {
                                                    className : 'btn btn-warning'
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
                        <div class="card-body">
                            <div class="row">                            
                                <div class="col-md-12 col-lg-12">
                                <form action="{{route('reg-staff')}}" method="POST">
                                @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="target">First Name:</label>
                                            <input type="text" class="form-control" name="firstname" value="" placeholder="Enter first name" required> 
                                        </div>
                                        <div class="col-4">
                                            <label for="target">Middle Name:</label>
                                            <input type="text" class="form-control" name="middlename" value="" placeholder="Enter middle name" required> 
                                        </div>
                                        <div class="col-4">
                                            <label for="target">Last Name:</label>
                                            <input type="text" class="form-control" name="lastname" value="" placeholder="Enter last name" required> 
                                        </div>
                                    </div> <br>
                                    <div class="row ">
                                        <div class="col-4">
                                            <label for="target">Email:</label>
                                            <input type="email" class="form-control" name="email" value="" placeholder="Enter Email" required> 
                                        </div>
                                        <div class="col-4">
                                            <label for="target">Phone number:</label>
                                            <input type="text" class="form-control" name="phone" value="" placeholder="Enter Phone number" required> 
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="target">Department:</label>
                                            <select class="form-control" name="dept" required>
                                            <option value="">Select department</option>
                                            @foreach($dept as $dept)
                                            <option value="{{$dept->id}}">{{$dept->fullname}}</option>
                                            @endforeach
                                            </select> 
                                        </div>
                                        <div class="col-4">
                                            <label for="target">Branch:</label>
                                            <select class="form-control" name="bra" required>
                                            <option value="">Select Branch</option>
                                            @foreach($bra as $bra)
                                            <option value="{{$bra->id}}">{{$bra->bname}}</option>
                                            @endforeach
                                            </select>  
                                        </div>
                                        <div class="col-4">
                                            <label for="target">Location:</label>
                                            <select class="form-control" name="loc" required>
                                            <option value="">Select Location</option>
                                            @foreach($loc as $loc)
                                            <option value="{{$loc->id}}">{{$loc->lname}}</option>
                                            @endforeach
                                            </select>  
                                        </div>
                                    </div> <br>
                                     <div class="row">
                                        <div class="col-4">
                                            <label for="target">Role:</label>
                                            <select class="form-control" name="role" required>
                                            <option value="">Select Role</option>
                                            @foreach($role as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                            </select> 
                                        </div>
                                         <div class="col-4">
                                            <label for="target">Position:</label>
                                            <select class="form-control" name="position" required>
                                            <option value="">Select Position</option>
                                            @foreach($position as $position)
                                            <option value="{{$position->id}}">{{$position->pname}}</option>
                                            @endforeach
                                            </select> 
                                        </div>
                                    </div> <br>
                                    <div class="row">
                                    <div class="col-4">
                                    <button type="submit" class="btn jatu-green white">Add staff</button>
                                    </div>
                                    </div>
                                </form>										
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
            <div class="copyright ml-auto">
                Jatuplc@2020:All rights reserved 
            </div>				
        </div>
    </footer>
</div>
@endsection