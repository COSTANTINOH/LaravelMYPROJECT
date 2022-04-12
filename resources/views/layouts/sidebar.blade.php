<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="/public/img/{{Auth::user()->photo->path}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                        <span class="user-level">{{Auth::user()->role->name}}({{Auth::user()->ulbd->department->short_form}})</span>
                        </span>
                    </a>
                </div>
            </div> 
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="{{route('staff')}}" class="collapsed jatu-orange" aria-expanded="false">
                        <i class="fas fa-home white"></i>
                        <p style="color: white;font-weight: bold">Home</p>
                    </a>							
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                @if(Auth::user()->role_id == '2')
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-bullseye"></i>
                        <p>Weekly Target</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('create-target')}}">
                                    <span class="sub-item">Create Target</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('view-targets')}}">
                                    <span class="sub-item">View Targets</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base2">
                        <i class="fas fa-tasks"></i>
                        <p>Task</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base2">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('task-create') }}">
                                    <span class="sub-item">Create Task</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('task-list') }}">
                                    <span class="sub-item">View Task</span>
                                </a>
                            </li>			
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base1">
                        <i class="fas fa-book"></i>
                        <p>Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base1">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('staff-view-report')}}">
                                    <span class="sub-item">View Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base9">
                        <i class="fas fa-check"></i>
                        <p>Permission</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base9">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('permission_note')}}">
                                    <span class="sub-item"> Request Permission</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('show_permission')}}">
                                    <span class="sub-item"> Show Permission</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base3">
                        <i class="fas fa-comments"></i>
                        <p>Opinion/Suggestions</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base3">
                        <ul class="nav nav-collapse">									
                            <li>
                                <a href="{{route('opinion')}}">
                                    <span class="sub-item">Write opinion/suggestion</span>
                                </a>
                            </li>	
                            <li>
                                <a href="{{route('opinion-preview')}}">
                                    <span class="sub-item">View Opinions/suggestions</span>
                                </a>
                            </li>		
                        </ul>
                    </div>
                    
                    <li class="mx-4 mt-2 jatu-orange">
                    <a href="{{route('view-help')}}" class="btn btn-block jatu-orange" style="color: white;font-weight: bold"><span class="btn-label mr-2"> <i class="fa fa-question-circle"></i> </span>Help</a> 
                    </li>
                </li>
                @elseif(Auth::user()->role_id == '3')
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">

                        <i class="fa fa-book"></i>
                        <p>Staff Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{url('/hod/hod-report-view')}}">
                                    <span class="sub-item">Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base2">
                        <i class="fas fa-users"></i>
                        <p>Staffs</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base2">
                        <ul class="nav nav-collapse">
                            <li>
                            <a href="{{route('staffview')}}">
                                    <span class="sub-item">View staffs</span>
                                </a>
                            </li>											
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#approval">
                        <i class="fas fa-check-circle"></i>
                        <p>Approval</p>
                        <span class="caret"></span>
                     </a>
                     <div class="collapse" id="approval">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('hod-staff-approval')}}">
                                    <span class="sub-item">Staff Approval</span>
                                </a>
                            </li>
                             <li>
                                <a href="{{route('hod-staff-view-approval')}}">
                                    <span class="sub-item">View Approvals</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#basep">
                        <i class="fas fa-check"></i>
                    <p>Permissions  </p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="basep">
                        <ul class="nav nav-collapse">                            
                            <li>
                                <a href="{{route('view-requests')}}">
                                    <span class="sub-item">Permissions Request</span>
                                </a>
                            </li>			
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base3">
                        <i class="fas fa-book"></i>
                        <p>My Report </p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base3">
                        <ul class="nav nav-collapse">
                            <li>

                            <a href="{{route('hod-create-report')}}">
                                    <span class="sub-item">Create Report</span>
                                </a>
                            </li>
                            <li>
                            <a href="{{route('hod-view-my-report')}}">
                                    <span class="sub-item">View Report</span>
                                </a>
                            </li>			
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base4">
                        <i class="fas fa-comments"></i>
                        <p>Opinions/Suggestions </p>
                        
                        <span class="caret"></span>
                        
                    </a>
                    <div class="collapse" id="base4">
                        <ul class="nav nav-collapse">									
                            <li>
                            <a href="{{route('hod-opinion-view')}}">
                                    <span class="sub-item">View Opinion</span>
                                </a>
                            </li>		
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#writereport">
                        <i class="fa fa-print"></i>
                        <p>Print</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="writereport">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('hr-staff-print-report')}}">
                                    <span class="sub-item">View Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mx-4 mt-2 jatu-orange">
                    <a href="{{route('hod-view-help')}}" class="btn btn-block jatu-orange" style="color: white;font-weight: bold"><span class="btn-label mr-2"> <i class="fa fa-question-circle"></i> </span>Help</a> 
                </li>
                @elseif(Auth::user()->role_id == '4')
                <li class="nav-item">
                    <a data-toggle="collapse" href="#staffreport">
                        <i class="fa fa-book"></i>
                        <p>Staff Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="staffreport">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{url('/bm/bm-report-view')}}">
                                    <span class="sub-item">Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                    <i class="fas fa-users"></i>
                        <p>staff</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('bm-view')}}">
                                    <span class="sub-item">View staff</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#approval">
                        <i class="fas fa-check-circle"></i>
                        <p>Approval</p>
                        <span class="caret"></span>
                     </a>
                     <div class="collapse" id="approval">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('bm-staff-approval')}}">
                                    <span class="sub-item">Staff Approval</span>
                                </a>
                            </li>
                             <li>
                                <a href="{{route('bm-staff-view-approval')}}">
                                    <span class="sub-item">View Approvals</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base3">
                        <i class="fas fa-check"></i>
                    <p>Permissions  </p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base3">
                        <ul class="nav nav-collapse">                            
                            <li>
                            <a href="{{route('view-requests')}}">
                                    <span class="sub-item">Permissions Request</span>
                                </a>
                            </li>			
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                 <a data-toggle="collapse" href="#opinions">
                        <i class="fa fa-comments"></i>
                        <p>Opinions/Suggestions</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="opinions">
                        <ul class="nav nav-collapse">
                            <li>
                            <a href="{{route('bm-opinion-view')}}">
                                    <span class="sub-item">View opinions</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                   <li class="nav-item">
                    <a data-toggle="collapse" href="#writereport">
                        <i class="fa fa-print"></i>
                        <p>Print</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="writereport">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('bm-staff-print-report')}}">
                                    <span class="sub-item">View Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <li class="mx-4 mt-2 jatu-orange">
                         <a href="{{route('bm-view-help')}}" class="btn btn-block jatu-orange" style="color: white;font-weight: bold"><span class="btn-label mr-2"> <i class="fa fa-question-circle"></i> </span>Help</a> 
                     </li>
                </li>
                @elseif(Auth::user()->role_id == '5')
                <li class="nav-item">
                    <a data-toggle="collapse" href="#staff-report">
                        <i class="fa fa-user"></i>
                          <p>Staff's Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="staff-report">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('hr-view-staff-report')}}">
                                    <span class="sub-item">View Report</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#hod-report">
                        <i class="fa fa-user-tie"></i>
                           <p>Hod's Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="hod-report">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('hr-view-hod-report')}}">
                                    <span class="sub-item">View Report</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#report">
                        <i class="fa fa-book"></i>
                        <p>My Report</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="report">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('hr-create-report')}}">
                                    <span class="sub-item">Create Report</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('hr-view-my-report')}}">
                                    <span class="sub-item">View Report</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#staff">
                        <i class="fas fa-users"></i>
                        <p>Staffs</p>
                        <span class="caret"></span>
                     </a>
                     <div class="collapse" id="staff">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('view-departments')}}">
                                    <span class="sub-item">View Departments</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('view-all-staff')}}">
                                    <span class="sub-item">View Staffs</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                 <li class="nav-item">
                    <a data-toggle="collapse" href="#approval">
                        <i class="fas fa-check-circle"></i>
                        <p>Approval</p>
                        <span class="caret"></span>
                     </a>
                     <div class="collapse" id="approval">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('hr-staff-approval')}}">
                                    <span class="sub-item">Staff Approval</span>
                                </a>
                            </li>
                             <li>
                                <a href="{{route('hr-staff-view-approval')}}">
                                    <span class="sub-item">View Approvals</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base3">
                        <i class="fas fa-check"></i>
                    <p>Permissions  </p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base3">
                        <ul class="nav nav-collapse">                            
                            <li>
                                <a href="{{route('permission-process')}}">
                                    <span class="sub-item">Process Request</span>
                                </a>
                            </li>			
                        </ul>
                    </div>
                </li>
                 <li class="nav-item">
                    <a data-toggle="collapse" href="#writereport">
                        <i class="fa fa-print"></i>
                        <p>Print</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="writereport">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('hr-print-report')}}">
                                    <span class="sub-item">View Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#opinion">
                    <i class="fa fa-comments"></i>

                        <p>Opinions</p>
                        <span class="caret"></span>
                     </a>
                     <div class="collapse" id="opinion">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('hr-opinion-view')}}"> 
                                    <span class="sub-item">View opinions</span>
                                </a>
                            </li>
                        </ul>
                        </div>
                        <li class="mx-4 mt-2 jatu-orange">
                         <a href="{{route('hr-view-help')}}" class="btn btn-block jatu-orange" style="color: white;font-weight: bold"><span class="btn-label mr-2"> <i class="fa fa-question-circle"></i> </span>Help</a> 
                       </li>
                    
                </li>
                @elseif(Auth::user()->role_id == '6')
                <li class="nav-item">
                    <a data-toggle="collapse" href="#gm-hr-report">
                        <i class="fa fa-user"></i>
                          <p>HR Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="gm-hr-report">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('gm-view-hr-report')}}">
                                    <span class="sub-item">View HR Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> 
                <li class="nav-item">
                    <a data-toggle="collapse" href="#staff">
                        <i class="fas fa-users"></i>
                        <p>Staffs</p>
                        <span class="caret"></span>
                     </a>
                     <div class="collapse" id="staff">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('gm-view-departments')}}">
                                    <span class="sub-item">View departments</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('view-all-staff-gm')}}">
                                    <span class="sub-item">View Staffs</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#writereport">
                        <i class="fa fa-print"></i>
                        <p>Print</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="writereport">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('hr-print-report')}}">
                                    <span class="sub-item">View Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <li class="mx-4 mt-2 jatu-orange">
                         <a href="{{route('gm-view-help')}}" class="btn btn-block jatu-orange" style="color: white;font-weight: bold"><span class="btn-label mr-2"> <i class="fa fa-question-circle"></i> </span>Help</a> 
                       </li>
                </li>
                @elseif(Auth::user()->role_id == '7')
                <li class="nav-item">
                    <a data-toggle="collapse" href="#ceo-hr-report">
                        <i class="fa fa-user"></i>
                          <p>HR Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="ceo-hr-report">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('ceo-view-hr-report')}}">
                                    <span class="sub-item">View HR Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#staff">
                        <i class="fas fa-users"></i>
                        <p>Staffs</p>
                        <span class="caret"></span>
                     </a>
                     <div class="collapse" id="staff">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('ceo-view-departments')}}">
                                    <span class="sub-item">View departments</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('view-all-staff-ceo')}}">
                                    <span class="sub-item">View Staffs</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#writereport">
                        <i class="fa fa-print"></i>
                        <p>Print</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="writereport">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('hr-print-report')}}">
                                    <span class="sub-item">View Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <li class="mx-4 mt-2 jatu-orange">
                    <a href="{{route('ceo-view-help')}}" class="btn btn-block jatu-orange" style="color: white;font-weight: bold"><span class="btn-label mr-2"> <i class="fa fa-question-circle"></i> </span>Help</a> 
                  </li>
                </li>
                @elseif(Auth::user()->role_id == '1')
                <li class="nav-item">
                    <a data-toggle="collapse" href="#a">
                        <i class="fa fa-university"></i>
                          <p>Department</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="a">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('department')}}">
                                    <span class="sub-item">Add Department</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('department-list')}}">
                                    <span class="sub-item">Manage Department</span>
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#b">
                        <i class="fa fa-map-marker-alt"></i>
                          <p>Location</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="b">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('location')}}">
                                    <span class="sub-item">Add Location</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('location-list')}}">
                                    <span class="sub-item">Manage Location</span>
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#c">
                        <i class="fa fa-code-branch"></i>
                          <p>Branch</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="c">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('branch')}}">
                                    <span class="sub-item">Add Branch</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('branch-list')}}">
                                    <span class="sub-item">Manage Branch</span>
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#d">
                        <i class="fa fa-users"></i>
                          <p>Staff</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="d">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('add-staff')}}">
                                    <span class="sub-item">Add Staff</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin-view-staff')}}">
                                    <span class="sub-item">Manage Staff</span>
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                 <li class="nav-item">
                    <a data-toggle="collapse" href="#position">
                        <i class="fa fa fa-user-secret"></i>
                          <p>Positions</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="position">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('add-position')}}">
                                    <span class="sub-item">Add Position</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('view-position')}}">
                                    <span class="sub-item">Manage Position</span>
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#role">
                        <i class="fa fa fa-user-secret"></i>
                          <p>Roles</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="role">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('add-role')}}">
                                    <span class="sub-item">Add Roles</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('view-role')}}">
                                    <span class="sub-item">Manage Roles</span>
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                 <li class="nav-item">
                    <a data-toggle="collapse" href="#Holiday">
                        <i class="fa fa fa-gift"></i>
                          <p>Holiday</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Holiday">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('holiday')}}">
                                    <span class="sub-item">Add Holiday</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('holiday-list')}}">
                                    <span class="sub-item">Manage Holiday</span>
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                 <li class="nav-item">
                    <a data-toggle="collapse" href="#print">
                        <i class="fa fa fa-print"></i>
                          <p>Print</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="print">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('hr-print-report')}}">
                                    <span class="sub-item">Print Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                 <li class="nav-item">
                 <a data-toggle="collapse" href="#opinions">
                        <i class="fa fa-comments"></i>
                        <p>Opinions/Suggestions</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="opinions">
                        <ul class="nav nav-collapse">
                            <li>
                            <a href="{{route('admin-opinion-view')}}">
                                    <span class="sub-item">View opinions</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                 <li class="nav-item">
                    <a data-toggle="collapse" href="#approval">
                        <i class="fas fa-check-circle"></i>
                        <p>Approval</p>
                        <span class="caret"></span>
                     </a>
                     <div class="collapse" id="approval">
                        <ul class="nav nav-collapse">
                             <li>
                                <a href="{{route('hr-staff-view-approval')}}">
                                    <span class="sub-item">View Approvals</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#pass">
                        <i class="fa fa fa-key"></i>
                          <p>Reset Password</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="pass">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('passreset')}}">
                                    <span class="sub-item">Reset Password</span>
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                <li class="mx-4 mt-2 jatu-orange">
                    <a href="{{route('help')}}" class="btn btn-block jatu-orange" style="color: white;font-weight: bold"><span class="btn-label mr-2"> <i class="fa fa-question-circle"></i> </span>Help</a> 
                  </li>
                @endif
            </ul>
        </div>
    </div>
</div>