<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Holiday;
use App\User;
use App\Report;
use App\Task;
use App\Approval;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add-holiday');
    }

    public function holiday_list()
    {
        $holiday_list = Holiday::get();
        // return $holiday_list->date;
        $rep_hol = Report::select('date')->groupBy('date')->pluck('date')->toArray();
        // return $rep_hol;
        // $d = Holiday::select('date')->whereIn('date',$rep_hol)->pluck('date');
        return view('admin.show-holidays',compact('holiday_list','rep_hol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function holiday_approval($id)
    {
        $holiday = Holiday::find($id); // take the holiday
        $users = User::select('id')->pluck('id'); //get all users id

        $approal_reason = $holiday->name; //reason for aproval is the name of the holiday
        $date = $holiday->date;
// return $users;
        $count_user = count($users);
        $i = 0;
        while($i < $count_user){
        //return $users[$i]."<br>";
        
        // foreach($users as $user){
            // echo $user;
            $approval = new Approval();
            $approval->reason = $approal_reason;
            $approval->date = $date;
            $approval->user_id = $users[$i];

            if($approval->save()){
                $approval_id = Approval::select('id')->where('user_id',$users[$i])->where('date',$date)->orderBy('id','DESC')->pluck('id')->first();
                
                $create_report_id = new Report();
                $create_report_id->user_id = $users[$i];
                $create_report_id->date = $date;
                $create_report_id->status = 1;
                $create_report_id->status_comment = 2;
                $create_report_id->report_type_id = 1;
                $create_report_id->approval_id = $approval_id;
                $create_report_id->time_sent = "Approved";
                $create_report_id->approval_status = 1;
                $create_report_id->save();

                // if($create_report_id->save()){
                //     return redirect()->back()->with('success', 'Holiday Approval Approved Successfully');
                // }
            }
            $i++;
                
        }
        return redirect()->back()->with('success', 'Holiday Approval Approved Successfully');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->holiday == ""){
            return redirect()->back()->with('fail', 'Sorry! Holiday name is required')
                ->withInput();
        }else{

            $holiday = new Holiday();
            $holiday->name = $request->holiday;
            $holiday->date = $request->hdate;
            $holiday->save();

            return redirect()->back()->with('success', 'Holiday is saved Successfull');

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
        $holiday = Holiday::find($id);
        return view('admin.edit-holiday',compact('holiday'));
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
        if($request->holiday == ""){
            return redirect()->back()->with('fail', 'Sorry! Holiday name is required')
                ->withInput();
        }else{

            $holiday = Holiday::find($id);
            $holiday->name = $request->holiday;
            $holiday->date = $request->hdate;
            $holiday->update();

            return redirect()->back()->with('success', 'Holiday is Updated Successfull');

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
        $holiday = Holiday::findOrFail($id);
        $holiday->delete();
        return redirect()->route('holiday-list');
    }
}
