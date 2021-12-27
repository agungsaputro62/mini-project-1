<?php

//
namespace App\Http\Controllers\API;

//
use App\User;

// V
use Illuminate\Http\Request;

// V
use Exception;

// V
use App\Helpers\ResponseFormatter;

// V
use App\Http\Controllers\Controller;

// V
use Illuminate\Support\Facades\Auth;

// V
use Illuminate\Support\Facades\Hash;

// V
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

    public function login (UserRequest $request) {
        try {
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 500);
            }

            $user = User::where('email', $request->email)->first();

            if(!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticated');
        }
        catch (Exception $error) {
            return ResponseFormatter::error([
                    'message' => 'Something Went Wrong',
                    'error' => $error
                ], 'Authentication Failed', 500);
        }
    }

    public function fetch (UserRequest $request) {
        return ResponseFormatter::success($request->user(), 'Data Profile User Berhasil Diambil');
    }
}
