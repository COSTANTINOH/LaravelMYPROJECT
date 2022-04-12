@extends('layouts.base')
@section('contents')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">	
            <h4 class="page-title orange">Positions</h4>					
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
                        <a href="{{route('location-list')}}">Positions</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Position</a>
                    </li>
                </ul>						
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Position</div>
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
                                    @if($position)
                                <form action="{{route('update-position',$position->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="target">Positions Name</label>
                                    <input type="text" class="form-control" name="position" value="{{ $position->pname }}" placeholder="Enter Location name" required>                                    
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn jatu-green white"  value="Update">
                                    </div>	
                                </form>		
                                @endif								
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