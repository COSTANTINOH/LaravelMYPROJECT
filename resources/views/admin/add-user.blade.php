@extends('layouts.base')
@section('contents')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">						
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
                        <a href="{{route('staff-list')}}">Users</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add User</a>
                    </li>
                </ul>						
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add User</div>
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
                                <form action="{{route('save-staff')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="target">First Name</label>
                                        <input type="text" class="form-control" name="fname" value="{{ old('fname') }}" placeholder="Enter Location name eg. Victor" >                                    
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="target">Midle Name</label>
                                        <input type="text" class="form-control" name="mname" value="{{ old('mname') }}" placeholder="Enter Location name eg. Constatino" >                                    
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="target">Last Name</label>
                                        <input type="text" class="form-control" name="lname" value="{{ old('lname') }}" placeholder="Enter Location name eg. Moses" >                                    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="target">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Location name eg. shedrack@jrs.com" >                                    
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="title">Location</label>
                                            <select class="form-control" name="location">
                                                <option>Choose Location...</option>
                                                @foreach($location as $loc)
                                                    <option value="{{ $loc->id }}"> {{ $loc->lname }} </option>
                                                @endforeach
                                            </select>                  
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="title">Department</label>
                                            <select class="form-control" name="department">
                                                <option>Choose Department...</option>
                                                @foreach($dept as $dep)
                                                    <option value="{{ $dep->id }}"> {{ $dep->fullname }} </option>
                                                @endforeach
                                            </select>                  
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="title">Branch</label>
                                            <select class="form-control" name="branch">
                                                <option>Choose Branch...</option>
                                                @foreach($branch as $brnch)
                                                    <option value="{{ $brnch->id }}"> {{ $brnch->bname }} </option>
                                                @endforeach
                                            </select>                  
                                        </div>
                                    </div>
                                    <div class="row">                                        
                                        <div class="form-group col-md-3">
                                            <label for="title">Region</label>
                                            <select class="form-control" name="region">
                                                <option>Choose Location...</option>                                                
                                            </select>                  
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="title">District</label>
                                            <select class="form-control" name="district">
                                                <option>Choose Location...</option>                                                
                                            </select>                  
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="title">Ward</label>
                                            <select class="form-control" name="ward">
                                                <option>Choose Location...</option>                                                
                                            </select>                  
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="target">Street</label>
                                        <input type="text" class="form-control" name="street" value="{{ old('street') }}" placeholder="Enter Street name eg. Mwembechai" >                                    
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn jatu-green white"  value="Save">
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