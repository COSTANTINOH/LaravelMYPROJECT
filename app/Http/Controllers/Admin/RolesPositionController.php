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
use App\Department_position;

class RolesPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('admin.add-position',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dept_id = $request->department;
        $position = new Position();

        if($request->position != ""){
            $position->pname = $request->position;
            if($position->save()){
                $pid = Position::select('id')->orderBy('id','DESC')->pluck('id')->first();
                $dp = new Department_position();
                $dp->department_id = $dept_id;
                $dp->position_id = $pid;
                if($dp->save()){
                    return redirect()->back()->with('success', 'Position Added Successfully!!');
                }

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
        $position = Position::get();
        return view('admin.admin-view-position',compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::find($id);
        return view('admin.edit-position',compact('position'));
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
        if($request->position == ""){
            return redirect()->back()->with('fail', 'Sorry! Position name is required')
                ->withInput();
        }else{

            $position = Position::find($id);
            $position->pname = $request->position;
            $position->update();

            return redirect()->back()->with('success', 'Position is Updated Successfull');

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
        $position = Position::findOrFail($id);
        $position->delete();
        $position = Position::get();
        return view('admin.admin-view-position',compact('position'));
    }
}
