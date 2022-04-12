<?php

namespace App\Http\Controllers\AuthApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use App\Target;

class LoginController extends Controller
{
    public $loginAfterSignUp = true;

    public function login(Request $request) {
        $input = $request->only('email', 'password');
        $role_id = User::select('role_id')->where('email',$request->email)->pluck('role_id')->first();
        $userid = User::select('id')->where('email',$request->email)->pluck('id')->first();

        //NAME
        $first_name = User::select('first_name')->where('email',$request->email)->pluck('first_name')->first();
        $middle_name = User::select('middle_name')->where('email',$request->email)->pluck('middle_name')->first();
        $last_name = User::select('last_name')->where('email',$request->email)->pluck('last_name')->first();
        
        //target status
        $target_status = Target::select('id')->where('user_id',$userid)->where('status' ,'>','0')->pluck('id')->first();

        $jwt_token = null;


        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
            'status' => 'invalid_credentials',
            'message' => 'Incorrect Email or Password.',
            ], 401);
        }
      

        return response()->json([
            'status' => 'ok',
            'token' => $jwt_token,
            'statusCode' => 200,
            'role_id' => $role_id,
            'userid' => $userid,
            'ufname' => $first_name." ".$last_name,
            'target_status' => $target_status
        ],200);
        
      
    }

    public function logout(Request $request) {
        $this->validate($request, [
        'token' => 'required'
        ]);
        try {
        JWTAuth::invalidate($request->token);
        return response()->json([
        'status' => 'ok',
        'message' => 'Logout Succefully.'
        ]);
        } catch (JWTException $exception) {
        return response()->json([
        'status' => 'unknown_error',
        'message' => 'Cant logout Error just occur.'
        ], 500);
        }
    }

    public  function  getAuthUser(Request  $request) {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);
        return  response()->json(['user' => $user]);
    }

    protected function jsonResponse($data, $code = 200)
{
    return response()->json($data, $code,
        ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
}
       
       
}
