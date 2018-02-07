<?php

namespace loja\Http\Controllers;

use loja\User;
use Illuminate\Http\Request;
use loja\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;

class LoginController extends Controller
{
	
    public function index(){
        return view('login.index');
    }
	
    public function login(Request $request) {
        
        $credentials = $request->only('email', 'password');

		$validator = Validator::make($credentials, [
			'password' => 'required',
			'email' => 'required'
		]);
		
		if($validator->fails()) {
			return response()->json([
				'message'=> 'Invalid credentials',
				'errors' => $validator->errors()->all()
			], 422);
		}
		
        try {
            if (! $token = app('tymon.jwt.auth')->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {

            return response()->json(['error' => 'could_not_create_token'], 500);
        }

		return response()->json(compact('token'));

    }

}