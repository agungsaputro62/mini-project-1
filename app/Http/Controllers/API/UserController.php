<?php

//
namespace App\Http\Controllers\API;

//
use App\User;

//
use Illuminate\Http\Request;

//
use App\Helpers\ResponseFormatter;

// Validasi
use App\Http\Controllers\Controller;

//
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\UserRequest;

class UserController extends Controller
{
    //
    public function register (UserRequest $request) {

            try {
                User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'User Registered');
        } catch (Exception $error) {
                return ResponseFormatter::success([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }
}
