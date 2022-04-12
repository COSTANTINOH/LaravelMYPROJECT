<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Permission_note;
use App\ULBD;
use App\Approval;
use App\Report;
use Auth;

class Permission_noteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check if the on oging application is valid or not
        $when = date('Y-m-d');
        $to = Permission_note::select('date_to')->where('staff_id',Auth::user()->id)->orderBy('id','desc')->pluck('date_to')->first();
        $from = Permission_note::select('date_from')->where('staff_id',Auth::user()->id)->orderBy('id','desc')->pluck('date_from')->first();
        //  return $when;
        $page = Permission_note::where('staff_id',Auth::user()->id)->where('hod_recommendation',NULL)->orderBy('id','desc')->get();
        $page2 = Permission_note::where('staff_id',Auth::user()->id)->where('hod_recommendation','<>',NULL)->orderBy('id','desc')->first();
        // $page3 = Permission_note::where('staff_id',Auth::user()->id)->where('hod_recommendation','<>',NULL)->where('date_to','<>',NULL)->orderBy('id','desc')->first();
        
        if($when < $from OR $when < $to){
            
            $check = 1;
            //return count($page);
            return view('staff.permission_note',compact('page','check'));
        }else{
            
            if(count($page) == 0){ // no application before
                // return $page2;
                if($page2 != ""){
                    $x = explode(']',$page2->request);
                    
                    if(($x[0] == '[emergency') AND ($page2->date_to == NULL)){
                        $check = 2;
                        return view('staff.permission_note',compact('page','check'));
                    }else{
                        $check = 0;
                        return view('staff.permission_note',compact('page','check'));
                    }
                }else{
                    $check = 0;
                    return view('staff.permission_note',compact('page','check'));
                }
            }elseif(count($page) != 0){ // might had an application before
                
                if(count($page) == 1){ // if last application is NULL to HOD
                    $check = 1;
                    return view('staff.permission_note',compact('page','check'));    
                }elseif(count($page) == 0){ // if last application is not null to 
                    $check = 0;
                    return view('staff.permission_note',compact('page','check'));
                }                
            }            
        }
    }

    public function hod_index()
    {
        $department_hod_id = ULBD::select('department_id')->where('user_id', Auth::user()->id)->pluck('department_id');
        $staff_same_department  = ULBD::select('user_id')->where('department_id',$department_hod_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id');
         
        $branch_id = ULBD::select('branch_id')->where('user_id', Auth::user()->id)->pluck('branch_id');
        $staff_same_branch = ULBD::select('user_id')->where('branch_id',$branch_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id');

        $staff_same_department  = ULBD::select('user_id')->where('department_id',$department_hod_id)->where('branch_id',$staff_same_branch)->where('user_id','!=',Auth::user()->id)->pluck('user_id');
         
        if(Auth::user()->role_id == 5){
            $staff_request = Permission_note::where('hr_recommendation',NULL)->where('hod_recommendation','<>',NULL)->get();
            $staff_request_hr = Permission_note::where('hr_recommendation','<>',NULL)->get();
            return view('hr.hr-view-request',compact('staff_request','staff_request_hr'));
        }elseif(Auth::user()->role_id == 3){
    
            $staff_request = Permission_note::where('hod_recommendation',NULL)->whereIn('staff_id',$staff_same_department)->get();
            $staff_request_h = Permission_note::where('hod_recommendation','<>',NULL)->whereIn('staff_id',$staff_same_department)->get();
            return view('hod.hod-view-request',compact('staff_request','staff_request_h'));

        }elseif(Auth::user()->role_id == 4){
            $staff_request = Permission_note::where('hod_recommendation',NULL)->whereIn('staff_id',$staff_same_branch)->get();
            $staff_request_h = Permission_note::where('hod_recommendation','<>',NULL)->whereIn('staff_id',$staff_same_branch)->get();
            return view('hod.hod-view-request',compact('staff_request','staff_request_h'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {

        $today = date('Y-m-d');
       // if(Auth::user()->role_id == 3){
            $hod_rec =  $request->recommend_hod;
            if($request->from == ""){
                $df = date('Y-m-d'); 
                $df2 = date('Y-m-d'); 
            }else{
                $df =  $request->from;
                $df2 =  $request->from;
            }            
            $dt =  $request->to;
            $read = "read";
            
            // testig
            

            if($request->permission == 'accept'){
                if($hod_rec != ""){
                    if(Auth::user()->role_id == 5){
                        $reason = Permission_note::where('id',$id)->first();
                        // return $reason->staff_id;
                        while (strtotime($df2) <= strtotime($dt)) {
                            // print_r($df);// "$df\n";
                            $approval = new Approval();
                            $approval->reason = $reason->request;
                            $approval->date = $df2;
                            $approval->user_id = $reason->staff_id;
                            if($approval->save()){

                                $approval_id = Approval::select('id')->where('user_id',$reason->staff_id)->where('date',$df2)->pluck('id')->first();
                    
                                $create_report_id = new Report();
                                $create_report_id->user_id = $reason->staff_id;
                                $create_report_id->date = $df2;
                                $create_report_id->status = 1;
                                $create_report_id->status_comment = 2;
                                $create_report_id->report_type_id = 1;
                                $create_report_id->approval_id = $approval_id;
                                $create_report_id->time_sent = "Approved";
                                $create_report_id->approval_status = 1;
                                $create_report_id->save();
                            }
                            $df2 = date ("Y-m-d", strtotime("+1 day", strtotime($df2)));
                        }
                        
                        Permission_note::where('id',$id)->update(['hod_recommendation'=>$hod_rec,'hod_comment_date'=>$today,'hr_id'=>Auth::user()->id,'date_from'=>$df,'date_to'=>$dt,'hr_recommendation'=>$read]);
                        
                        return redirect()->back()->with('hr-success', 'Recommendation Saved!'); 
                    }
                    else if(Auth::user()->role_id == 3){
                        $reason = Permission_note::where('id',$id)->first();
                        // return $reason->staff_id;
                        while (strtotime($df2) <= strtotime($dt)) {
                            // print_r($df);// "$df\n";
                            $approval = new Approval();
                            $approval->reason = $reason->request;
                            $approval->date = $df2;
                            $approval->user_id = $reason->staff_id;
                            if($approval->save()){

                                $approval_id = Approval::select('id')->where('user_id',$reason->staff_id)->where('date',$df2)->pluck('id')->first();
                    
                                $create_report_id = new Report();
                                $create_report_id->user_id = $reason->staff_id;
                                $create_report_id->date = $df2;
                                $create_report_id->status = 1;
                                $create_report_id->status_comment = 2;
                                $create_report_id->report_type_id = 1;
                                $create_report_id->approval_id = $approval_id;
                                $create_report_id->time_sent = "Approved";
                                $create_report_id->approval_status = 1;
                                $create_report_id->save();
                            }
                            $df2 = date ("Y-m-d", strtotime("+1 day", strtotime($df2)));
                        }

                        Permission_note::where('id',$id)->update(['hod_recommendation'=>$hod_rec,'hod_comment_date'=>$today,'hod_id'=>Auth::user()->id,'date_from'=>$df,'date_to'=>$dt]);
                        

                        return redirect()->back()->with('success', 'Recommendation Saved!');
                    }
                    else if(Auth::user()->role_id == 4){
                        $reason = Permission_note::where('id',$id)->first();
                        // return $reason->staff_id;
                        while (strtotime($df2) <= strtotime($dt)) {
                            // print_r($df);// "$df\n";
                            $approval = new Approval();
                            $approval->reason = $reason->request;
                            $approval->date = $df2;
                            $approval->user_id = $reason->staff_id;
                            if($approval->save()){

                                $approval_id = Approval::select('id')->where('user_id',$reason->staff_id)->where('date',$df2)->pluck('id')->first();
                    
                                $create_report_id = new Report();
                                $create_report_id->user_id = $reason->staff_id;
                                $create_report_id->date = $df2;
                                $create_report_id->status = 1;
                                $create_report_id->status_comment = 2;
                                $create_report_id->report_type_id = 1;
                                $create_report_id->approval_id = $approval_id;
                                $create_report_id->time_sent = "Approved";
                                $create_report_id->approval_status = 1;
                                $create_report_id->save();
                            }
                            $df2 = date ("Y-m-d", strtotime("+1 day", strtotime($df2)));
                        }
                        Permission_note::where('id',$id)->update(['hod_recommendation'=>$hod_rec,'hod_comment_date'=>$today,'hod_id'=>Auth::user()->id,'date_from'=>$df,'date_to'=>$dt]);
                        return redirect()->back()->with('success', 'Recommendation Saved!');
                    }
                }else{
                    return redirect()->back()->with('failed', 'Sorry! Recommendation is required');      
                }
            }elseif($request->permission == '[reject]'){
                    $d=mktime(0,0,0,1,1,2000);
                    $y2k = date('Y-m-d',$d); //Y2K

                   $arr = array($request->permission,$hod_rec);
                   $desc = implode($arr);

                if($hod_rec != ""){
                    if(Auth::user()->role_id == 5){
                        Permission_note::where('id',$id)->update(['hod_recommendation'=>$desc,'hod_comment_date'=>$today,'hr_id'=>Auth::user()->id,'hr_recommendation'=>$read,'date_from'=>$y2k,'date_to'=>$y2k]);
                        return redirect()->back()->with('hr-success', 'Recommendation saved!'); 
                    }else if(Auth::user()->role_id == 3){
                        Permission_note::where('id',$id)->update(['hod_recommendation'=>$desc,'hod_comment_date'=>$today,'hod_id'=>Auth::user()->id,'date_from'=>$y2k,'date_to'=>$y2k]);
                        return redirect()->back()->with('success', 'Recommendation saved!');
                    }
                    else if(Auth::user()->role_id == 4){
                        Permission_note::where('id',$id)->update(['hod_recommendation'=>$desc,'hod_comment_date'=>$today,'hod_id'=>Auth::user()->id,'date_from'=>$y2k,'date_to'=>$y2k]);
                        return redirect()->back()->with('success', 'Recommendation saved!');
                    }
                    
                }else{
                    return redirect()->back()->with('failed', 'Sorry! Recommendation is required');      
                }
            }
   

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

       $page = Permission_note::where('staff_id',Auth::user()->id)->where('hod_recommendation',NULL)->orderBy('id','desc')->get();
      
        $today = date('Y-m-d');
        $day =  $request->from;
        $deadline =  $request->to;      
        $state = $request->clases;    
        $detail = $request->details;
        
        $arr=array ($state,$detail);
        $desc = implode($arr);

        if($state != ""){
   
            if($request->details != ""){
                $note = new Permission_note;
                $note->request = $desc;
                $note->date_from = $today ;
                $note->staff_id =Auth::user()->id;
                $note->save(); 
                return redirect()->back()->with('success', 'Request for permission sent successfully'); 
            }else{
                return redirect()->back()->with('fail', 'Sorry! Request Contents is required')
                                            ->withInput();      
            }
        }
        else {
            
            if ( ("date('j-m-Y',strtotime($day))" >= "date('j-m-Y',strtotime($today))") AND ("date('j-m-Y',strtotime($deadline))" >= "date('j-m-Y',strtotime($today))") )
            {
                if($request->details != ""){
                    $note = new Permission_note;
                    $note->request = $desc;
                    $note->staff_id =Auth::user()->id;
                    $note->date_from = $request->from ;
                    $note->date_to = $request->to;
                    $note->save(); 
                    return redirect()->back()->with('success', 'Request for permission sent successfully'); 
                }else{
                    return redirect()->back()->with('fail', 'Sorry! Request Contents is required')
                                                ->withInput();      
                }
                
            }
            else
            { 
                return redirect()->back()->with('fail', 'Sorry! invalid date')
                                                ->withInput();      
            }

        }
 
    }

    public function show_permission()
    {
        $one =1;
        $permission = Permission_note::where('hod_recommendation',NULL)->where('staff_id',Auth::user()->id)->get();
        $hod = Permission_note::where('hod_recommendation','<>',NULL)->where('status',NULL)->where('staff_id',Auth::user()->id)->get();
        $hr = Permission_note::where('status',$one)->where('staff_id',Auth::user()->id)->get();
        
       return view('staff.show_permissions',compact('permission','hod','hr'));
    }

    public function view_request_hod($id){
       $one=1;

        $hod_view = Permission_note::where('id',$id)->get();
        Permission_note::where('id',$id)->update(['status'=>$one]);

        return view('staff.view_requests_hod',compact('hod_view'));

    }

    public function request_history($id){
       
        $history = Permission_note::where('id',$id)->get();
       return view('staff.request_history',compact('history'));
    }

    public function view_request_hr($id){

        $hr_view = Permission_note::where('id',$id)->get();
        return view('staff.hr_request',compact('hr_view'));

    }

    public function show($id)
    {
        $user_id = Permission_note::select('staff_id')->where('id',$id)->pluck('staff_id')->first();
        $hod_id = Permission_note::select('hod_id')->where('id',$id)->pluck('hod_id')->first();
        $hr_id = Permission_note::select('hr_id')->where('id',$id)->pluck('hr_id')->first();

        
        $perm = Permission_note::where('id',$id)->get();
        if(Auth::user()->role_id == 5){
            Permission_note::where('id',$id)->update(['hr_recommendation'=>'read']);
        }
        // return $perm;
      //  $hr_read = "reading";
    
     //   Permission_note::where('id',$id)->update(['hr_recommendation'=>$hr_read]);
        // return $perm;
       // if(Auth::user()->role_id == 5){
        //    return view('hr.hr-view-permission',compact('perm','user_id','hod_id'));
       // }elseif(Auth::user()->role_id == 3){
            return view('hod.hod-view-permission',compact('perm','user_id','hr_id','hod_id'));
       // }
    }
    
    public function view_request($id){
        $permission= Permission_note::where('id',$id)->get();

       return view('staff.view_requests',compact('permission'));
    }

    public function hr_process_request(){

        //hr reply requests
        $branch_id = ULBD::select('branch_id')->where('user_id',Auth::user()->id)->pluck('branch_id')->first();
       
       $dept_id = ULBD::select('department_id')->where('user_id',Auth::user()->id)->pluck('department_id')->first();
       $staff = ULBD::select('user_id')->where('department_id',$dept_id)->where('branch_id',$branch_id)->get();
       $request = Permission_note::whereIn('staff_id',$staff)->where('hod_recommendation',NULL)->get();
         
       ////////hr view other departments
       $read = "read";
       $state = "reading";
       $other_staff = ULBD::select('user_id')->where('department_id','<>',$dept_id)->get();
    //    return $other_staff;
       $other_request = Permission_note::whereIn('staff_id',$other_staff)->where('hod_recommendation','<>',NULL)->where('hr_recommendation',NULL)->get();
       $history_request = Permission_note::where('hod_recommendation','<>',NULL)->where('hr_recommendation','<>',NULL)->get();
    
        // return $other_request;
    
       return view('hr.Hr_requests',compact('request','other_request','history_request'));
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function return_day(Request $request)
    {
       $last_req = Permission_note::select('id')->where('staff_id',Auth::user()->id)->orderBy('id','DESC')->pluck('id')->first();
       $last_req_get = Permission_note::where('id',$last_req)->first(); 
       
       
       Permission_note::where('id',$last_req)->update(['date_to'=>$request->return_day]); 
       $df2 = $last_req_get->date_from;
       $reason = $last_req_get->request;
    //    return $df2;
       while (strtotime($df2) <= strtotime("-1 day", strtotime($request->return_day)) ) {
            // print_r($df);// "$df\n";
            $approval = new Approval();
            $approval->reason = $reason;
            $approval->date = $df2;
            $approval->user_id = Auth::user()->id;
            if($approval->save()){

                $approval_id = Approval::select('id')->where('user_id',Auth::user()->id)->where('date',$df2)->pluck('id')->first();

                $create_report_id = new Report();
                $create_report_id->user_id = Auth::user()->id;
                $create_report_id->date = $df2;
                $create_report_id->status = 1;
                $create_report_id->status_comment = 2;
                $create_report_id->report_type_id = 1;
                $create_report_id->approval_id = $approval_id;
                $create_report_id->time_sent = "Approved";
                $create_report_id->approval_status = 1;
                $create_report_id->save();
            }
            $df2 = date ("Y-m-d", strtotime("+1 day", strtotime($df2)));
        }    
       
       return redirect()->back()->with('success', 'Welcome back '.Auth::user()->first_name.' Your HOD Has been notified about Your return');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
