<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add-department');
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

    public function dept_list()
    {
        $dept_list = Department::all();
        return view('admin.show-departments',compact('dept_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        if($request->department == ""){
            return redirect()->back()->with('fail', 'Sorry! Department name is required')
                ->withInput();
        }elseif($request->department_short == ""){
            return redirect()->back()->with('fail', 'Sorry! Department Short name is required')
                ->withInput();
        }else{
            $dept = new Department();
            $dept->fullname = $request->department;
            $dept->short_form = $request->department_short;
            if($dept->save()){
                return redirect()->back()->with('success', 'Department is saved Successfull');
            }else{
                   return redirect()->back()->with('failed', 'Department not saved Successfull');
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
        $dept = Department::find($id);
        return view('admin.edit-department',compact('dept'));
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
        if($request->department == ""){
            return redirect()->back()->with('fail', 'Sorry! Department name is required')
                ->withInput();
        }elseif($request->department_short == ""){
            return redirect()->back()->with('fail', 'Sorry! Department Short name is required')
                ->withInput();
        }else{

            $dept = Department::find($id);
            $dept->fullname = $request->department;
            $dept->short_form = $request->department_short;
            $dept->update();

            return redirect()->back()->with('success', 'Department is Updated Successfull');

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
        $dept = Department::findOrFail($id);
        $dept->delete();
        return redirect()->route('department-list');
    }
}
