<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "name" => "required",
                "email" => "required|email|unique:users",
                'password' => ['required', 'confirmed', Password::min(8)],
            ]);
            if ($validator->fails()) {
                return response()->json(['message'=> 'Register failed', 'errors' => $validator->errors()], 422);
            }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
    
            if ($user->save()) {
                return response()->json([
                    "message" => "User created",
                    "user"      => $user
                ], 200);
            } else {
                return response()->json([
                    "message" => "Register Failed",
                ], 500);
            }
        } catch(\Illuminate\Database\QueryException $queryerr) {
            return response()->json([
                "message" => "Register Failed",
            ], 500);
        }
        
    }
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()
                ->json(['message' => 'Invalid credentials'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => "User created",
            'token' => $token
        ]);
    }
    public function logout(Request $request) {
        $user = $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
