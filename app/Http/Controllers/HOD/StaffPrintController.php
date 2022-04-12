<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ULBD;
use App\User;
use Auth;
use App\Report;
use App\Task;
use App\Target;
use App\Comment;
class StaffPrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department_hod_id = ULBD::select('department_id')->where('user_id', Auth::user()->id)->pluck('department_id');
        $staff_same_department  = ULBD::select('user_id')->where('department_id',$department_hod_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id');
        $user_email = User::whereIn('id',$staff_same_department)->get();

        return view('hod.print.print-report',compact('user_email'));
    }

    /**
     * Show the form for creating a new resource.
     *
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
       // $user_id = User::select('id')->where('role_id','=','2')->pluck('id')->toArray();
         $department_hod_id = ULBD::select('department_id')->where('user_id', Auth::user()->id)->pluck('department_id')->toArray();
        $user_id  = ULBD::select('user_id')->where('department_id',$department_hod_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id')->toArray();
        // return $user_id;
        $report_id = Report::select('user_id')->whereIn('user_id',$user_id)->whereBetween('date',[$from,$to])->pluck('user_id')->toArray();
        $report_with_reason_id = Report::whereIn('user_id',$user_id)->where('approval_status',1)->whereBetween('date',[$from,$to])->get();


        if($report_with_reason_id->isEmpty()){
            $report_with_reason_id = [];
        }


        $staff_no_write = array_diff($user_id,$report_id);
        
        $yes = 1;

        $user_no_report = User::whereIn('id',$staff_no_write)->get();

        
        return view('hod.print.view-staff-no-report',compact('report_with_reason_id','user_no_report','from','to','message','yes'));

        }else if($report_for == 'staff_write'){

        $message = "Staff write a report";
        // $user_id = User::select('id')->where('role_id','=','2')->pluck('id')->toArray();
           $department_hod_id = ULBD::select('department_id')->where('user_id', Auth::user()->id)->pluck('department_id')->toArray();
        $user_id  = ULBD::select('user_id')->where('department_id',$department_hod_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id')->toArray();
        $report_id = Report::select('user_id')->whereIn('user_id',$user_id)->where('approval_status',NULL)->whereBetween('date',[$from,$to])->pluck('user_id')->toArray();
        $staff_no_write = array_intersect($user_id,$report_id);
        $report_with_reason_id = Report::whereIn('user_id',$staff_no_write)->where('approval_status',NULL)->whereBetween('date',[$from,$to])->get();
        
        $user_no_report = [];
        $yes = 1;
        return view('hod.print.view-staff-no-report',compact('report_with_reason_id','from','to','message','yes'));
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
        return view('hod.print.view-staff-no-report',compact('report_with_reason_id','from','to','message','yes','report_id_get'));

       }else{

      return redirect()->back()->with('failed', 'Please Select User Email!');


       }

     }else{
       return redirect()->back()->with('failed', 'Please Select Report Type');
     }
}

  public function print_all($datefrom,$dateto)
    {
       $department_hod_id = ULBD::select('department_id')->where('user_id', Auth::user()->id)->pluck('department_id')->toArray();
        $user_id  = ULBD::select('user_id')->where('department_id',$department_hod_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id')->toArray();

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

        return view('hr.hr-report-print-all',compact('report_id','target_name','task_list','comment_hod'));
        
    }

     public function print_staff_all($datefrom,$dateto)
    {
         $department_hod_id = ULBD::select('department_id')->where('user_id', Auth::user()->id)->pluck('department_id')->toArray();
        $user_id  = ULBD::select('user_id')->where('department_id',$department_hod_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id')->toArray();
         $report_id = Report::select('user_id')->whereIn('user_id',$user_id)->whereBetween('date',[$datefrom,$dateto])->pluck('user_id')->toArray();

         $staff_no_write = array_diff($user_id,$report_id);

         $staff_details = User::whereIn('id',$staff_no_write)->get();

         $message = "Staffs Who Didn't Write";

         $yes = 1;

        return view('hod.print.view-staff-name-no-report',compact('staff_details','message','datefrom','dateto','yes'));
        
    }

    public function print_name_staff_all($datefrom,$dateto){
           $department_hod_id = ULBD::select('department_id')->where('user_id', Auth::user()->id)->pluck('department_id')->toArray();
        $user_id  = ULBD::select('user_id')->where('department_id',$department_hod_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id')->toArray();
        // return $user_id;
        // return $user_id;
         $report_id = Report::select('user_id')->whereIn('user_id',$user_id)->whereBetween('date',[$datefrom,$dateto])->pluck('user_id')->toArray();

         $staff_no_write = array_diff($user_id,$report_id);

         $staff_details = User::whereIn('id',$staff_no_write)->get();

        return view('hod.print.staff-details-print',compact('staff_details','datefrom','dateto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
