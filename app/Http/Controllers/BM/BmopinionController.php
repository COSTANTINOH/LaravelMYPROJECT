<?php

namespace App\Http\Controllers\BM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Opinion;
use App\User;
use Auth;
use App\ULBD;
use App\Report;
use App\Branch;

class BmopinionController extends Controller
{
    public function index(){
        return view('bm.bm-opinion-view');
    }


    public function BmView(){

        $department_id_bm = ULBD::select('branch_id')->where('user_id',Auth::User()->id)->pluck('branch_id');
        $user_id = ULBD::select('user_id')->where('branch_id',$department_id_bm)->where('user_id','!=',Auth::User()->id)->pluck('user_id');
        // return $user_id;
        $opinion = Opinion::whereIn('user_id',$user_id)->get(); // SELECT * FROM opinion WHERE user_id IN(2,7);
        // return $opinion;
        return view('bm/bm-opinion-view', compact('opinion'));
    }

    public function BmViewFull($id){
        $opinion = Opinion::find($id);
          return view('bm.bm-view-full', compact('opinion'));
    }

    //Branch manager to view all staffs who didint write a report on a specified day
    public function NoReport(){
        $date = date('Y-m-d');
        $branch_id = ULBD::select('branch_id')->where('user_id',Auth::User()->id)->pluck('branch_id');
        $user_id = ULBD::select('user_id')->where('branch_id',$branch_id)->where('user_id','!=',Auth::User()->id)->pluck('user_id');

        // return $user_id;
        $report_id_1 = Report::select('user_id')->whereIn('user_id',$user_id)->whereDate('date','=',$date)->pluck('user_id');
        // return $report_id;
        $users = User::whereNotIn('id',$report_id_1)->whereIn('id',$user_id)->get();
        // return $users;
        return view('bm/bm-view-staff-no-report',compact('users','date'));
    }
}
