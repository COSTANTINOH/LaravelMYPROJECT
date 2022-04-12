<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Report;
use App\Task;
use App\User;
use App\ULBD;
use Auth;
use DB;
use App\Permission_note;

class HomeController extends Controller
{
    public function index(){
        $department_hod_id = ULBD::select('department_id')->where('user_id', Auth::user()->id)->pluck('department_id');
        $staff_same_department  = ULBD::select('user_id')->where('department_id',$department_hod_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id');


        $pending_report =Report::where('status_comment',0)->whereIn('user_id',$staff_same_department)->count();
        $pending_comment_report =Report::where('status_comment',1)->whereIn('user_id',$staff_same_department)->count();
        $received_report =Report::where('status_comment',2)->whereIn('user_id',$staff_same_department)->count();

        $dept_id =ULBD::select('department_id')->where('user_id',Auth::user()->id)->pluck('department_id');
        //return $dept_id;

        $dept_count =ULBD::select('user_id')->where('department_id',$dept_id)->count();
        
        $staff_request = Permission_note::where('hod_recommendation',NULL)->whereIn('staff_id',$staff_same_department)->get();
        $count =  count($staff_request);
        // return $staff_request;
        // $request->session()->put('staff_req', $count);
        session(['staff_req' => $count]);

        return view('hod.index',compact('pending_report','pending_comment_report','received_report','dept_count'));

     

      // return view('hod.index',compact('dept_count'));
    }

    public function printReport(Request $request){
        //  $this->validate($request,[
        //      'start_date' => 'required|date',
        //      'end_date' => 'required|date|before_or_equal: start_date',
        //  ]);
        //  $start = Carbon::parse($request->start_date);
        //  $end = Carbon::parse($request->end_date);

        //  $get_report = Report::whereDate('date_task','<=',$end->format('m-d-y'))->whereDate('date','>=',$start->format('m-d-y'));

        //  return view('print-report', compact('get_report'));
    }

    public function ReportList(){
        // $report_id = Report::where('id',1)->where('user_id',2)->pluck('id');
        // $task_id = Task::where('id',1)->where('report_id',$report_id)->pluck('id');
        // $myReport = Task::where('id',$report_id)->get();
        // return view('hod.print-report',compact('myReport'));

        $date = date('Y-m-d');

        $report = DB::table('users')->select('first_name','title','description')
         ->join('reports','reports.user_id','=','users.id')
         ->join('tasks','reports.user_id','=','tasks.report_id')
         ->get();

         return view('hod.print-report',compact('report'));

    }
}
