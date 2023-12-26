<?php

namespace App\Http\Controllers;
use App\Models\EventSchedule;
use  App\Models\Event;
use App\Models\Venue;
use App\Models\Resources;
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
        $validated = $request->validated();

        // Retrieve the venue
        $venue = Venue::find($validated['venue_id']);

        // Check for availability
        if (!$venue || !$venue->availablity_status) {
            return response()->json(['message' => 'Venue is not available'], 400);
        }

        $res = Resources::find($validated['resource_id']);

        if (!$res || !$res->availability) {
            return response()->json(['message' => 'Resource is not available'], 400);
        }

        // Update availability status
        $venue->update(['availablity_status' => false]);
        $res->update(['availability' => false]);

        // Create the event
        $event = Event::create($validated);

        // Create the associated event schedule
        EventSchedule::create([
            'event_id' => $event->event_id,
            // Add other fields as needed
        ]);

        return $event;
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
    public function destroy( string $id)
    {
        //
        $Request = Event::findOrFail($id);

        $Request->delete();

        return $Request;
            
    }
}
