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

        $userRole = auth()->user()->role;

        if ($userRole == 4) {
            $contracts = auth()->user()->contracts()->paginate(10);
        } else {
            $contracts = Contract::paginate(10);
        }


        return view('admin.Contracts.index', compact('contracts', 'userRole'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = auth()->id();
        $userRole = auth()->user()->role;

        if ($userRole == 4) {
            if (Listing::where('user_id', $userId)->exists()) {
                $listings = Listing::where('user_id', $userId)->get();
            } else {
                return redirect()->route('contracts.index')->with('message', 'You need to create a listing first.'); 
            }
        } else {
            $listings = Contract::paginate(10);
        }

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

        $user_id = auth()->id();
        if (!$user_id) {
            return redirect()->back()->withErrors(['error' => 'User not authenticated.']);
        }

        $contract = Contract::create(array_merge($validatedData, ['user_id' => auth()->id()]));


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