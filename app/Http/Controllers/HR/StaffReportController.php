<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Report;
use App\Task;
use App\Target;
use App\Comment;
use App\User;
use Auth;

class StaffReportController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $staff_reports_comments = Report::where('date',date('Y-m-d'))->where('report_type_id',1)->where('status_comment',2)->get();
         $staff_reports_comments_back = Report::where('report_type_id',1)->where('status_comment',1)->get();
         $staff_reports_today = Report::where('date',date('Y-m-d'))->where('report_type_id',1)->get();
        
         return view('hr.hr-view-staff-report',compact('staff_reports_today','staff_reports_comments','staff_reports_comments_back'));
    }



       public function hod_index()
    {
         
        $report_id = Report::select('user_id')->where('date',date('Y-m-d'))->where('report_type_id',2)->pluck('user_id');
        
        $i = 0;

        $count_id = count($report_id);
        
        while($i < $count_id){

            //  $select_name = User::select('first_name','middle_name','last_name')->whereIn('id',$report_id)->pluck('first_name','middle_name','last_name');

                 $hod_reports_all = Report::where('status_comment',2)->where('report_type_id',2)->get();
                 $hod_reports_today = Report::where('date',date('Y-m-d'))->where('report_type_id',2)->get();
                 $hod_reports_uncommented = Report::where('status_comment',null)->where('report_type_id',2)->get();
                 return view('hr.hr-view-hod-report',compact('hod_reports_today','hod_reports_all','hod_reports_uncommented'));

             $i++;
        }     
        if($count_id == 0){
            
            $hod_reports_all = Report::where('status_comment',2)->where('report_type_id',2)->get();
            if(!($hod_reports_all->isEmpty())){
                 $hod_reports_all = Report::where('status_comment',2)->where('report_type_id',2)->get();
            }else{
               $hod_reports_all = [];
            }
            
            
             $hod_reports_uncommented = Report::where('status_comment',null)->where('report_type_id',2)->get();
            if(!($hod_reports_uncommented->isEmpty())){
                  $hod_reports_uncommented = Report::where('status_comment',null)->where('report_type_id',2)->get();
            }else{
              $hod_reports_uncommented = [];
            }
            
            $hod_reports_today = [];
            return view('hr.hr-view-hod-report',compact('hod_reports_today','hod_reports_all','hod_reports_uncommented'));
        } 
        
    }

    public function show_staff_report($id)
    {
    
     $task_list = Task::where('report_id', $id)->get(); 
     $user_id = Report::select('user_id')->where('id',$id)->pluck('user_id')->first();
     $name_id= Task::select('target_id')->where('report_id', $id)->pluck('target_id')->first(); 
     $target_name = Target::select('name')->where('id', $name_id)->pluck('name');
     $comment_hod = Comment::select('comment')->where('report_id',$id)->pluck('comment');


     return view('hr.hr-preview-report-staff',compact('task_list','target_name','comment_hod','user_id'));

    }

    public function show_hod_report($id)
    {
    
     $task_list = Task::where('report_id', $id)->get(); 
     $user_id = Report::select('user_id')->where('id',$id)->pluck('user_id')->first();
     $name_id= Task::select('target_id')->where('report_id', $id)->pluck('target_id')->first(); 
     $target_name = Target::select('name')->where('id', $name_id)->pluck('name');
     $comment_hr = Comment::select('comment')->where('report_id',$id)->pluck('comment');



     return view('hr.hr-hod-report-view',compact('task_list','id','comment_hr','user_id'));

    }

     public function hod_comment(Request $request,$id){

        $comment_name = $request->input('comment_hod');
          $comments = new Comment();

         if($comment_name != ""){
            $comments->user_id = Auth::user()->id;
            $comments->comment = $comment_name;
            $comments->report_id = $id;
            $comments->date = date('Y-m-d');
            $comments->save();
            Report::where('id', $id)->update(['status_comment' => "2"]);
            return redirect()->route('hr-view-hod-report');
        }else{
            return redirect()->back()->with('failed', 'Please Provide Comment..');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

         public function show_staff_report_print($id)
    {
        $task_list = Task::where('report_id', $id)->get();
        $user_id = Report::select('user_id')->where('id',$id)->pluck('user_id')->first();
        $name_id= Task::select('target_id')->where('report_id', $id)->pluck('target_id')->first(); 
        $comment_hr = Comment::select('comment')->where('report_id',$id)->pluck('comment');
        return view('hr.hr-preview-report-hod', compact('task_list','comment_hr','user_id'));
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
