<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Report;
use App\Target;
use App\Task;
use Auth;
use App\User;
use App\Comment;
use App\Approval;

class HRReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $user_email = User::get();
        return view('print.print-report',compact('user_email'));
    }

    public function view_approval()
    {
        $approval = Approval::get();
        return view('hr.hr-view-all-approval',compact('approval'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $report_date = Report::select('date')->where('user_id',Auth::user()->id)->orderBy('id','DESC')->pluck('date')->first();
        $chdate = date('Y-m-d', strtotime($report_date. ' + 6 days'));
        if($report_date == NULL){
            $x = 0;
            return view('hr.hr-create-report',compact('x'));
        }else{
            if(date('Y-m-d') > $chdate){
                $x = 0;
                return view('hr.hr-create-report',compact('x'));
            }else{
                $x = 1;
                return view('hr.hr-create-report',compact('x'));
            }
        }
         
    } 


      public function store_approval(Request $request)
    {

         $approal_reason = $request->input('approal_reason');
         $email = $request->input('email');
         $date = date('Y-m-d'); 

        if($approal_reason != ""){

            if($email != ""){
                 $approval = new Approval();
                 $approval->reason = $request->approal_reason;
                 $approval->date = $date;
                 $approval->user_id = $request->email;

                 if($approval->save()){

                    //assign report id automaticall
                        $approval_id = Approval::select('id')->where('user_id',$email)->where('date',$date)->pluck('id')->first();


                        $create_report_id = new Report();
                        $create_report_id->user_id = $email;
                        $create_report_id->date = $date;
                        $create_report_id->status = 1;
                        $create_report_id->status_comment = 2;
                        $create_report_id->report_type_id = 1;
                        $create_report_id->approval_id = $approval_id;
                        $create_report_id->time_sent = "Approved";
                        $create_report_id->approval_status = 1;

                        if($create_report_id->save()){
                            return redirect()->back()->with('success', 'Approval Approved Successfully');
                        }

                 }else{
                    return redirect()->back()->with('failed', 'Fail to make approval for staff');
                 }

            }else{
                return redirect()->back()->with('failed', 'Please Select Staff Email');
            }

        }else{
            return redirect()->back()->with('failed', 'Please Provide Reason For Approval');
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
        // validate the form input
        $request->validate([
            'report_title' => 'required|string',
            'report' => 'required|string',
        ], [
            'report_title.required' => 'Sorry! Report Title is required',
            'report.required' => 'Sorry! Weekly Report is required',
        ]);

        // Create dumb target for HR
        $target = new Target;

        $target->name = "HR Target";
        $target->user_id = Auth::user()->id;
        $target->status = '7';
        $target->date = date(now());
        $target->save();

        // search target id
        //check and create report id for user who doesnt have id for user...
        $today = date('Y-m-d');
        $id = Auth::user()->id;
        $target_id = Target::select('id')->where('user_id', $id)->where('date',$today)->first();
        // End create target for HOD



        $report_id = Report::select('id')->where('user_id', $id)->where('date',$today)->pluck('id'); 

        if($report_id->first()){

           $report_id = Report::select('id')->where('user_id', $id)->where('date',$today)->pluck('id')->first();

              //return view('staff.create',compact('target_name','report_id')); 
       }else{ 
           $create_report_id = new Report();
           $create_report_id->user_id = Auth::user()->id;
           $create_report_id->date = $today;
           $create_report_id->status = 0;
           $create_report_id->report_type_id = 4;
           $create_report_id->save();

           $report_id = Report::select('id')->where('user_id', $id)->where('date',$today)->pluck('id')->first();

              //return view('staff.create',compact('target_name','report_id'));
       }
        //  end creare reeport id

        //now create task

       $task = new Task;

       $task->title = $request->report_title;
       $task->description = $request->report;       
       $task->time_taken = '7';
       $task->report_id = $report_id;
       $task->target_id = $target_id->id;
       $task->date_task = date(now());
       $task->save();
        // return $task;

       return redirect()->back()->with('status-okay', 'Report successfully saved');
   }

   public function show_report(){
    
    $report = Report::where('user_id',Auth::user()->id)->get();
    // return $report;
    return view('hr.hr-view-my-report',compact('report'));
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $task = Task::where('report_id',$id)->get();
       $comment_gm = Comment::select('comment')->where('report_id',$id)->pluck('comment');
       return view('hr.hr-view-my-reports',compact('task','comment_gm'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approval()
    {
         $user_email = User::get();
        return view('hr.hr-staff-approval',compact('user_email'));
    }

      public function show_approval($id)
    {
       $approval = Approval::where('id',$id)->get();
       return view('hr.hr-read-approval-single',compact('approval'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report_show(Request $request){


         $report_type = $request->input('report_type');
         $report_for = $request->input('report_for');
         $email = $request->input('email');
         $from = $request->input('from');
         $to = $request->input('to');

     if($report_type == 'all_report'){

        if($report_for == 'staff_no_write'){

        $message = "Staff didn't write a report";
        $user_id = User::select('id')->where('role_id','=','2')->pluck('id')->toArray();
        // return $user_id;
        $report_id = Report::select('user_id')->whereIn('user_id',$user_id)->whereBetween('date',[$from,$to])->pluck('user_id')->toArray();
        $report_with_reason_id = Report::whereIn('user_id',$user_id)->where('approval_status',1)->whereBetween('date',[$from,$to])->get();


        if($report_with_reason_id->isEmpty()){
            $report_with_reason_id = [];
        }


        $staff_no_write = array_diff($user_id,$report_id);
        
        $yes = 1;

        $user_no_report = User::whereIn('id',$staff_no_write)->get();

        
        return view('print.view-staff-no-report',compact('report_with_reason_id','user_no_report','from','to','message','yes'));

        }else if($report_for == 'staff_write'){

        $message = "Staff write a report";
        $user_id = User::select('id')->where('role_id','=','2')->pluck('id')->toArray();
        $report_id = Report::select('user_id')->whereIn('user_id',$user_id)->where('approval_status',NULL)->whereBetween('date',[$from,$to])->pluck('user_id')->toArray();
        $staff_no_write = array_intersect($user_id,$report_id);
        $report_with_reason_id = Report::whereIn('user_id',$staff_no_write)->where('approval_status',NULL)->whereBetween('date',[$from,$to])->get();
        
        $user_no_report = [];
        $yes = 1;
        return view('print.view-staff-no-report',compact('report_with_reason_id','from','to','message','yes'));
    }else{
         return redirect()->back()->with('failed', 'Please Select Report For Type!');
    }
    }else if($report_type == 'individual'){

       if($email != ""){

        $message = "Staff write a report between";
        $report_with_reason_id = Report::where('user_id',$email)->whereBetween('date',[$from,$to])->get();
        $report_id_get = Report::select('id')->where('user_id',$email)->whereBetween('date',[$from,$to])->pluck('id');
        // return $report_id;
        // $staff_no_write = array_diff($user_id,$report_id);
        // $users = User::whereIn('id',$report_id)->get();
        $yes = 1;
        return view('print.view-staff-no-report',compact('report_with_reason_id','from','to','message','yes','report_id_get'));

       }else{

      return redirect()->back()->with('failed', 'Please Select User Email!');


       }

     }else{
    return redirect()->back()->with('failed', 'Please Select Report Type');
     }

 }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print_all($datefrom,$dateto)
    {
        $user_id = User::select('id')->where('role_id','=','2')->pluck('id')->toArray();
        
        

        $report_id = Report::select('id')->whereIn('user_id',$user_id)->whereBetween('date',[$datefrom,$dateto])->pluck('id');

        // return $report_id;

        $task_list = Task::whereIn('report_id',$report_id)->get();

        // return $task_list;

        $task_id = Task::select('target_id')->whereIn('report_id',$report_id)->pluck('target_id');

        // return $task_id;

        $target_name = Target::select('name')->whereIn('id',$task_id)->pluck('name');

        // return $target_name;

        $comment_hod = Comment::select('comment')->whereIn('report_id',$report_id)->pluck('comment');

        // return $comment_hod . '***********************';
        
        $userid = Report::select('user_id')->where('id',$report_id)->pluck('user_id')->first();

        return view('hr.hr-report-print-all',compact('report_id','target_name','task_list','comment_hod','userid'));
        
    }

     public function print_staff_all($datefrom,$dateto)
    {
         $user_id = User::select('id')->where('role_id','=','2')->pluck('id')->toArray();
        // return $user_id;
         $report_id = Report::select('user_id')->whereIn('user_id',$user_id)->whereBetween('date',[$datefrom,$dateto])->pluck('user_id')->toArray();

         $staff_no_write = array_diff($user_id,$report_id);

         $staff_details = User::whereIn('id',$staff_no_write)->get();

         $message = "Staffs Who Didn't Write";

         $yes = 1;

        return view('print.view-staff-name-no-report',compact('staff_details','message','datefrom','dateto','yes'));
        
    }

    public function print_name_staff_all($datefrom,$dateto){
         $user_id = User::select('id')->where('role_id','=','2')->pluck('id')->toArray();
        // return $user_id;
         $report_id = Report::select('user_id')->whereIn('user_id',$user_id)->whereBetween('date',[$datefrom,$dateto])->pluck('user_id')->toArray();

         $staff_no_write = array_diff($user_id,$report_id);

         $staff_details = User::whereIn('id',$staff_no_write)->get();

        return view('print.staff-details-print',compact('staff_details','datefrom','dateto'));
    }
}
