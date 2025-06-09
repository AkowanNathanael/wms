<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWarehouseRequest;
use App\Http\Requests\UpdateWarehouseRequest;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::latest()->get();
        // dd($categories);
        return view("admin.warehouse.index", ["warehouses" => $warehouses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.warehouse.create_warehouse");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required"],
            "location" => ["required"]
        ]);

        Warehouse::create($validated);
        return redirect("/admin/warehouse")->with(["message" => "warehouse created successfully"]);
        // dd($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        //
        // dd($category);
        return view("admin.warehouse.show", ["warehouse" => $warehouse]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse)
    {
        //
        // dd($category);
        return view("admin.warehouse.edit", ["warehouse" => $warehouse]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        //
        // dd($category);
        $validated = $request->validate([
            "name" => ["required"],
            "description" => ["nullable"]
        ]);
        $warehouse->update($validated);
        return redirect("/admin/warehouse")->with(["update" => "warehouse updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        //
        $warehouse->delete();
        return redirect("/admin/warehouse")->with(["delete" => "warehouse deleted"]);
        // dd($category);
    }
}
