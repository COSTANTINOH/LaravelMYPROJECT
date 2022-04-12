<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Opinion;
use Validator;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $opinion = Opinion::where('user_id',$id)->get();
        return response()->json($opinion);
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
        //check report id of user before add task
        $today = date('Y-m-d');
               
            $input = $request->all();
            $validator = Validator::make($input, [
                'userid' => 'required',
                'opinion' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'ok' => false,
                    'error' => $validator->messages(),
                ]);
            }
            try {
                $opinion = new Opinion();
                $opinion->user_id = $request->input('userid');
                $opinion->description  = $request->input('opinion');
                $opinion->status = 0;
                $opinion->date = date('Y-m-d');
                $opinion->save();
                return response()->json([
                    "ok" => true,
                    "message" => "Opinion Sent Successfully",
                ]);
            } catch (\Exception $ex) {
                return response()->json([
                    "ok" => false,
                    "error" => $ex->getMessage(),
                ]);
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
