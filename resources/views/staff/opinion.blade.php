@extends('layouts.base')

@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="panel-header">
					<div class="page-inner py-3">
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
                                    <a href="{{route('opinion-preview')}}">View Opinions</a>
                                </li>
                            </ul>
                        </div>
					</div>
				</div>
				<div class="page-inner mt--5">
                    <div class="row">
                        <div class="col-md-12">
                         <div class="card">
                             {{--YOUR FORM IS HERE--}}

                             @if(Session::has('success'))
                             <script>
                                var SweetAlert2Demo = function() {
                                    var initDemos = function() {                        
                                        $(document).ready( function () {
                                            swal(" {{ Session::get('success') }}", "click button to dismiss!", {
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

                             @if(Session::has('fail'))
                             <script>
                                //== Class definition
                                var SweetAlert2Demo = function() {
                                    var initDemos = function() {
                                        $(document).ready( function () {
                                            swal(" {{ Session::get('fail') }}", "click button to dismiss!", {
                                                icon : "fail",
                                                buttons: {        			
                                                    confirm: {
                                                        className : 'btn btn-danger'
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

                         <form method="POST" action="{{route('opinion')}}" enctype="multipart/form-data">
                         @csrf
                                <div class="card-header">
                                    <div class="card-title">Opinions and Suggestions</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2 col-lg-12">
                                        <div class="card-title">Your opinions and suggestions are valuable to us. be free to express and surely your identity is kept a secret</div>
                                            <div class="form-group">
                                                <label for="comment">Add your opinions/suggestions here</label>
                                                <textarea class="form-control" name="description" id="editor1" rows="5" required>
                    
                                                </textarea>
                                            </div>
                                            <div class="form-check">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">				 
                                    </div>
                                </div>
                                <div class="mb-5 ml-auto mr-0 float-right ">

                                    <button class="btn jatu-green white" type="submit">Submit</button>


                                </div>
                            </form>
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