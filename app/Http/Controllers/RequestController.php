<?php

namespace App\Http\Controllers;

use  App\Http\Requests\ReqRequest;
use App\Models\Request;


class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Request::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ReqRequest $request)
    {
        $validated = $request->validated();

        $Request = Request::create($validated);

        return $Request;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ReqRequest $request, string $id)
    {
        $validated = $request->validated();

        $Request = Request::findOrFail($id);

        $Request->update($validated);

        return $Request;
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Request = Request::findOrFail($id);
 
        $Request->delete();

        return $Request;
    }
}
