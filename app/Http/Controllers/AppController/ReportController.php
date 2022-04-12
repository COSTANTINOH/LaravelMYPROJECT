<?php

namespace App\Http\Controllers\AppController;

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
use Validator;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $input = $request->all();
        $validator = Validator::make($input, [
            'userid' => 'required',
        ]);
        
        $id = $request->input('userid');

        
        date_default_timezone_set("Africa/Nairobi");
        $time = date("H:i A");
        $today = date('Y-m-d');
        $report_id = Report::select('id')->where('user_id', $id)->where('date',$today)->pluck('id')->first();
        $report = Report::find($report_id);
        
       if(empty($report)){
        return response()->json([
            "ok" => false,
            "message" => "Report id not found",
        ]);
       }else{
        $status_target = Target::select('status')->where('user_id', $id)->where('status','>',0)->pluck('status')->first(); 
     
        $status_target = $status_target - 1;
        $target_id = Target::select('id')->where('user_id', $id)->where('status','>',0)->pluck('id')->first(); 
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

         
        try {
            $report->save();
            return response()->json([
                "ok" => true,
                "message" => "Report Sent Successfully",
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                "ok" => false,
                "error" => $ex->getMessage(),
            ]);
        }
       }
     
     
    }

    public function show_status($id)
    {    
        $report_status = Report::where('user_id',2)->where('date',date('Y-m-d'))->where('status_comment','0')->get();
        if($report_status->isEmpty()){
            return response()->json([
                "ok" => false,
                "error" => "Report Not Sent",
                'code' => 0
            ]);
        }else{
            return response()->json([
                "ok" => true,
                "message" => "Report Already Sent",
                'code' => 1
            ]);
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
    // public function store(Request $request)
    // {
    //     //
    // }

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
