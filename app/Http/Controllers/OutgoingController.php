<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOutgoingRequest;
use App\Http\Requests\UpdateOutgoingRequest;
use App\Models\Customer;
use App\Models\Outgoing;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class OutgoingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $outgoings = Outgoing::all();
        return view("admin.outgoing.index", ["outgoings" => $outgoings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Product::all();
        $customers = Customer::all();
        return view("admin.outgoing.create_outgoing", ["products" => $products, "customers" => $customers]);
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
            "customer_id" => ["required"],
            "total" => ["required"]

        ]);
        // dd($validated); 
        $outgoings = Outgoing::create($validated);
        // Update the product's stock
        $product = Product::find($validated['product_id']);
        if ($product) {
            $product->quantity_in_stock -= $validated['quantity'];
            $product->save();
        } else {
            return redirect()->back()->withErrors(['product_id' => 'Selected product does not exist.']);
        }
        return redirect("admin/outgoing/create")->with("success", "outgoing record created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Outgoing $outgoing)
    {
        //
        return view("admin.outgoing.show", ["outgoing" => $outgoing]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outgoing $outgoing)
    {
        //
        $products = Product::all();
        $customers = Customer::all();
        return view("admin.outgoing.edit", [
            "outgoing" => $outgoing,
            "products" => $products,
            "customers" => $customers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outgoing $outgoing)
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
        $outgoing->update($validated);
        return redirect("admin/outgoing")->with("success", "outgoing record updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outgoing $outgoing)
    {
        //
        $outgoing->delete();
        return redirect("admin/outgoing")->with("success", "Incoming record deleted successfully");
    }
    public function receiveGoods(Product $product, Outgoing $outgoing) {
        // Validate the request data
        dd($product);
        dd($outgoing);
        $product->quantity_in_stock += $outgoing->quantity_received;
        $product->save();
        // Validate the quantity received
        // Update the outgoing record with the received quantity
        $outgoing->quantity_received = $validated['quantity_received'];
        $outgoing->save();
        $outgoing->delete();
        return redirect("admin/outgoing")->with('success', 'Goods received successfully.');
    }
}
