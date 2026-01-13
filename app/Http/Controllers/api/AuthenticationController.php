<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
     // Register
    public function Register(Request $request) {
        $request->validate([
            "email" => 'email|unique:users,email|required',
            "name" => 'string|max:60|required',
            "password" => "string|min:8|confirmed|required",
        ]);

        $user = User::Create([
            "email" => $request->email,
            "name" => $request->name,
            "password" => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            "response_code" => 201,
            "status" => "success",
            "message" => "berhasil membuat user baru",
            "token" => $token,
            "token_type" => "bearer"
        ],201);
    }

    // validate token
    public function User(Request $request){
        return $request->user();
    }

    // login
    public function Login(Request $request){
        $requested = $request->validate([
            'email' => 'email|required',
            'password' => 'string',
        ]);

        if(!Auth::attempt($requested)) {
            return response()->json([
                'message' => 'email atau password salah',
            ], 401);
        }

        $user = $request->user();
        $token = $user->createToken("auth_token")->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
        
    }

    public function Logout(Request $request) {
        return $request->user()->currentAccessToken()->delete();
    }
}
