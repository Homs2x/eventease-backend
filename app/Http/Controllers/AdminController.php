<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use  App\Http\Requests\AdminRequest;
use Illuminate\Validation\ValidationException;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){

        return $request->user();

    }
    //
    public function login(AdminRequest $request)
    {
     
        $user = Admin::where('username', $request->username)->first();
     
        if (! $user || is_null($user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        $response =[
            'user' => $user,
            'token' =>$user->createToken($request->username)->plainTextToken
        ];

        return $response;
    }
    public function logout(Request $request)
    {
        // Ensure that there is a logged-in user
        if (Auth::check()) {
            // Revoke the user's tokens
            $request->user()->tokens()->delete();
            
            $response = [
                'message' => 'ADMIN Logout.'
            ];
    
            return $response;
        }
    
        // If no user is logged in, return an appropriate response
        return response()->json(['message' => 'No user logged in.'], 401);
    }
}
