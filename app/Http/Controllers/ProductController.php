<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        // dd($categories);
        return view("admin.product.index", ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $warehouses = Warehouse::all();
        // dd($categories);
        return view("admin.product.create_product", ["categories" => $categories,"brands"=>$brands, "warehouses" => $warehouses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->file("image")->store("product", "public"));
        $validated = $request->validate([
            "name" => ["required"],
            "description" => ["nullable"],
            "brand_id" => ["required"],
            "category_id" => ["required"],
            "warehouse_id" => ["required"],
            "manufactury_date" => ["date","nullable"],
            "expiry_date" => ["date", "nullable"],
            "username" => ["required"],
            "quantity_in_stock" => ["required"],
            "unit_price" => ["required"],
            "selling_price" => ["required"],
            "image" => ["nullable", "max:1048"]
            // "category_id" => ["required"]
            // "user_id" => ["required"]
        ]);
        // $validated["user_id"] = Auth::user()->id;
        // dd($validated);

        if ($request->hasFile("image")) {
            //  dd($validated);
            $validated["image"] = Storage::disk("public")->putFile("product", $request->file("image"));
        }
        //   dd("ok");
        Product::create($validated);
        return redirect("/admin/product")->with(["message" => "product created successfully"]);
        // dd($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        // dd($post->image);
        return view("admin.product.show", ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $warehouses = Warehouse::all();
        // dd($product);
        return view("admin.product.edit", ["product" => $product, "categories" => $categories, "brands" => $brands,"warehouses"=>$warehouses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            "name" => ["required"],
            "description" => ["required"],
            "brand_id" => ["required"],
            "category_id" => ["required"],
            "warehouse_id" => ["required"],
            "manufactury_date" => ["required", "date"],
            "expiry_date" => ["required"],
            "username" => ["required"],
            "quantity_in_stock" => ["required"],
            "unit_price" => ["required"],
            "selling_price" => ["required"],
            "image" => ["nullable", "max:1048"]
            // "category_id" => ["required"]
            // "user_id" => ["required"]
        ]);
        $validated["updated_date"] = now();
        if ($request->hasFile("image")) {
            if ($product->image) {
                Storage::disk("public")->delete($product->image);
            }
            $validated["image"] = Storage::disk("public")->putFile("product", $request->file("image"));
        }
        $product->update($validated);
        return redirect("/admin/product")->with(["update" => "product updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        if ($product->image) {
            Storage::disk("public")->delete($product->image);
        }
        return redirect("/admin/product")->with(["delete" => "product deleted"]);
        // dd($post);
    }
}
