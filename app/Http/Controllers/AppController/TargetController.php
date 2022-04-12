<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Target;
use Validator;

class TargetController extends Controller
{


    public function show($id)
    {     
        $tagert = Target::where('user_id',$id)->get()->toArray();
        return response()->json($tagert);
    }

    public function current_target($id)
    {     
        $tagert = Target::select('name')->where('user_id',$id)->where('status','>',0)->get()->toArray();
        return response()->json($tagert);
    }
   
    public function show_status($id)
    {    
        $tagert_status = Target::where('user_id',$id)->where('status','>','0')->get();
        if($tagert_status->isEmpty()){
            return response()->json([
                "ok" => false,
                "error" => "Target is  InValid",
                'code' => 0
            ]);
        }else{
            return response()->json([
                "ok" => true,
                "message" => "Target is Valid",
                'code' => 1
            ]);
        }
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'userid' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'error' => $validator->messages(),
            ]);
        }
        try {
            $target = new Target;
            $target->user_id = $request->input('userid');
            $target->name = $request->input('name');
            $target->status = 6;
            $target->date = date('Y-m-d');
            $target->save();
            return response()->json([
                "ok" => true,
                "message" => "Target Created Successfully",
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                "ok" => false,
                "error" => $ex->getMessage(),
            ]);
        }
    }
}
