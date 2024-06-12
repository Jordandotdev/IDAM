<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgreementController extends Controller
{
    public function index()
    {
        $userRole = auth()->user()->role; 
    
        $listings = auth()->user()->agreements()->paginate(10); 


        return view('admin.Agreement.index', compact('listings'));
    }

}
