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
class AdminaddstaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dept = Department::get();
        $bra = Branch::get();
        $loc = Location::get();
        $role = Role::get();
        $position = Position::get();

        return view('admin.add-staff',compact('dept','bra','loc','role','position'));
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

        $request->validate([
           
            'firstname' => ['required', 'alpha'],
            'middlename' => ['required', 'alpha'],
            'lastname' => ['required', 'alpha'],
            'phone' => ['required', 'digits:10'],            
        
        ], [
            'firstname.required' => 'Sorry! first name is required',
            'firstname.string' => 'Sorry! only characters are required',

            'midllename.required' => 'Sorry! middle name is required',
            'middlename.string' => 'Sorry! only characters are required',

            'lastname.required' => 'Sorry! first name is required',
            'lastname.string' => 'Sorry! only characters are required',

            'phone.required' => 'Sorry! first name is required',
            'phone.numeric' => 'Sorry! only numbers',

        ]);




        $a = 12345678;
        $add = new User; 
        $add->first_name = $request->firstname;
        $add->middle_name = $request->middlename;
        $add->last_name = $request->lastname;
        $add->email = $request->email;
        $add->role_id = $request->role;
        $add->position_id = $request->position;
        $add->photo_id = 1;
        $add->active = 1;
        $add->password=(Hash::make($a));

        if($add->save()){

                $user_id= User::select('id')->orderBy('id', 'desc')->pluck('id')->first();
                $ludbs = new ULBD;
                $ludbs->user_id = $user_id;
                $ludbs->location_id = $request->loc;
                $ludbs->branch_id = $request->bra;
                $ludbs->department_id = $request->dept;

                if($ludbs->save()){
                    $addphone = new Phone();
                    $addphone->phone = $request->phone;
                    $addphone->user_id = $user_id;

                    if($addphone->save()){

                       $address = new Address();
                       $address->region = "JATU";
                       $address->district = "JATU";
                       $address->ward = "JATU";
                       $address->street = "JATU";

                       if($address->save()){
                             $id= Address::select('id')->orderBy('id', 'desc')->pluck('id')->first();
                             User::where('id', $user_id)->update(['address_id' => $id]);
                            return redirect()->back()->with('success', 'Staff Added Successfully!!');
                         // return success
                       }else{
                          return redirect()->back()->with('fail', 'Failed to add staff make sure you provide all details correctly!!');
                       }

                    }else{
                          return redirect()->back()->with('fail', 'Failed to add staff make sure you provide all details correctly!!');

                    }

                }else{
                  return redirect()->back()->with('fail', 'Failed to add staff make sure you provide all details correctly!!');
                }
        }else{
            return redirect()->back()->with('fail', 'Failed to add staff make sure you provide all details correctly!!');
        }
    }


    public function viewingstaff($id)
    {
        $user = ULBD::select('user_id')->where('department_id',$id)->get();

        $names = User::whereIn('id',$user)->get();
    
        return view('admin.staff-dept',compact('names'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = User::get();
        return view('admin.admin-view-staff',compact('users'));
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
