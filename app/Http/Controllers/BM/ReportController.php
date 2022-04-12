<?php

namespace App\Http\Controllers\BM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ULBD;
use Auth;
use App\Report;
use App\Task;
use App\Target;
use App\Comment;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ///get  bm branch id
        $today = date('Y-m-d');
        $branch_bm_id = ULBD::select('branch_id')->where('user_id', Auth::user()->id)->pluck('branch_id');
        
        $staff_same_branch  = ULBD::select('user_id')->where('branch_id',$branch_bm_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id'); //return array of data
        // return count($staff_same_branch);
        $arrayLength = count($staff_same_branch);
        $i = 0;

        if($staff_same_branch  != []){
            
            while ($i < $arrayLength){
                // return $staff_same_branch[$i]." ".$i;
                // $staff_report_comment_status_0 = Report::where('user_id',$staff_same_department[$i])->where('status_comment',0)->get();

                $report_comment_status_1 = Report::whereIn('user_id',$staff_same_branch)->where('status_comment',1)->get();
                $staff_report_comment_status_0 = Report::whereIn('user_id',$staff_same_branch)->where('status_comment',0)->where('status',1)->get();
                $report_comment_status_2 = Report::whereIn('user_id',$staff_same_branch)->where('status_comment',2)->get();
                $report_comment_status_3 = Report::whereIn('user_id',$staff_same_branch)->where('status',0)->where('date',$today)->get();
                // return $staff_report_comment_status_0;
                // if($staff_report_comment_status_0->isEmpty()){
                    // $staff_report_comment_status_0->user = [];
                    // return $staff_report_comment_status_0;
                    // return $report_comment_status_1;

                    return view('bm.bm-report-view',compact('staff_report_comment_status_0','report_comment_status_1','report_comment_status_2','report_comment_status_3'));
                    
                // }else{
                //     return $staff_report_comment_status_0;
                //     return view('bm.bm-report-view',compact('staff_report_comment_status_0','report_comment_status_1','report_comment_status_2','report_comment_status_3'));

                // }
                

                $i++;
            }
            // return view('bm.bm-report-view',compact('staff_report_comment_status_0','report_comment_status_1','report_comment_status_2','report_comment_status_3'));

            if($arrayLength == 0){
                $staff_report_comment_status_0 = [];
                $report_comment_status_1 = [];
                $report_comment_status_2 = [];
                $report_comment_status_3 = [];
                return view('bm.bm-report-view',compact('staff_report_comment_status_0','report_comment_status_1','report_comment_status_2','report_comment_status_3'));
                // return view('hod.hod-report-view',compact('staff_report_comment_status_0','report_comment_status_1','report_comment_status_2','report_comment_status_3'));
            }
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
        $task_list = Task::where('report_id', $id)->get();
        $user_id = Report::select('user_id')->where('id',$id)->pluck('user_id')->first();
        $target_name = Target::select('name')->where('user_id', $user_id)->where('status','>',0)->get(); 
        return view('bm.bm-report-view-staff', compact('task_list','target_name','id','user_id'));
    }

    public function bm_comment(Request $request,$id){
        // validate the form input
        $comment_name = $request->input('comment_bm');
        $check = $request->input('check');

        $comment = Comment::select('report_id')->where('report_id', $id)->pluck('report_id');
        // return $comment;
        $comments = new Comment();
        // return $comment_name;


        if($comment->isEmpty()){
            // return "a";
            if($check == "confirm"){
                if($comment_name != ""){
                    $comments->user_id = Auth::user()->id;
                    $comments->comment = $comment_name;
                    $comments->report_id = $id;
                    $comments->date = date('Y-m-d');
                    $comments->save();

                    Report::where('id', $id)->update(['status_comment' => "2"]);

                    return redirect()->back()->with('success-bm', 'Comment Saved Successfully');
                }else{
                    return redirect()->back()->with('failed-bm', 'Please Provide Comment..');
                }

            }else if($check == "return"){
                if($comment_name != ""){
                    $comments->user_id = Auth::user()->id;
                    $comments->comment = $comment_name;
                    $comments->report_id = $id;
                    $comments->date = date('Y-m-d');
                    $comments->save();

                    Report::where('id', $id)->update(['status_comment' => "1"]);
                    
                    return redirect()->back()->with('success-bm', 'Comment Sent Back to Employee');
                }else{
                    return redirect()->back()->with('failed-bm', 'Please Provide Comment..');
                }

            }else if($check == "" ||  $comment_name == ""){
                return redirect()->back()->with('failed-bm', 'Please Select Confirm Received or Return For Correction and provide comment');
            }

        }else if(!empty($comment)){
            if($check == "confirm"){
                if($comment_name != ""){
                    Report::where('id', $id)->update(['status_comment' => "2"]);
                    Comment::where('report_id', $id)->update(['comment' => "$comment_name"]);
                
                    return redirect()->back()->with('success-bm', 'Comment Saved Successfully');

                }else{
                    return redirect()->back()->with('failed-bm', 'Please Provide Comment..');
                }


            }else if($check == "return"){
                if($comment_name != ""){

                    Report::where('id', 1)->update(['status_comment' => "1"]);
                    Comment::where('report_id', $id)->update(['comment' => "$comment_name"]);
                    
                    return redirect()->back()->with('success-bm', 'Report Sent Back to employee for editing');

                }else{
                    return redirect()->back()->with('failed-bm', 'Please Provide Comment..');
                }

            }else if($check == "" ||  $comment_name == ""){
                return redirect()->back()->with('failed-bm', 'Please Select Confirm Received or Return For Correction and provide comment');
            }
        }

    }


    public function show_staff_report_print($id){
        $task_list = Task::where('report_id', $id)->get();
        $user_id = Report::select('user_id')->where('id',$id)->pluck('user_id')->first();
        $name_id= Task::select('target_id')->where('report_id', $id)->pluck('target_id')->first(); 
        $target_name = Target::select('name')->where('id', $name_id)->pluck('name');
        $comment_hod = Comment::select('comment')->where('report_id',$id)->pluck('comment');
        return view('bm.bm-report-view-print', compact('task_list','target_name','comment_hod','user_id'));
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
