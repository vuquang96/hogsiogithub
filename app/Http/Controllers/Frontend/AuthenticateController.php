<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        $rules = [
            'email'     =>  'required|email',
            'password'  =>  'required'
        ];

        $this->validate($request, $rules);

        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid Login Credential'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function createRole(Request $request){
        // Todo
    }

    public function createPermission(Request $request){
        // Todo
    }

    public function assignRole(Request $request){
        // Todo
    }

    public function attachPermission(Request $request){
        // Todo
    }
}