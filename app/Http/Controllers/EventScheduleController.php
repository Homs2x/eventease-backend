<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Models\EventSchedule;
use App\Http\Requests\EventScheduleRequest;

class EventScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return EventSchedule::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(EventScheduleRequest $request)
    {
        //
        $validated = $request->validated();

        $Request =  EventSchedule::create($validated);

        return $Request;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(EventScheduleRequest $request, string $id)
    {
        //
        $validated = $request->validated();

        $Request = EventSchedule::findOrFail($id);

        $Request->update($validated);

        return $Request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $Request = EventSchedule::findOrFail($id);
 
        $Request->delete();

        return $Request;
    }
}
