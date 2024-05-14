<?php

namespace App\Http\Controllers;

use App\Enums\PropertyType;
use Illuminate\Http\Request;
use App\Models\Listing;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Listings.index', [
            'listings' => Listing::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Listings.form', [
            'listing' => (new Listing()),
            'propertyType' => PropertyType::cases(),
            'mode' => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'property_type' => 'required', 
        ]);

        Listing::create($validated);
        return redirect()->route('listings.index')->with('success', 'Listing successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return view('livewire.layout.thumbnail-property-card-view', [
            'listing' => Listing::findOrFail($listing),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return view('admin.listings.form', [
            'listing' => $listing,
            'propertyType' => propertyType::cases(),
            'mode' => 'update',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'propertyType' => 'required',
        ]);

        $listing->update($validated);

        return redirect()->route('listings.index')->with('success', 'Listing successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->route('listings.index')->with('success', 'Listing successfully deleted!');
    }
}
