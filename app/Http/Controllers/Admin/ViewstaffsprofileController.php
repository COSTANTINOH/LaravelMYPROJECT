<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Phone;
use App\Address;
use App\Department;
use App\Branch;
use App\Location;
use App\Position;
use App\Role;
use App\ULBD;

class ViewstaffsprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $user = User::find($id);
        $dept = Department::get();
        $bra = Branch::get();
        $loc = Location::get();
        $roles = Role::get();
        $position = Position::get();

        return view('admin.edit-staff',compact('user','dept','bra','loc','position','roles'));
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
    public function edit(Request $request)
    {
       
       
       
            // $editing->first_name=ucfirst(strtolower($request->firstname));
            // $editing->middle_name=ucfirst(strtolower($request->middlename));
            // $editing->last_name=ucfirst(strtolower($request->lastname));
            // $editing->update();

            
            $id = $request->id;
            //return $id;

          //  User::where('id',$id)->update(['first_name' => $request->fname]);
            User::where('id',$id)->update(['first_name'=>ucfirst(strtolower($request->fname)),'middle_name'=>ucfirst(strtolower($request->mname)),'last_name'=>ucfirst(strtolower($request->lname)),'email'=>$request->email]);
            Phone::where('user_id',$id)->update(['phone'=>$request->phone]);


           $address_id = User::select('address_id')->where('id',$id)->pluck('address_id');
          // return $address_id;

            Address::where('id',$address_id)->update(['region'=>ucfirst(strtolower($request->region)),'district'=>ucfirst(strtolower($request->district)),'ward'=>ucfirst(strtolower($request->ward)),'street'=>ucfirst(strtolower($request->street))]);
            
    
            
            return redirect()->back()->with('status-okay', '   Profile edited successfully');






    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateofficial(Request $request)
    {
      $id = $request->id;

      $did=$request->dept;
      $bid=$request->name;
      $lid=$request->location;
      $pid=$request->pos;
    // return $pid;
      ULBD::where('user_id',$id)->update(['department_id'=>$did,'branch_id'=>$bid,'location_id'=>$lid]);
      User::where('id',$id)->update(['position_id'=>$pid]);

      return redirect()->back()->with('status-okay', '  Profile edited successfully');

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
