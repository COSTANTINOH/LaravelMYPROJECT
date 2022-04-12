@extends('layouts.base')
@section('contents')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
            <h4 class="page-title orange">Branches</h4>						
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
                        <a href="{{route('branch-list')}}">Branches</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Branch</a>
                    </li>
                </ul>						
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Branch</div>
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
                                    @if($branch)
                                <form action="{{route('update-branch',$branch->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="target">Branch Name</label>
                                    <input type="text" class="form-control" name="branch" value="{{ $branch->bname }}" placeholder="Enter Branch name" required>                                    
                                    </div>
                                    <div class="form-group">
                                        <label for="target">Location</label>
                                        <select name="location" class="form-control" required>
                                            <option value="">Choose From List</option>
                                            @foreach($location as $loc)
                                            <option value="{{$loc->id}}"  {{ $loc->id == $branch->location_id ? 'selected' : ''  }}>{{$loc->lname}}</option>
                                            @endforeach                                           
                                        </select>
                                        {{-- <input type="text" class="form-control" name="department_short" value="{{ old('department_short') }}" placeholder="Enter Department short name eg. ICT" >                                     --}}
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