<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Organizer;
use App\Http\Requests\OrganizerRequest;


class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $reqeust)
    {
        return $reqeust->user();
    }

    /**
     * Authenticate the organizer with the provided credentials.
     */
    public function login(OrganizerRequest $request)
    {
     
        $user = Organizer::where('email', $request->email)->first();
     
        if (! $user || is_null($user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        $response =[
            'user' => $user,
            'token' =>$user->createToken($request->email)->plainTextToken

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
            'message' => 'USER Logout.'
        ];

        return $response;
    }

    // If no user is logged in, return an appropriate response
    return response()->json(['message' => 'No user logged in.'], 401);
}
}
