<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use  App\Http\Requests\AdminRequest;
use Illuminate\Validation\ValidationException;


use Illuminate\Http\Request;

class AdminController extends Controller
{
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
        ];

        return $response;
    }
    public function logout(Request $request)
    {
        if ($request->user()) {
            // If user is logged in, proceed with logout
            auth()->guard('admin')->logout(); // Assuming you're using the 'admin' guard
            $response = ['message' => 'Logout.'];
        } else {
            // If user is not logged in, return a message
            $response = ['message' => 'You need to login first.'];
        }

        return $response;
    }
}
