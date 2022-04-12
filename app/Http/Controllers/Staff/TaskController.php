<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use Auth;
use App\Report;
use App\User;
use App\Target;
use DB;
use App\Comment;
use Artisan;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $report_id = Report::select('id')->where('user_id', Auth::user()->id)->where('date',date('Y-m-d'))->where('status',0)->pluck('id');  

      $report_status_comment = Report::select('status_comment')->where('user_id', Auth::user()->id)->where('date',date('Y-m-d'))->where('status_comment',null)->pluck('status_comment'); 

      if($report_status_comment->isEmpty()){
        $btn_enable = '0';
      }else if(!empty($report_status_comment)){
        $btn_enable = '1';
      }
      if($report_id->first()){
        $task_list = Task::where('report_id', $report_id)->get(); 
        return view('staff.list',compact('task_list','btn_enable'));
      }else{
        $task_list = []; 
        return view('staff.list',compact('task_list','btn_enable'));
      }
    }

    public function index_back($id)
    {
      if($id != ''){
        $task_list = Task::where('report_id', $id)->get(); 
        return view('staff.list-edit-hod',compact('task_list','id'));
      }else{
        $task_list = []; 
        return view('staff.list-edit-hod',compact('task_list'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $id = Auth::user()->id;
      $target_name = Target::select('name')->where('user_id', $id)->where('status','>',0)->pluck('name')->first();  

        //check and create report id for user who doesnt have id for user...
      $today = date('Y-m-d');
      $id = Auth::user()->id;
      $report_id = Report::select('id')->where('user_id', $id)->where('date',$today)->pluck('id')->first(); 

      if($report_id != ''){
        
         $report_today = Report::select('time_sent')->where('user_id', $id)->where('date',$today)->pluck('time_sent')->first(); 
         $count_list = Task::where('report_id', $report_id)->count(); 
         $report_time = Report::select('reporting_time')->where('user_id', $id)->where('date',$today)->where('time_sent',NULL)->pluck('reporting_time')->first();  
        // return $report_time;
        // return $report_today;
        return view('staff.create',compact('target_name','report_id','count_list','report_today','report_time')); 
      }else{
        //  $report_today = Report::select('time_sent')->where('user_id', $id)->where('date',$today)->where('time_sent',NULL)->pluck('time_sent')->first(); 
        $create_report_id = new Report();
        $create_report_id->user_id = Auth::user()->id;
        $create_report_id->date = $today;
        $create_report_id->status = 0;
        $create_report_id->report_type_id = 1;

        if($create_report_id->save()){
         //$report_id = Report::select('id')->where('user_id', $id)->where('date',$today)->pluck('id')->first();
         $report_today = Report::select('time_sent')->where('user_id', $id)->where('date',$today)->where('time_sent',NULL)->pluck('time_sent')->first(); 
         $report_id = Report::select('id')->where('user_id', $id)->where('date',$today)->where('time_sent',NULL)->pluck('id')->first();  
         $report_time = Report::select('reporting_time')->where('user_id', $id)->where('date',$today)->where('time_sent',NULL)->pluck('reporting_time')->first();  
        // return $report_time;
         $count_list = 0;

         return view('staff.create',compact('target_name','report_id','count_list','report_today','report_time'));

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

      $title = $request->input('task_title');
      $task_description =  $request->input('task_description');
      $time = $request->input('time_taken');
      $result = $request->input('task_result');
      $task_challenges =$request->input('task_challenges');
      $rep_time =$request->input('reporting_time');

      if($title != '' && $task_description != '' && $time != '' && $result != '' && $task_challenges != ''){
        $task = new Task();

        $task->title = $request->input('task_title');
        $task->report_id  = $request->input('report_id');
        $id = Auth::user()->id;
        $task->description = $request->input('task_description');
        $task->time_taken = $request->input('time_taken'); // fixed


        $result = DB::table('targets')->select('id')->where('user_id', $id)->where('status','>',0)->first();
        $task->target_id = $result->id;
        $task->result = $request->input('task_result');
        $task->challenge = $request->input('task_challenges');
        $task->date_task = date('Y-m-d');
        
        //reportig time mechanism
        if($rep_time != ''){
          Report::where('id',$request->input('report_id'))->update(['reporting_time'=>$rep_time]);
        }

        if($task->save()){
          return redirect()->back()->with('success', 'Task information inserted successfully!');
        }
      }
      return redirect()->back()->with('failed', 'Task information could not be inserted Please Make Sure Your Provide All Information!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $today = date('Y-m-d');

      $id = Auth::user()->id;
      $report_id = Report::select('id')->where('user_id', $id)->where('date',$today)->pluck('id');   

      if($report_id->first()){

       $task_list = Task::where('report_id', $report_id)->get(); 
       $id = Auth::user()->id;
       $target_name = Target::select('name')->where('user_id', $id)->where('status','>',0)->pluck('name'); 
       $comment_hod = Comment::select('comment')->where('report_id',$id)->pluck('comment');

       return view('staff.task-preview',compact('task_list','target_name'));
     }else{

       $task_list = []; 
       $id = Auth::user()->id;
       $target_name = Target::select('name')->where('user_id', $id)->where('status','>',0)->pluck('name'); 



       return view('staff.task-preview',compact('task_list','target_name'));
     }
   }


   public function show_back($id)
   {

    if($id != ""){

     $task_list = Task::where('report_id', $id)->get(); 
     $name_id= Task::select('target_id')->where('report_id', $id)->pluck('target_id')->first(); 
     $target_name = Target::select('name')->where('id', $name_id)->pluck('name');
     $comment_hod = Comment::select('comment')->where('report_id',$id)->pluck('comment');

     return view('staff.task-preview',compact('task_list','target_name','comment_hod'));
   }else{

     $task_list = []; 
     $id = Auth::user()->id;
     $target_name = Target::select('name')->where('user_id', $id)->where('status','>',0)->get(); 
     return view('staff.task-preview',compact('task_list','target_name'));
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
      $task_data = Task::find($id);
      $report_id = Report::select('id')->where('user_id', Auth::user()->id)->where('date',date('Y-m-d'))->pluck('id')->first();
      $count_list = Task::where('report_id', $report_id)->count(); 
      return view('staff.edit', compact('task_data','count_list'));
    }

    public function view_reports()
    {

      $my_sent_reports = Report::where('user_id',Auth::user()->id)->where('status_comment',2)->get();
      $my_sent_reports_back = Report::where('user_id',Auth::user()->id)->where('status_comment',1)->get();
      $my_sent_reports_sent = Report::where('user_id',Auth::user()->id)->where('status_comment',0)->get();
      return view('staff.staff-view-report',compact('my_sent_reports','my_sent_reports_back','my_sent_reports_sent'));
    }

    public function preview_my_report($id)
    {
     $id_name = $id;
     $task_list = Task::where('report_id', $id)->get(); 
     $id = Auth::user()->id;
     $target_name = Target::select('name')->where('user_id', $id)->where('status','>',0)->get(); 
     $comment_hod = Comment::where('report_id', $id_name)->get();
     
     return view('staff.staff-report-preview',compact('task_list','target_name','comment_hod'));
   }

   public function preview_back_my_report($id)
   {
    $task_list = Task::where('report_id', $id)->get(); 
    $target_name = Target::select('name')->where('id', $id)->get(); 
    $comment_hod = Comment::select('comment')->where('report_id', $id)->pluck('comment');

    return view('staff.task-back-hod',compact('task_list','target_name','id','comment_hod'));
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
     $title = $request->input('task_title');
     $task_description =  $request->input('task_description');
     $time = $request->input('time_taken');
     $result = $request->input('task_result');
     $task_challenges =$request->input('task_challenges');

     if($title != '' && $task_description != '' && $time != '' && $result != '' && $task_challenges != ''){

      $task = Task::find($id);
      $task->title = $request->input('task_title');
      $task->description = $request->input('task_description');
      $task->time_taken = $request->input('time_taken');
      $task->result = $request->input('task_result');
      $task->challenge = $request->input('task_challenges');
      $task->date_task = date('Y-m-d');

      if($task->save()){
        return redirect()->back()->with('success', 'Task information Updated successfully!');
      }
    }
    return redirect()->back()->with('failed', 'Task information could not be Updated Provide All Info!');

  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     if(Task::destroy($id))
     {
      return redirect()->back()->with('deleted', 'Task Deleted successfully');
    }
    return redirect()->back()->with('delete-failed', 'Could not delete');
  }

  public  function  submit_task_to_report_back($id){

    $report_status = Report::find($id);
    $report_status->status_comment = 0;

    if($report_status->update()){
     return redirect()->back()->with('deleted', 'Task Deleted successfully');
   }else{
     return redirect()->back()->with('delete-failed', 'Could not delete');
   }
 }

 public function submit_task_to_report(Request $request){

   date_default_timezone_set("Africa/Nairobi");
   $time = date("H:i A");
   $today = date('Y-m-d');
   $report_id = Report::select('id')->where('user_id', Auth::user()->id)->where('date',$today)->pluck('id')->first();
   $report = Report::find($report_id);
   $status_target = Target::select('status')->where('user_id', Auth::User()->id)->where('status','>',0)->pluck('status')->first(); 

   $status_target = $status_target - 1;
   $target_id = Target::select('id')->where('user_id', Auth::User()->id)->where('status','>',0)->pluck('id')->first(); 
   Target::where('id', $target_id)->update(['status' => "$status_target"]);

   if($time > strtotime('7:00 PM')){
    $report->time_sent = $time;
    $report->status = 0;
    $report->status_comment = 0;
    $report->approval_id  = null;
    $report->approval_status = null;
  }else{
    $report->time_sent = $time;
    $report->status = 1;
    $report->status_comment = 0;
    $report->approval_id  = null;
    $report->approval_status = null;
  }

  if($report->save()){

    $report_status_comment = Report::select('status_comment')->where('user_id', Auth::user()->id)->where('date',date('Y-m-d'))->where('status_comment',null)->pluck('status_comment'); 

    if($report_status_comment->isEmpty()){
      $btn_enable = '0';
    }else if(!empty($report_status_comment)){
      $btn_enable = '1';
    }

    $id = Auth::user()->id;
    $report_id = Report::select('id')->where('user_id', $id)->where('date',$today)->where('status',0)->pluck('id');  

    if($report_id->first()){
      $task_list = Task::where('report_id', $report_id)->get(); 
      return redirect()->route('staff-view-report');
      // return view('staff.list',compact('task_list','btn_enable'));
    }else{
      $task_list = []; 
       return redirect()->route('staff-view-report');
      // return view('staff.list',compact('task_list','btn_enable'));
    }

  }
  return redirect()->back()->with('failed', 'Task information could not be inserted!');
}

public function submit_task_to_back(Request $request)
{
 $today = date('Y-m-d');
 $report_id = Report::select('id')->where('user_id', Auth::user()->id)->where('date',$today)->pluck('id')->first();
 $report = Report::find($report_id);

 date_default_timezone_set("Africa/Nairobi");
 $time = date("H:i A");
 if($time > strtotime("07:00 PM")){
    // $report->time_sent = $time;
  $report->status = 0;
  $report->status_comment = 0;
  $report->approval_id  = null;
  $report->approval_status = null;
}else{
    // $report->time_sent = $time;
  $report->status = 1;
  $report->status_comment = 0;
  $report->approval_id  = null;
  $report->approval_status = null;
}

if($report->save()){
 $id = Auth::user()->id;
 $report_id = Report::select('id')->where('user_id', $id)->where('date',$today)->where('status',null)->pluck('id');   

 $report_status_comment = Report::select('status_comment')->where('user_id', Auth::user()->id)->where('date',date('Y-m-d'))->where('status_comment',null)->pluck('status_comment'); 

 if($report_status_comment->isEmpty()){
  $btn_enable = '0';
}else if(!empty($report_status_comment)){
  $btn_enable = '1';
}

if($report_id->first()){
  $task_list = Task::where('report_id', $report_id)->get(); 
  return view('staff.list',compact('task_list','btn_enable'));
}else{
  $task_list = []; 
  return view('staff.list',compact('task_list','btn_enable'));
}

}
return redirect()->back()->with('failed', 'Task information could not be inserted!');
}


}
