<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ULBD;
use Auth;
use App\Report;
use App\Task;
use App\Target;
use App\Comment;
use App\User;
use App\Approval;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        ///get  hod department id
        $today = date('Y-m-d');
        $department_hod_id = ULBD::select('department_id')->where('user_id', Auth::user()->id)->pluck('department_id');
        $staff_same_department  = ULBD::select('user_id')->where('department_id',$department_hod_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id');
        $arrayLength = count($staff_same_department);
         $i = 0;
         
        if($staff_same_department  != []){
            // return $arrayLength;
           while ($i < $arrayLength)
            {
            // $staff_report_comment_status_0 = Report::where('user_id',$staff_same_department[$i])->where('status_comment',0)->get();

            $report_comment_status_1 = Report::whereIn('user_id',$staff_same_department)->where('status_comment',1)->get();
            $staff_report_comment_status_0 = Report::whereIn('user_id',$staff_same_department)->where('status_comment',0)->where('status',1)->get();
            $report_comment_status_2 = Report::whereIn('user_id',$staff_same_department)->where('status_comment',2)->get();
            $report_comment_status_3 = Report::whereIn('user_id',$staff_same_department)->where('status',0)->where('date',$today)->get();
            
            return view('hod.hod-report-view',compact('staff_report_comment_status_0','report_comment_status_1','report_comment_status_2','report_comment_status_3'));
                $i++;
            }
           
            
            if($arrayLength == 0){
                $staff_report_comment_status_0 = [];
                $report_comment_status_1 = [];
                $report_comment_status_2 = [];
                $report_comment_status_3 = [];

            return view('hod.hod-report-view',compact('staff_report_comment_status_0','report_comment_status_1','report_comment_status_2','report_comment_status_3'));
            }
        }

        
       
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print()
    {
        return view('hod.hod-print-report');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $comments = new Comment();


       $comments->user_id = Auth::user()->id;
       $comments->comment = $request->input('comment_hod');
       $comments->report_id = $id;
       $today = date('Y-m-d');
       $comments->date = $today;


       if($comments->save()){
        return redirect()->route('report-staff-view');
    }


    return redirect()->back()->with('failed', 'Task information could not be inserted!');

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_staff_report($id)
    {
        $task_list = Task::where('report_id', $id)->get();
        $user_id = Report::select('user_id')->where('id',$id)->pluck('user_id')->first();
        $target_name = Target::select('name')->where('user_id', $user_id)->where('status','>',0)->get(); 
        return view('hod.hod-report-view-staff', compact('task_list','target_name','id','user_id'));
    }

      public function show_staff_report_print($id)
    {
        $task_list = Task::where('report_id', $id)->get();
        $name_id= Task::select('target_id')->where('report_id', $id)->pluck('target_id')->first(); 
        $target_name = Target::select('name')->where('id', $name_id)->pluck('name')->first();
        $user_id = Report::select('user_id')->where('id',$id)->pluck('user_id')->first();
        $comment_hod = Comment::select('comment')->where('report_id',$id)->pluck('comment');
        return view('hod.hod-report-view-print', compact('task_list','target_name','comment_hod','user_id'));
    }



    public function hod_comment(Request $request,$id){

         // validate the form input
       $comment_name = $request->input('comment_hod');

       $comment = Comment::select('report_id')->where('report_id', $id)->pluck('report_id');
       $comments = new Comment();
       $check = $request->input('check');


    // return $comment_name;


       if($comment->isEmpty()){

         if($check == "confirm"){


           if($comment_name != ""){
            $comments->user_id = Auth::user()->id;
            $comments->comment = $comment_name;
            $comments->report_id = $id;
            $comments->date = date('Y-m-d');
            $comments->save();
            Report::where('id', $id)->update(['status_comment' => "2"]);
            // return redirect()->route('report-staff-view');
            // return redirect()->url('/hod/hod-report-view');
            return redirect()->back()->with('success', 'Comment Sent Back to Employee');
        }else{
            return redirect()->back()->with('failed', 'Please Provide Comment..');
        }

    }else if($check == "return"){

      if($comment_name != ""){
        $comments->user_id = Auth::user()->id;
        $comments->comment = $comment_name;
        $comments->report_id = $id;
        $comments->date = date('Y-m-d');
        $comments->save();
        Report::where('id', $id)->update(['status_comment' => "1"]);
        // return redirect()->route('report-staff-view');
        return redirect()->back()->with('success', 'Comment Sent Back to Employee');
    }else{
        return redirect()->back()->with('failed', 'Please Provide Comment..');
    }

}

}else if(!empty($comment)){
 if($check == "confirm"){

     if($comment_name != ""){
       Report::where('id', $id)->update(['status_comment' => "2"]);
       Comment::where('report_id', $id)->update(['comment' => "$comment_name"]);
    //    return redirect()->route('report-staff-view');
       return redirect()->back()->with('success', 'Comment Sent Back to Employee');

   }else{
      return redirect()->back()->with('failed', 'Please Provide Comment..');
  }


}else if($check == "return"){

   if($comment_name != ""){

    Report::where('id', 1)->update(['status_comment' => "1"]);
    Comment::where('report_id', $id)->update(['comment' => "$comment_name"]);
    // return redirect()->route('report-staff-view');
    return redirect()->back()->with('success', 'Report Sent Back to employee for editing');

}else{
   return redirect()->back()->with('failed', 'Please Provide Comment..');
}


}else if($check == "" ||  $comment_name == ""){
    return redirect()->back()->with('failed', 'Please Select Confirm Received or Return For Correction and provide comment');
}
}

}



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function approval()
    {

        $department_hod_id = ULBD::select('department_id')->where('user_id', Auth::user()->id)->pluck('department_id');
        $staff_same_department  = ULBD::select('user_id')->where('department_id',$department_hod_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id');
        $user_email =  User::whereIn('id',$staff_same_department)->get();
        return view('hod.hod-staff-approval',compact('user_email'));
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

    public function view_approval()
    {
        $department_hod_id = ULBD::select('department_id')->where('user_id', Auth::user()->id)->pluck('department_id');
        $staff_same_department  = ULBD::select('user_id')->where('department_id',$department_hod_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id');
        $approval = Approval::whereIn('user_id',$staff_same_department)->get();
        return view('hod.hod-view-all-approval',compact('approval'));
    }
}
