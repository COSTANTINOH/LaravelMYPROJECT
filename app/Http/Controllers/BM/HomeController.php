<?php

namespace App\Http\Controllers\BM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Report;
use App\Task;
use App\User;
use App\ULBD;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
         $department_hod_id = ULBD::select('branch_id')->where('user_id', Auth::user()->id)->pluck('branch_id');
        $staff_same_department  = ULBD::select('user_id')->where('branch_id',$department_hod_id)->where('user_id','!=',Auth::user()->id)->pluck('user_id');


        $pending_report =Report::where('status_comment',0)->whereIn('user_id',$staff_same_department)->count();
        $pending_comment_report =Report::where('status_comment',1)->whereIn('user_id',$staff_same_department)->count();
        $received_report =Report::where('status_comment',2)->whereIn('user_id',$staff_same_department)->count();

        $dept_id =ULBD::select('department_id')->where('user_id',Auth::user()->id)->pluck('department_id');
        //return $dept_id;

        $dept_count =ULBD::select('user_id')->where('department_id',$dept_id)->count();

        return view('bm.index',compact('pending_report','pending_comment_report','received_report','dept_count'));
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
