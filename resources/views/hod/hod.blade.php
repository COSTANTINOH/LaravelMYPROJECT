@extends('layouts.base')
@section('contents')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title orange">Forms</h4>
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
								<a href="#">Target</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Create Target</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Create Target</div>
								</div>
								<?php //$today = date('N', time()); echo $today; ?> 
								<div class="card-body">
									<div class="row">
									 
										<div class="col-md-12 col-lg-12">
										<form action="{{route('save-target')}}" method="POST">
											@csrf
											<div class="form-group">
												<label for="target">Write your weekly Target</label>
												<!-- <input type="text" class="form-control" name="target" id="target" placeholder="Enter Your Weekly Target"> -->
												<textarea name="target" id="editor" cols="30" rows="5"></textarea>
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