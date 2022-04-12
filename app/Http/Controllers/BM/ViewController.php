<?php

namespace App\Http\Controllers\BM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ULBD;
use App\User;
use App\Phone;
use Auth;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = ULBD::select('branch_id')->where('user_id',Auth::user()->id)->pluck('branch_id');
       // return $id;
        $staff_id=ULBD :: select('user_id')->where('branch_id',$id)->get();
       // return $staff_id;
       
       $staff = User::whereIn('id',$staff_id)->where('id','<>',Auth::user()->id)->get();
    //   return $staff;

       $phone = Phone ::whereIn('user_id',$staff_id)->get();
       //return $phone;

      

        return view('bm.bm-view-staff',compact('staff','phone'));
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
