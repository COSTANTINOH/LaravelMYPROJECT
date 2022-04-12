<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Branch;
use App\Location;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = Location::all();
        return view('admin.add-branch',compact('location'));
    }

    public function branch_list()
    {
        $branch_list = Branch::with('location')->get();
        return view('admin.show-branches',compact('branch_list'));
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
        //to be edited
        if($request->branch == ""){
            return redirect()->back()->with('fail', 'Sorry! Branch name is required')
                ->withInput();
        }elseif($request->location == ""){
            return redirect()->back()->with('fail', 'Sorry! Choose Location Before adding')
                ->withInput();
        }else{

            $branch = new Branch();
            $branch->bname = $request->branch;
            $branch->location_id = $request->location;
            $branch->save();

            return redirect()->back()->with('success', 'Branch is saved Successfull');

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
        $branch = Branch::find($id);
        $location = Location::all();
        return view('admin.edit-branch',compact('branch','location'));
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
        //to be edited
        if($request->branch == ""){
            return redirect()->back()->with('fail', 'Sorry! Branch name is required')
                ->withInput();
        }elseif($request->location == ""){
            return redirect()->back()->with('fail', 'Sorry! Choose Location Before adding')
                ->withInput();
        }else{

            $branch = Branch::find($id);
            $branch->bname = $request->branch;
            $branch->location_id = $request->location;
            $branch->update();

            return redirect()->back()->with('success', 'Branch is Updated Successfull');

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
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return redirect()->route('branch-list');
    }
}
