<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resources;
use App\Http\Requests\ResourcesRequest;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Resources::all();
    
    }

    public function update(ResourcesRequest $request, string $id)
    {
        //
        $validated = $request->validated();

        $Request = Resources::findOrFail($id);

        $Request->update($validated);

        return $Request;
    }
}
