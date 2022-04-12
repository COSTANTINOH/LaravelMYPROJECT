<?php

namespace App\Http\Controllers\GM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Report;
use App\Task;
use App\Target;
use App\Comment;
use Auth;

class ReportController extends Controller 
{
    public function hr_index(){
        $report_id = Report::select('user_id')->where('date',date('Y-m-d'))->where('report_type_id',4)->pluck('user_id');
        
        $i = 0;

        $count_id = count($report_id);
        
        while($i < $count_id){
            $hr_reports_all = Report::where('report_type_id',4)->get();
            // $hod_reports_today = Report::where('date',date('Y-m-d'))->where('report_type_id',4)->get();
            // $hod_reports_uncommented = Report::where('status_comment',null)->where('report_type_id',4)->get();
            // return $hr_reports_all;
            return view('gm.gm-view-hr-report',compact('hr_reports_all'));

             $i++;
        }     
        if($count_id == 0){
            $hr_reports_all = [];
            // $hod_reports_today = [];
            // $hod_reports_uncommented = [];
            return view('gm.gm-view-hr-report',compact('hr_reports_all'));
        } 
    }

    public function show_hr_report($id){
    
        $task_list = Task::where('report_id', $id)->get(); 
        $name_id= Task::select('target_id')->where('report_id', $id)->pluck('target_id')->first(); 
         $user_id = Report::select('user_id')->where('id',$id)->pluck('user_id')->first();
        $target_name = Target::select('name')->where('id', $name_id)->pluck('name');
        $comment_gm = Comment::select('comment')->where('report_id',$id)->pluck('comment');


        return view('gm.gm-hr-preview-report',compact('task_list','comment_gm','id','user_id'));

    }


     public function show_staff_report_print($id)
    {
        $task_list = Task::where('report_id', $id)->get();
         $user_id = Report::select('user_id')->where('id',$id)->pluck('user_id')->first();
        $name_id= Task::select('target_id')->where('report_id', $id)->pluck('target_id')->first(); 
        $target_name = Target::select('name')->where('id', $name_id)->pluck('name');
        $comment_hod = Comment::select('comment')->where('report_id',$id)->pluck('comment');
        return view('gm.gm-report-view-print', compact('task_list','target_name','comment_hod','user_id'));
    }

    public function gm_comment(Request $request,$id){

      $comment_name = $request->input('comment_gm');

      $comments = new Comment();

          if($comment_name != ""){
           $comments->user_id = Auth::user()->id;
           $comments->comment = $comment_name;
           $comments->report_id = $id;
           $comments->date = date('Y-m-d');
           

           if($comments->save()){
             Report::where('id', $id)->update(['status_comment' => "2"]);
             return redirect()->back()->with('success', 'Comment Sent Back to HR manager');
           }else{
             return redirect()->back()->with('failed', 'Opps Error Occured');
           }

          
          }else{
            return redirect()->back()->with('failed', 'Please provide a comment');
          }
      }
}


