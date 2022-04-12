<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ULBD;
use Auth;
use App\User;
use App\Phone;
use App\Branch;
use App\Location;



class StaffviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
    public function show()
    {

        $department_id_hod = ULBD::select('department_id')->where('user_id',Auth::User()->id)->pluck('department_id')->first();
        $user_id = ULBD::select('user_id')->where('department_id',$department_id_hod)->where('user_id','!=',Auth::User()->id)->pluck('user_id');
        // return $user_id;
        if($user_id->isEmpty()){
            $branch_id = [];    
            $branch_name = [];
            $phone = [];
            $staffs = [];
            return view('hod.staffview',compact('staffs','branch_name','phone'));
        }
        elseif(!empty($user_id)){
            $branch_id = ULBD::select('branch_id')->whereIn('user_id',$user_id)->pluck('branch_id');    
            $branch_name = Branch::whereIn('id',$branch_id)->get();
            // return $branch_name;
            $phone = Phone::whereIn('user_id',$user_id)->get()->first();
            // return $phone . '********';
            $staffs = User::whereIn('id',$user_id)->get();
            //location name
            return view('hod.staffview',compact('staffs','branch_name','phone'));
        }
        
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


