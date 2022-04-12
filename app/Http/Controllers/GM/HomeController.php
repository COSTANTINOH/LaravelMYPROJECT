<?php

namespace App\Http\Controllers\GM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Branch;
use App\Task;
use App\ULBD;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_num = User::all()->count();
        $dept_num = Department::all()->count();
        $branch_num = Branch::all()->count();


        $sum_hours = Task::groupBy('date_task')->selectRaw('sum(time_taken) as sum')->pluck('sum');  

        $sum_count  = count ($sum_hours);
        
        $totals = [
            'ict' =>  ULBD::where('department_id',1)->count(),
            'finance' =>  ULBD::where('department_id',2)->count(),
            'saccos' =>  ULBD::where('department_id',3)->count(),
            'transport' =>  ULBD::where('department_id',4)->count(),
            'marketing' =>  ULBD::where('department_id',5)->count(),
            'hr' =>  ULBD::where('department_id',6)->count(),
            'default' =>  ULBD::where('department_id',7)->count(),
            'leader' =>  ULBD::where('department_id',8)->count(),
            // And so on
        ];


        
        return view('gm.index',compact('user_num','dept_num','branch_num','totals'));
        
    }

    public function index_staff_show()
    {
        $staff = User::where('role_id','<>',1)->get();
        return view('gm.all-staff-view',compact('staff'));
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
