<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventoryItems = Inventory::all();
        return view('inventory.index', compact('inventoryItems'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'quantity' => 'required|numeric|min:1',
            // Add more validation rules as needed
        ]);

        Inventory::create($request->all());

        return redirect()->route('inventory.index')->with('success', 'Inventory item created successfully.');
    }

    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'quantity' => 'required|numeric|min:1',
            // Add more validation rules as needed
        ]);

        $inventory->update($request->all());

        return redirect()->route('inventory.index')->with('success', 'Inventory item updated successfully.');
    }

    // Add other methods like show() and destroy() as needed
}
