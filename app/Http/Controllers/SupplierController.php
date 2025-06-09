<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        // dd($categories);
        return view("admin.supplier.index", ["suppliers" => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.supplier.create_supplier");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required"],
            "email" => ["email", "required"],
            "phone" => ["required", "max:10"],
            "address" => ["required"],
            "gender" => ["required"]
        ]);
        // dd($validated);
        Supplier::create($validated);
        return redirect("/admin/supplier")->with(["message" => "supplier created successfully"]);
        // dd($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
        // dd($category);
        return view("admin.supplier.show", ["supplier" => $supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
        // dd($category);
        return view("admin.supplier.edit", ["supplier" => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
        // dd($category);
        $validated = $request->validate([
            "name" => ["required"],
            "email" => ["email", "required"],
            "phone" => ["required", "max:10"],
            "address" => ["required"],
            "gender" => ["required"]
        ]);
        $supplier->update($validated);
        return redirect("/admin/supplier")->with(["update" => "supplier update"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
        $supplier->delete();
        return redirect("/admin/supplier")->with(["delete" => "supplier deleted"]);
        // dd($category);
    }
}
