@extends('layouts.base')
@section('contents')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
            <h4 class="page-title orange">Permissions</h4>						
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
                        <a href="#">Permission request</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                    <a href="{{route('show_permission')}}">View Permission Request</a>
                    </li>
                </ul>						
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
@if($check == 0)
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Permission request</div>
            </div>
            
    
            <div class="card-body">
                <div class="row">                            
                    <div class="col-md-12 col-lg-12">
                    <form action="{{route('permission_request')}}" method="post">
                    @csrf
                    <div class="checkbox"> 
                    <label class="checkbox-custom"> 
                        <input type="checkbox" name="clases" id="clases" value="[emergency]"> sick/emergence
                        <i class="fa fa-fw fa-square-o"></i> 
                  </label>
                  </div><br><br>
                        <div class="row" id="descripcion">
                            <div class="col-4">
                                <label for="target">From:</label>
                                <input type="date" class="form-control" name="from"  value="{{old('from')}}"> 
                            </div>
                            <div class="col-4">
                                <label for="target">To:</label>
                                <input type="date" class="form-control" name="to" value="{{old('to')}}"> 
                            </div>
                        </div> <br><br>

                    
                            <div class="row">
                            <div class="col-12">
                                <label for="target">I Request:</label>
                                <textarea name="details" id="editor" cols="30" rows="5" required>{{old('details')}}</textarea>
                            </div>
                        </div> <br><br>
                        <div class="row">
                        <div class="col-4">
                        <button type="submit" class="btn jatu-green white">Send</button>
                        </div>
                        </div>
                    </form>										
                    </div>
                </div>
            </div>
        </div>							
    </div> 
</div>
 @elseif($check == 1)
 <div class="col-md-12">
    <div class="card full-height jatu-bd-orange">
        <div class="card-body" style="margin:20px;">
            <center><div class="card-title">
                You have a request for permission in the process
            </div></center>
            
            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                
                <div class="px-2 pb-2 pb-md-0 text-center">
                    <div id="" class="jatu-orange-c">
                        <i class="fa fa-check fa-5x"></i>
                    </div>
                    <a href="{{route('staff')}}" class="btn jatu-orange white mt-3">
                        <h6 class="fw-bold mt-0 mb-0">Click Here to return home</h6>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>
@elseif($check == 2)
<div class="col-md-12">
    <div class="card full-height jatu-bd-orange">
        <div class="card-body" style="margin:20px;">
            <center><div class="card-title">
                If You are back to work submit the form bellow to notify your Head Of Department
            </div></center>
            
            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                
                <div class="px-2 pb-2 pb-md-0 text-center">
                    <div>
                        <form action="{{route('return-day')}}" method="POST">
                            @csrf
                            <label for="date">MM/DD/YYYY</label>
                            <input type="date" value="{{date('Y-m-j')}}" name="return_day" class="form-control" placeholder="Enter date" readonly>
                            <button type="submit" class="btn jatu-green white mt-3">Submit</button>
                        </form>
                    </div>
                    {{-- <a href="{{route('staff')}}" class="btn jatu-orange white mt-3">
                        <h6 class="fw-bold mt-0 mb-0">Click Here to confirm return day</h6>
                    </a> --}}
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
 @endif
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
                let today = new Date().toISOString().substr(0, 10);
                document.querySelector("#today").value = today;
            </script>


    <script type="text/javascript">
    let x = document.getElementById('clases');

    if(x.checked){

        $(document).ready(function () {
     $("#descripcion").hide();
     $("#clases").change(function () {
    $("#descripcion").toggle();
    });
    });

    }
    else{

        $(document).ready(function () {
     $("#descripcion").show();
     $("#clases").change(function () {
    $("#descripcion").toggle();
    });
    });
    }
    
    
        </script>  


 @endsection