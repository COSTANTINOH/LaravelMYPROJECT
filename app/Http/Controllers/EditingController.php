<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Address;
use App\Phone;
use App\Photo;
use Image;

class EditingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $myinfo = User::find(Auth::user()->id);
        return view('profile.staff_profile_edit',compact('myinfo')); 
       // return view('staff.staff_profile_edit');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    { 
        $myinfo = DB::table('users')->select('first_name','middle_name','last_name','email','phone','region','ward','street','district','positions.pname')
        ->join('phones', 'users.id', '=', 'phones.user_id')->where('users.id', Auth::User()->id)
         ->join('addresses', 'users.address_id', '=', 'addresses.id')
          ->join('positions', 'positions.id', '=', 'users.position_id')
        ->get();
 
        $myinfo2 = DB::table('uldbs')->select('locations.lname','fullname','branches.bname')
         ->join('locations', 'locations.id', '=', 'uldbs.location_id')->where('uldbs.user_id', Auth::User()->id)
         ->join('departments', 'departments.id', '=', 'uldbs.branch_id')->where('uldbs.user_id', Auth::User()->id)
         ->join('branches', 'branches.id', '=', 'uldbs.branch_id')->where('uldbs.user_id', Auth::User()->id)
        ->get();
 
         // return $myinfo2;
         return view('staff.staff_profile_edit',compact('myinfo','myinfo2'));
        // return view('staff.staff_profile_edit');
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            // 'fname' => ['required','/^[a-zA-Z]+$/u|max:255,'],
          //  'fname' => ['required|regex:/^[0-9]+$/u|max:255|unique:users,name,'],
             'firstname' => ['required', 'alpha'],
             'middlename' => ['required', 'alpha'],
             'lastname' => ['required', 'alpha'],
             'phone' => ['required', 'digits:10'],
             'region' => ['required', 'string'],
             'district' => ['required', 'string'],
             'ward' => ['required', 'string'],
             'street' => ['required', 'string'],
         
         ], [
             'fname.required' => 'Sorry! first name is required',

             'mname.required' => 'Sorry! middle name is required',
             'mname.string' => 'Sorry! only characters are required',

             'lname.required' => 'Sorry! first name is required',
             'email.required' => 'Sorry! first name is required',
             'phone.numeric' => 'Sorry! only numbers',

         ]);

            $editing = User::find(Auth::user()->id);

            

            // $editing->first_name=ucfirst(strtolower($request->firstname));
            // $editing->middle_name=ucfirst(strtolower($request->middlename));
            // $editing->last_name=ucfirst(strtolower($request->lastname));
            // $editing->update();
            
         
                       $editing->first_name=ucfirst(strtolower($request->firstname));
                        $editing->middle_name=ucfirst(strtolower($request->middlename));
                        $editing->last_name=ucfirst(strtolower($request->lastname));
                        $editing->update();
            
                       $address_id=User::select('address_id')->where('id',Auth::user()->id)->pluck('address_id');
                       Address::where('id',$address_id)->update(['region'=>ucfirst(strtolower($request->region)),'district'=>ucfirst(strtolower($request->district)),'ward'=>ucfirst(strtolower($request->ward)),'street'=>ucfirst(strtolower($request->street))]);
                        
                      Phone::where('user_id',Auth::user()->id)->update(['phone'=>$request->phone]);
                        //   return $x;
                        
                      
                      return redirect()->back()->with('status-okay', '  profile edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pic_update(Request $request)
    {
        $request->validate([
               
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
           
            'image.required' => ' Image is required',
            'image.max' => 'Opps! Post Image File too large',
            'image.mimes' => 'Opps! Post Image type Not Supported',
        ]);

        
     
       $posts = new Photo;

        if ($files = $request->file('image')) {
            
            
            // return __DIR__.'/../'; 
            // return public_path();
         
			
           $file =  $request->file('image');
           $name = rand();
           $filename = $name.''.$file->getClientOriginalName();
           $file->move(public_path('/jatureport/public/img'), $filename );
           
            $posts->path = $filename;
            $posts->save();
            
            $photo_id = Photo::select('id')->where('path', $name.''.$files->getClientOriginalName())->pluck('id')->first();
            $user_image = User::find(Auth::user()->id);
            $user_image->photo_id =  $photo_id;
            $user_image->update();
            
            return redirect()->back()->with('status-okay', '  Image uploaded successfully');
        }
         
    }
}
