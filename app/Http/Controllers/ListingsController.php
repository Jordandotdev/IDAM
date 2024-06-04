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
            'title' => 'required|max:255',
            'description' => 'required|string|min:10|max:65535',
            'price' => 'required|numeric|min:0',
            'property_type' => 'required|in:'. implode(',', array_map(fn($case) => $case->value, PropertyType::cases())),
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'floor_area' => 'required|numeric|min:1',
            'floors' => 'required|integer|min:1',
            'land_area' => 'required|numeric|min:1',
            'car_parking_spaces' => 'required|integer|min:0',
            'age_of_building' => 'required|integer|min:1',
            'width_of_approach_road' => 'required|numeric|min:1',
            'developer' => 'required|string|max:255',
            'availability' => 'required|in:Available,Sold,In Discussion',
            'furnishing_status' => 'required|in:1,2', // Assuming 1 for Furnished and 2 for Unfurnished
        ], [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'price.required' => 'The price field is required.',
            'property_type.required' => 'The property type field is required.',
            'bedrooms.required' => 'The number of bedrooms field is required.',
            'bathrooms.required' => 'The number of bathrooms field is required.',
            'floor_area.required' => 'The floor area field is required.',
            'floors.required' => 'The number of floors field is required.',
            'land_area.required' => 'The land area field is required.',
            'car_parking_spaces.required' => 'The number of car parking spaces field is required.',
            'age_of_building.required' => 'The age of the building field is required.',
            'width_of_approach_road.required' => 'The width of approach road field is required.',
            'developer.required' => 'The developer field is required.',
            'availability.required' => 'The availability field is required.',
            'furnishing_status.required' => 'The furnishing status field is required.',
        ]);

        Listing::create($validated);
        return redirect()->route('listings.index')->with('success', 'Listing successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return view('Listings.show', [
            'listing' => $listing,
            'mode' => 'show',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return view('admin.listings.form', [
            'listing' => $listing,
            'propertyType' => PropertyType::cases(),
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
            'property_type' => 'required',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'floor_area' => 'required|numeric|min:1',
            'floors' => 'required|integer|min:1',
            'land_area' => 'required|numeric|min:1',
            'car_parking_spaces' => 'required|integer|min:0',
            'age_of_building' => 'required|integer|min:1',
            'width_of_approach_road' => 'required|numeric|min:1',
            'developer' => 'required|string|max:255',
            'availability' => 'required|in:Available,Sold,In Discussion',
            'furnishing_status' => 'required|in:1,2', // Assuming 1 for Furnished and 2 for Unfurnished
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