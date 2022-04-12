<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{    
    public function index()
    {
        $location = Location::all();
        return view('admin.add-location',compact('location'));
    }

    public function location_list()
    {
        $location_list = Location::all();
        return view('admin.show-locations',compact('location_list'));
    }

    public function store(Request $request)
    {
        
        if($request->location == ""){
            return redirect()->back()->with('fail', 'Sorry! Location name is required')
                ->withInput();
        }else{

            $location = new Location();
            $location->lname = $request->location;
            $location->save();

            return redirect()->back()->with('success', 'Location is saved Successfull');

        }
    }

    public function edit($id)
    {
        
        $location = Location::find($id);
        return view('admin.edit-location',compact('location'));
    }

    public function update(Request $request, $id)
    {
       
        if($request->location == ""){
            return redirect()->back()->with('fail', 'Sorry! Location name is required')
                ->withInput();
        }else{

            $location = Location::find($id);
            $location->lname = $request->location;
            $location->update();

            return redirect()->back()->with('success', 'Location is Updated Successfull');

        }
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->route('location-list');
    }
}
