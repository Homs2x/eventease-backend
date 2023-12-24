<?php

namespace App\Http\Controllers;

use  App\Models\Event;
use App\Http\Requests\EventRequest;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Event::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        //
        $validated = $request->validated();

        $Request =  Event::create($validated);

        return $Request;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id)
    {
        //
        $validated = $request->validated();

        $Request = Event::findOrFail($id);

        $Request->update($validated);

        return $Request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $Request = Event::findOrFail($id);
 
        $Request->delete();

        return $Request;
    }
}
