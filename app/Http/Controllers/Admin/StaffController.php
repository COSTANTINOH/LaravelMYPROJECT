<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Branch;
use App\Location;
use App\ULBD;
use App\Role;
use App\Photo;
use App\Position;

class StaffController extends Controller
{
    public function index()
    {
        $dept = Department::all();
        $branch = Branch::all();
        $location = Location::all();
        return view('admin.add-user',compact('dept','location','branch'));
    }

    public function location_list()
    {
        $user_list = User::all();
        return view('admin.show-users',compact('user_list'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:150',
            'product_desc' => 'required|string',
            'product_price' => 'required|string',
            'product_quantity' => 'required|string',
            'product_quality' => 'required|string',
            'product_category' => 'required|string',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'fname.required' => 'Opps! Production name is required',
            'product_name.max' => 'Opps! Product name is too long',
            'product_desc.required' => 'Opps! Description is required',
            'product_price.required' => 'Opps! Price is required',
            'product_quantity.required' => 'Opps! Quantity is required',
            'product_quality.required' => 'Opps! Quality is required',
            'product_category.required' => 'Opps! Category is required',
            'product_image.required' => 'Opps! Image is required',
            'product_image.max' => 'Opps! Image File too large',
            'product_image.mimes' => 'Opps! Image type Not Supported',
        ]);

        //itaongezeka na kubadilika
        if($request->fname == ""){
            return redirect()->back()->with('fail', 'Sorry! First name is required')
                ->withInput();
        }if($request->mname == ""){
            return redirect()->back()->with('fail', 'Sorry! Middle name is required')
                ->withInput();
        }if($request->lname == ""){
            return redirect()->back()->with('fail', 'Sorry! Last name is required')
                ->withInput();
        }else{

            $location = new Location();
            $location->lname = $request->location;
            $location->save();

            return redirect()->back()->with('success', 'Branch is saved Successfull');

        }
    }

    public function edit($id)
    {
        
        $user = User::find($id);
        return view('admin.edit-user',compact('user'));
    }

    public function update(Request $request, $id)
    {
       //itaongezeka na kubadilika
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user-list');
    }
}
