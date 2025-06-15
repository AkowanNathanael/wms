<?php

namespace App\Http\Controllers;

use App\Models\Incoming;
use App\Http\Requests\StoreIncomingRequest;
use App\Http\Requests\UpdateIncomingRequest;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class IncomingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $incomings = Incoming::where("status", 0)->get();
        return view("admin.incoming.index", ["incomings" => $incomings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Product::all();
        $suppliers = Supplier::all();
        return view("admin.incoming.create_incoming", ["products" => $products, "suppliers" => $suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            "product_id" => ["integer", "required"],
            "quantity" => [
                "required",
                "numeric"              
            ],
            "price" => ["required"],
            "supplier_id" => ["required"],
            "total" => ["required"]

        ]);
        // dd($validated); 
        $incoming = Incoming::create($validated);
        return redirect("admin/incoming")->with("success", "Incoming record created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Incoming $incoming)
    {
        //
        return view("admin.incoming.show", ["incoming" => $incoming]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incoming $incoming)
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view("admin.incoming.edit", [
            "incoming" => $incoming,
            "products" => $products,
            "suppliers" => $suppliers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incoming $incoming)
    {
        //
        $validated = $request->validate([
            "product_id" => ["integer", "required"],
            "quantity" => [
                "required",
                "numeric",
                function ($attribute, $value, $fail) use ($request) {
                    $product = \App\Models\Product::find($request->product_id);
                    if (!$product) {
                        $fail('Selected product does not exist.');
                    } elseif ($value > $product->quantity_in_stock) {
                        $fail('Requested quantity exceeds available stock (' . $product->quantity_in_stock . ').');
                    }
                }
            ],
            "price" => ["required"],
            "supplier_id" => ["required"],
            "total" => ["required"]
        ]);
        $incoming->update($validated);
        return redirect("admin/incoming")->with("success", "Incoming record updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incoming $incoming)
    {
        //
        $incoming->delete();
        return redirect("admin/incoming")->with("success", "Incoming record deleted successfully");
    }

    public function receiveGoods(Product $product, Incoming $incoming) {
    // dd($product);
        // dd($incoming);
        $product->quantity_in_stock += $incoming->quantity;
        $product->save();
        $incoming->status = 1; // Mark as received
        $incoming->save();
        return redirect("admin/incoming")->with("success", "Goods received successfully");
         
    }
    public function processGoods() {
        $incomings = Incoming::where("status", 1)->get();
        return view("admin.incoming.received_goods", ["incomings" => $incomings]);
    }

}
