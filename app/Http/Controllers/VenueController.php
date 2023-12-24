<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use App\Http\Requests\VenueRequest;
class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Venue::all();
    
    }

    public function update(VenueRequest $request, string $id)
    {
        //
        $validated = $request->validated();

        $Request = Venue::findOrFail($id);

        $Request->update($validated);

        return $Request;
    }
}
