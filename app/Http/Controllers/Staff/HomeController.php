<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Target;
use App\User;
use App\Phone;
use App\Address;
use App\Location;
use App\ULBD;
use App\Branch;
use App\Branch_department;
Use App\Department;
use App\Position;
use App\Photo;
use App\Report;
use Intervention\Image\ImageManager;
use Image;
use Auth;
use App\Permission_note;

class HomeController extends Controller
{
    //function to return staff home page
    public function index(){
        $id = Auth::user()->id;
        
        
        $counts_status_comment =Report::where('status_comment',2)->where('user_id',$id)->count();

        $counts_time_sent = Report::where('time_sent',null)->where('user_id',$id)->count();

        $targets = Target::where('user_id',$id)->count();
        
        $page2 = Permission_note::where('staff_id',Auth::user()->id)->where('hod_recommendation','<>',NULL)->orderBy('id','desc')->first();
        
        if(!empty($page2)){
            // return "tt";
            $x = explode(']',$page2->request);
            
            if(($x[0] == '[emergency') AND ($page2->date_to == NULL)){
                $check = 1;
                // return view('staff.permission_note',compact('page','check'));
                return view('staff.index',compact('counts_status_comment','counts_time_sent','targets','check'));
            }else{
                $check = 0;
                return view('staff.index',compact('counts_status_comment','counts_time_sent','targets','check'));
            }
        }else{
            // return "toto";
            $check = 0;
            return view('staff.index',compact('counts_status_comment','counts_time_sent','targets','check'));
        }
            
        

    }


    public function target(){
        $target_status = Target::select('status')->where('user_id',Auth::user()->id) 
                            ->where('status','>=',0)
                            ->orderBy('id','DESC')
                            ->pluck('status');

         $check_null = Target::select('status')->where('user_id',Auth::user()->id)
                        ->where('status','>','0')->pluck('status');



         if($check_null->isEmpty()){
             $check_null = '0';
            return view('staff.create-target',compact('check_null','target_status'));
         }else if(!empty($check_null)){
            $check_null = '1';
            return view('staff.create-target',compact('check_null','target_status'));
         }
                            // return $target_status;
      
    }

    public function view_targets(){
        $targets = Target::where('user_id',Auth::user()->id)->get();
        return view('staff.view-targets', compact('targets'));
    }

    public function save_target(Request $request){
        // validate the form input
        $request->validate([
            'target' => 'required|string',
        ], [
            'target.required' => 'Sorry! Target is required',
        ]);

        $target = new Target;

        $target->name = $request->target;
        $target->user_id = Auth::user()->id;
        $target->status = '6';
        $target->date = date(now());        
        $target->save();
        
        
        return redirect()->route('view-targets');
    }

    //function to return staff profile page
    public function profile(){
        $id = Auth::user()->id;
        $see_profile=User::where('id',$id)->get();

        $phone=Phone::select('phone')->where('user_id',Auth::user()->id)->get();

        $address=User::select('address_id')->where('id',Auth::user()->id)->pluck('address_id');
        $show_address=Address::where('id',$address)->get();
        //return $show_address;

        $location_id=ULBD::select('location_id')->where('user_id',Auth::user()->id)->pluck('location_id');
        $location_name=Location::select('lname')->where('id',$location_id)->get();

        $branch_id=ULBD::select('branch_id')->where('user_id',Auth::user()->id)->pluck('branch_id');
        $branch_name=Branch::select('bname')->where('id',$branch_id)->get();

        $department_id=ULBD::select('department_id')->where('user_id',Auth::user()->id)->pluck('department_id');
         $department_name=Department::select('fullname')->where('id',$department_id)->get();

         $position_id=User::select('position_id')->where('id',Auth::user()->id)->pluck('position_id');
         $position_name=Position::select('pname')->where('id',$position_id)->get();
        
         $pic_id=User::select('photo_id')->where('id',Auth::user()->id)->pluck('photo_id');
         $pic=Photo::select('path')->where('id',$pic_id)->get();

         $pic_id=User::select('photo_id')->where('id',Auth::user()->id)->pluck('photo_id');
        $pic=Photo::select('path')->where('id',$pic_id)->get();

        $photo_id=User::select('photo_id')->where('id',Auth::user()->id)->pluck('photo_id');
         $photo_name=Photo::select('path')->where('id',$photo_id)->get(); 

          //  return $photo_name;
        return view('staff.profile2',compact('see_profile','phone','pic','photo_name','show_address','location_name','branch_name','position_name','department_name'));
    }

     //function to return staff profile personal details edit  page
    public function edit_profile_view(){
     $showing=User::where('id',Auth::user()->id)->get();
     $phone=Phone::select('phone')->where('user_id',Auth::user()->id)->get();
     $address_id=User::select('address_id')->where('id',Auth::user()->id)->pluck('address_id');
     $show_address=Address::where('id',$address_id)->get();

     $pic_id=User::select('photo_id')->where('id',Auth::user()->id)->pluck('photo_id');
     $pic=Photo::select('path')->where('id',$pic_id)->get();

     return view('staff.edit_profile', compact('showing','pic','phone','show_address'));

     
    
    }

    //function to return staff profile official details edit  page
    public function edit_profile_view2(){    
       //  $user_id=User::where('id',Auth::user()->id)->first();

         $location_id=ULBD::select('location_id')->where('user_id',Auth::user()->id)->pluck('location_id');
         $location_name=Location::select('name')->where('id',$location_id)->get();

         $branch_id=ULBD::select('branch_id')->where('user_id',Auth::user()->id)->pluck('branch_id');
         $branch_name=Branch::select('name')->where('location_id',$location_id)->get();
         


         $department_id=ULBD::select('department_id')->where('user_id',Auth::user()->id)->pluck('department_id');
         $department_name=Department::select('fullname')->where('id',$department_id)->get();

         $position_id=User::select('position_id')->where('id',Auth::user()->id)->pluck('position_id');
         $position_name=Position::select('name')->where('id',$position_id)->get();

         return view('staff.edit_profile2', compact('location_name','branch_name','department_name','position_name'));

        // $address_id=User::select('address_id')->where('id',Auth::user()->id)->pluck('address_id');
        // $show_address=Address::where('id',$address_id)->get();
            
        
        }

        public function update_pic(Request $request)
        {
            // validate the form input
            $request->validate([
               
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
               
                'image.required' => 'Opps! Post Image is required',
                'image.max' => 'Opps! Post Image File too large',
                'image.mimes' => 'Opps! Post Image type Not Supported',
            ]);
    
            $posts = new Photo;
        
            //$user = new User;
            
            // assign input values to the object
           
           
    
            if ($files = $request->file('image')) {
         
                // for save original image
                $ImageUpload = Image::make($files);
                $originalPath = public_path().'/img/';
                $name = rand();
                $ImageUpload->save($originalPath.$name.''.$files->getClientOriginalName());
                 
                // for save thumnail image
                $thumbnailPath = public_path().'/thumbnail/';
                $ImageUpload->resize(276,357);
                $ImageUpload = $ImageUpload->save($thumbnailPath.$name.''.$files->getClientOriginalName());
                
                $posts->path = $name.''.$files->getClientOriginalName();
                $posts->save();

                $photo_id = Photo::select('id')->where('path', $name.''.$files->getClientOriginalName())->pluck('id')->first();

                $user_image = User::find(Auth::user()->id);
                $user_image->photo_id =  $photo_id;
                $user_image->update();
                return redirect()->back();
            }
             
        }

        public function view_image(){
            $photo_id=User::select('photo_id')->where('id',Auth::user()->id)->pluck('photo_id');
            $photo_name=Photo::select('path')->where('id',$photo_id)->pluck('path');  
            return view('staff.profile', compact('photo_name','photo_id'));
                     

        }

        public function staff_edit_profile(){
         $data=User::where('id',Auth::user()->id)->get();
         $phone=Phone::where('user_id',Auth::user()->id)->get();
         $address_id=User::select('address_id')->where('id',Auth::user()->id)->pluck('address_id');
         $address_name=Address::where('id',$address_id)->get();

         $photo_id=User::select('photo_id')->where('id',Auth::user()->id)->pluck('photo_id');
         $photo_name=Photo::select('path')->where('id',$photo_id)->get();
        
        //$picha = Photo::select('path')->where('id',$photo_id)->where('path',$photo_name)->get('path');
          // return $picha;

         return view('staff.staff_profile_edit', compact('data','phone','photo_name','photo_id','address_name'));
           
        }

        public function staff_updates(Request $request){
           // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            $request->validate([
               // 'fname' => ['required','/^[a-zA-Z]+$/u|max:255,'],
             //  'fname' => ['required|regex:/^[0-9]+$/u|max:255|unique:users,name,'],
                'firstname' => ['required', 'alpha'],
                'middlename' => ['required', 'alpha'],
                'lastname' => ['required', 'alpha'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'phone' => ['required', 'digits:10'],
                'region' => ['required', 'alpha'],
                'district' => ['required', 'alpha'],
                'ward' => ['required', 'alpha'],
                'street' => ['required', 'alpha'],
            
            ], [
                'fname.required' => 'Sorry! first name is required',

                'mname.required' => 'Sorry! middle name is required',
                'mname.string' => 'Sorry! only characters are required',

                'lname.required' => 'Sorry! first name is required',
                'email.required' => 'Sorry! first name is required',
                'phone.numeric' => 'Sorry! only numbers',

            ]);
            
         
            
            $editing = User::find(Auth::user()->id);
            $editing->first_name=$request->firstname;
            $editing->middle_name=$request->middlename;
            $editing->last_name=$request->lastname;
            $editing->email=$request->email;
            $editing->update();

            $address_id=User::select('address_id')->where('id',Auth::user()->id)->pluck('address_id');
            Address::where('id',$address_id)->update(['region'=>$request->region,'district'=>$request->district,'ward'=>$request->ward,'street'=>$request->street]);
            
            Phone::where('user_id',Auth::user()->id)->update(['phone'=>$request->phone]);
        
            
            
            return redirect()->back()->with('status-okay', '  Profile update successfully');

        }
       
        public function password_updates(){

            $photo_id=User::select('photo_id')->where('id',Auth::user()->id)->pluck('photo_id');
            $photo_name=Photo::select('path')->where('id',$photo_id)->get();

            //$name=User::where('id',Auth::user()->id)->get();
            //return view('staff.password',compact('photo_name')); 


        }

        public function new_password(Request $request){

            $request->validate([
               // 'one' => 'required',
                'one' => ['required', 'min:8'],
               // 'two' => 'required', 
                'two' => ['required'],
                
            ], [
                'one.required' => 'Sorry! password  is required',
               // 'one.required' => 'Sorry! password  is required',
                'two.required' => 'Sorry! matching password is required',
              

            ]);


            $editing = User::find(Auth::user()->id);
            $a=$request->one;
            $b=$request->two;
        
            
            if($a != $b){
                return redirect()->back()->with('status', '  passwords do not match!');
            }
            else if($a == $b){
                $editing = User::find(Auth::user()->id);
                $editing->password=(Hash::make($a));
                $editing->update();
                    
                return redirect()->back()->with('status-okay', '  password reset successfully');
            }
        }
        
    


}
