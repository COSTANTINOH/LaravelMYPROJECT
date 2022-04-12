<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;
use App\Branch;
use App\Location;
use App\ULBD;
use Hash;
use DB;
use App\Department;
use App\Address;
use App\Phone;
use App\Role;
use App\Position;
use App\Opinion;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add-role');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $role = new Role();

        if($request->role != ""){
            $role->name = $request->role;
            $role->save();
            return redirect()->back()->with('success', 'Role Added Successfully!!'); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index_opinion()
    {
        $opinion = Opinion::get();
        return view('admin.admin-view-opinion',compact('opinion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $roles = Role::get();
        return view('admin.admin-view-roles',compact('roles'));
    }

       public function show_full(Request $request,$id)
    {
        
        $op = Opinion::select('description')->where('id',$id)->pluck('description');
        return view('admin.admin-view-opinion-full', compact('op'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::find($id);
        return view('admin.edit-roles',compact('roles'));
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
            //itaongezeka na kubadilika
        if($request->role == ""){
            return redirect()->back()->with('fail', 'Sorry! Role name is required')
                ->withInput();
        }else{

            $role = Role::find($id);
            $role->name = $request->role;
            $role->update();

            return redirect()->back()->with('success', 'Role is Updated Successfull');

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
        $role = Role::findOrFail($id);
        $role->delete();
        $roles = Role::get();
        return view('admin.admin-view-roles',compact('roles'));
    }
}
