<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::latest()->get();
        // dd($categories);
        return view("admin.brand.index", ["brands" => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.brand.create_brand");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required"],
            "description" => ["nullable"]
        ]);

        Brand::create($validated);
        return redirect("/admin/brand")->with(["message" => "brand created successfully"]);
        // dd($validated);
    }


    public function show(Brand $brand)
    {
        //
        // dd($category);
        return view("admin.brand.show", ["brand" => $brand]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
        // dd($category);
        return view("admin.brand.edit", ["brand" => $brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
        // dd($category);
        $validated = $request->validate([
            "name" => ["required"],
            "description" => ["nullable"]
        ]);
        $brand->update($validated);
        return redirect("/admin/brand")->with(["update" => "brand updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
        $brand->delete();
        return redirect("/admin/brand")->with(["delete" => "brand deleted"]);
        // dd($category);
    }
}
