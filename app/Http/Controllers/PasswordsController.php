<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class PasswordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "yiufdsa";
        return view('profile.password');
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
        //
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
        


         $editing = User::find(Auth::user()->id);
         $a=$request->one;
         $b=$request->two;
         $c=$request->old;

         $look = Hash::check($c, Auth()->user()->password);
         
         if($look == $c){
        
         if( empty($a)){
            $request->validate([
            
                 'one' => ['required'],
             
                
                 
             ], [
                 'one.required' => 'Sorry! new password can not be empty'
               
               
    
             ]);
         }
         else if(empty($b)){
            $request->validate([
            
                
            
                'two' => ['required'],
                
            ], [
                
                'two.required' => 'Sorry! Password conformation field can not be empty'
              
   
            ]); 
         }
         else{
            $request->validate([
                // 'one' => 'required',
                 'one' => ['required', 'min:8'],
                // 'two' => 'required', 
                 'two' => ['required'],
                 
             ], [
                 'one.required' => 'Sorry! password  is required',
                 'one.min' =>'Sorry password must contain 8 characters long',
                // 'one.required' => 'Sorry! password  is required',
                 'two.required' => 'Sorry! matching password is required',
                 'two.min' =>'Sorry password must contain 8 characters long',
               
    
             ]);
            
            if($a != $b){
                return redirect()->back()->with('status', '  Passwords do not match!');
            }
            else if($a == $b){
                $editing = User::find(Auth::user()->id);
                $editing->password=(Hash::make($a));
                $editing->update();
                    
                return redirect()->back()->with('status-okay', '  Password changed  successfully');
            }

         }
     
        }
        else{
            return redirect()->back()->with('status', ' Old password do not match!');
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
        //
    }
}
