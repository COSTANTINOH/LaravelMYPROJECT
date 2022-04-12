<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Report;
use App\Target;
use App\Task;
use App\Comment;
use Auth;

class HodReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            return view('hod.hod-create-report',compact('x'));
        }else{
            if(date('Y-m-d') > $chdate){
                $x = 0;
                return view('hod.hod-create-report',compact('x'));
            }else{
                $x = 1;
                return view('hod.hod-create-report',compact('x'));
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
        // validate the form input
        $request->validate([
            'report_title' => 'required|string',
            'report' => 'required|string',
        ], [
            'report_title.required' => 'Sorry! Report Title is required',
            'report.required' => 'Sorry! Weekly Report is required',
        ]);

        // Create dumb target for HOD
        $target = new Target;

        $target->name = "HOD Target";
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

         
        // $report_date = Report::select('date')->pluck('date');
        // return $report_date; 
         
         $report_id = Report::select('id')->where('user_id', $id)->where('date',$today)->pluck('id'); 
 
         if($report_id->first()){
 
             $report_id = Report::select('id')->where('user_id', $id)->where('date',$today)->pluck('id')->first();
 
              //return view('staff.create',compact('target_name','report_id')); 
         }else{ 
             $create_report_id = new Report();
             $create_report_id->user_id = Auth::user()->id;
             $create_report_id->date = $today;
             $create_report_id->status = 0;
             $create_report_id->report_type_id = 2;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
         $rid = $task->report_id;
        //  return $task;
         $comment_hr = Comment::select('comment')->where('report_id',$rid)->pluck('comment');
        return view('hod.hod-view-my-reports',compact('task','comment_hr'));
    }

    public function show_report(){
        $targets = Target::where('user_id', Auth::user()->id)->get();
        // return $targets;
        
        $tasks = Task::whereIn('target_id',$targets)->get();
        // return $tasks;
        return view('hod.hod-view-my-report',compact('tasks'));
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
