<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacist;

class PharmacistController extends Controller
{
   
    public function index()
    {
        $pharmacists = Pharmacist::all();
        return view('pharmacists.index', compact('pharmacists'));
    }

    public function create()
    {
        return view('pharmacists.create');
    }

    public function store(Request $request)
    {
        // Validation logic here

        Pharmacist::create($request->all());

        return redirect()->route('pharmacists.index')->with('success', 'Pharmacist created successfully.');
    }

    public function edit(Pharmacist $pharmacist)
    {
        return view('pharmacists.edit', compact('pharmacist'));
    }

    public function update(Request $request, Pharmacist $pharmacist)
    {
        // Validation logic here

        $pharmacist->update($request->all());

        return redirect()->route('pharmacists.index')->with('success', 'Pharmacist updated successfully.');
    }

    public function destroy(Pharmacist $pharmacist)
    {
        $pharmacist->delete();
        return redirect()->route('pharmacists.index')->with('success', 'Pharmacist deleted successfully.');
    }
}
