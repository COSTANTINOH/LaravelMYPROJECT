<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use App\Report;
use Validator;
use DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $report_id = Report::select('id')->where('user_id',$id)->where('date',date('Y-m-d'))->pluck('id')->first();

        $task = Task::where('report_id',$report_id)->get();
        return response()->json($task);
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

        //check report id of user before add task
        $today = date('Y-m-d');
        $report_id = Report::select('id')->where('user_id', $request->input('userid'))->where('date',$today)->pluck('id')->first(); 
  
        if($report_id != ''){

            $report_id = Report::select('id')->where('user_id', $request->input('userid'))->where('date',$today)->pluck('id')->first(); 
           
            $input = $request->all();
            $validator = Validator::make($input, [
                'task_title' => 'required',
                'task_description' => 'required',
                'time_taken' => 'required',
                'task_result' => 'required',
                'task_challenges' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'ok' => false,
                    'error' => $validator->messages(),
                ]);
            }
            try {
                $task = new Task();
                $task->title = $request->input('task_title');
                $task->report_id  = $report_id;
                $id = $request->input('userid');
                $task->description = $request->input('task_description');
                $task->time_taken = $request->input('time_taken'); // fixed

                $result = DB::table('targets')->select('id')->where('user_id',$request->input('userid'))->where('status','>',0)->first();
                $task->target_id = $result->id;

                $task->result = $request->input('task_result');
                $task->challenge = $request->input('task_challenges');
                $task->date_task = date('Y-m-d');
                $task->save();
                return response()->json([
                    "ok" => true,
                    "message" => "Task Inserted Successfully",
                ]);
            } catch (\Exception $ex) {
                return response()->json([
                    "ok" => false,
                    "error" => $ex->getMessage(),
                ]);
            }
        
        }else{
          //  $report_today = Report::select('time_sent')->where('user_id', $id)->where('date',$today)->where('time_sent',NULL)->pluck('time_sent')->first(); 
          $create_report_id = new Report();
          $create_report_id->user_id = $request->userid;
          $create_report_id->date = $today;
          $create_report_id->status = 0;
          $create_report_id->report_type_id = 1;
  
          if($create_report_id->save()){

            $report_id = Report::select('id')->where('user_id', $request->input('userid'))->where('date',$today)->pluck('id')->first(); 
           
            $input = $request->all();
            $validator = Validator::make($input, [
                'task_title' => 'required',
                'task_description' => 'required',
                'time_taken' => 'required',
                'task_result' => 'required',
                'task_challenges' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'ok' => false,
                    'error' => $validator->messages(),
                ]);
            }
            try {
                $task = new Task();
                $task->title = $request->input('task_title');
                $task->report_id  = $report_id;
                $id = $request->input('userid');
                $task->description = $request->input('task_description');
                $task->time_taken = $request->input('time_taken'); // fixed

                $result = DB::table('targets')->select('id')->where('user_id',$request->input('userid'))->where('status','>',0)->first();
                $task->target_id = $result->id;

                $task->result = $request->input('task_result');
                $task->challenge = $request->input('task_challenges');
                $task->date_task = date('Y-m-d');
                $task->save();
                return response()->json([
                    "ok" => true,
                    "message" => "Task Inserted Successfully",
                ]);
            } catch (\Exception $ex) {
                return response()->json([
                    "ok" => false,
                    "error" => $ex->getMessage(),
                ]);
            }
  
          }

    }
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
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required',
            'time_taken' => 'required',
            'result' => 'required',
            'challenge' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'error' => $validator->messages(),
            ]);
        }
        try {
            $tasks = Task::find($id);
            if ($tasks == false) {
                return response()->json([
                    "ok" => false,
                    "error" => "Update Fail id not found",
                ]);
            }
            $tasks->update($input);
            return response()->json([
                "ok" => true,
                "message" => "Updated Successfully",
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                "ok" => false,
                "error" => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $task = Task::find($id);
            if ($task == false) {
                return response()->json([
                    "ok" => false,
                    "error" => "Error occur when deleting task.",
                ]);
            }
            $task->delete([
            ]);
            return response()->json([
                "ok" => true,
                "message" => "Task deleted successfully.",
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                "ok" => false,
                "error" => $ex->getMessage(),
            ]);
        }
    }
}
