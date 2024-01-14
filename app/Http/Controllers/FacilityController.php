<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Facilities/Index', [
            'facilities' => Facility::orderBy('name')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Facilities/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3',
            'active' => 'required'
        ]);

        Facility::create($attributes);
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        return Inertia::render('Facilities/Edit', [
            'facility' => $facility
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facility)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3',
            'active' => 'required',
            'address' => 'nullable',
            'city' => 'nullable',
            'province' => 'nullable',
            'postal_code' => 'nullable',
        ]);

        $facility->update($attributes);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        $facility->delete();
    }
}
