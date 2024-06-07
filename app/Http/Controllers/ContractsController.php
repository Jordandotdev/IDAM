<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Listing;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Contracts.index', [
            'contracts' => Contract::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listings = Listing::all();
        return view('admin.Contracts.form', [
            'contract' => new Contract(),
            'mode' => 'create',
            'listings' => $listings,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'listing_id' => 'required|exists:listings,id',
            'agreement' => 'required|string|max:1500',
            'contract_period' => 'required|integer|min:3',
            'bid_date' => 'nullable|date',
            'bid_time' => 'nullable|date_format:H:i',
            'bid_duration' => 'nullable|integer|min:24',
        ]);

        Contract::create($validatedData);

        return redirect()->route('contracts.index')->with('success', 'Contract successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        $listings = Listing::all(); // Fetch all listings for the select dropdown in the edit form
        return view('admin.Contracts.form', [
            'contract' => $contract,
            'mode' => 'update',
            'listings' => $listings,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        $validatedData = $request->validate([
            'listing_id' => 'exists:listings,id',
            'agreement' => 'nullable|string|max:1500',
            'contract_period' => 'nullable|integer|min:3',
            'bid_date' => 'nullable|date',
            'bid_time' => 'nullable|date_format:H:i',
            'bid_duration' => 'nullable|integer|min:24',
        ]);

        $contract->update($validatedData);

        return redirect()->route('contracts.index')->with('success', 'Contract successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->route('contracts.index')->with('success', 'Contract successfully deleted!');
    }
}