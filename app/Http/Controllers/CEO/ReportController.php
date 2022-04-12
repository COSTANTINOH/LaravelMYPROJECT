<?php

namespace App\Http\Controllers\CEO;

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
        $report_id = Report::where('status_comment',2)->where('report_type_id',4)->get();
        
        $i = 0;

        $count_id = count($report_id);

       
        while($i < $count_id){
            $hr_reports_all = Report::where('report_type_id',4)->get();
            return view('ceo.ceo-view-hr-report',compact('hr_reports_all'));

             $i++;
        }     
        if($count_id == 0){
            $hr_reports_all = [];
            return view('ceo.ceo-view-hr-report',compact('hr_reports_all'));
        } 
    }

    public function show_hr_report($id){
    
        $task_list = Task::where('report_id', $id)->get(); 
        $name_id= Task::select('target_id')->where('report_id', $id)->pluck('target_id')->first(); 
        
        $target_name = Target::select('name')->where('id', $name_id)->pluck('name');
        $comment_hod = Comment::select('comment')->where('report_id',$id)->pluck('comment');


        return view('ceo.ceo-hr-report-view',compact('task_list','target_name','comment_hod','id'));

    }


    public function ceo_comment(Request $request,$id){

        // validate the form input
      $comment_name = $request->input('comment_hr');

      $comment = Comment::select('report_id')->where('report_id', $id)->pluck('report_id');
      
      $comments = new Comment();
      $check = "confirm";


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
           return redirect()->back()->with('success', 'Comment Sent Back to HR manager');
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
       return redirect()->back()->with('success', 'Comment Sent Back to HR manager');
   }else{
       return redirect()->back()->with('failed', 'Please Provide Comment..');
   }

}

}else if(!empty($comment)){
if($check == "confirm"){

    if($comment_name != ""){
      Report::where('id', $id)->update(['status_comment' => "2"]);
      Comment::where('report_id', $id)->update(['comment' => "$comment_name"]);
      return redirect()->back()->with('success', 'Comment Sent Back to HR manager');

    }else{
        return redirect()->back()->with('failed', 'Please Provide Comment..');
    }


}else if($check == "return"){

  if($comment_name != ""){

   Report::where('id', 1)->update(['status_comment' => "1"]);
   Comment::where('report_id', $id)->update(['comment' => "$comment_name"]);
   return redirect()->back()->with('success', 'Report Sent Back to HR manager for editing');

}else{
  return redirect()->back()->with('failed', 'Please Provide Comment..');
}


}else if($check == "" ||  $comment_name == ""){
   return redirect()->back()->with('failed', 'Please Select Confirm Received or Return For Correction and provide comment');
}
}

}
}

