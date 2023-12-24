<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Organizer;
use App\Http\Requests\OrganizerRequest;
use Illuminate\Support\Facades\Hash;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Organizer::all();
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


        ];

        return $response;
    }
    public function logout(Request $request)
    {
        $request->user();

        $response = [
            'message' => 'Logout.'
        ];

      return $response;
    }
}
