<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Opinion;
use Auth;
use App\ULBD;
use App\User;

class OpinionController extends Controller
{

    public function index(){
        return view('staff.opinion');
    }

    public function store(Request $request){

       $input = $request->input('description');

        if($input != ''){
             //create opinion
        $date = date('Y-m-d');
        $opinion = new Opinion;
        $opinion->description = $request->input('description');
        $opinion->user_id = auth()->user()->id;
        $opinion->date = $date;
        $opinion->status = 0;
        $opinion->save();
        
        // return back()->with('success', 'Opinion submitted successfully.');
        return redirect()->to('staff/opinion-preview')->with('success', 'Opinion submitted successfully.');
        }else{
            return redirect()->back()->with('fail', 'Description is Required');
        }
    }

    public function show(){
         $opinion = Opinion::where('user_id', Auth::user()->id)->get(); 
         return view('staff/opinion-preview', compact('opinion'));
    }

    public function hodView(){
        $department_id_hod = ULBD::select('department_id')->where('user_id',Auth::User()->id)->pluck('department_id');
        $user_id = ULBD::select('user_id')->where('department_id',$department_id_hod)->where('user_id','!=',Auth::User()->id)->pluck('user_id');
        $opinion = Opinion::whereIn('user_id',$user_id)->get(); // SELECT * FROM opinion WHERE user_id IN(2,7);
        return view('hod/hod-opinion-view', compact('opinion'));
    }

    public function viewFull($id){
        $opinion = Opinion::findOrFail($id);
        // Opinion::where('id',$id)->update(['status'=>'1']);
        return view('hod/hod-view-full', compact('opinion'));
    }

    public function staffView($id){
        $opinion = Opinion::find($id);
        return view('staff/staff-view-full', compact('opinion'));
    }

}


