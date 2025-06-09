<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::latest()->get();
        // dd($categories);
        return view("admin.customer.index", ["customers" => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.customer.create_customer");
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
        Customer::create($validated);
        return redirect("/admin/customer")->with(["message" => "customer created successfully"]);
        // dd($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
        // dd($category);
        return view("admin.customer.show", ["customer" => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
        // dd($category);
        return view("admin.customer.edit", ["customer" => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
        // dd($category);
        $validated = $request->validate([
            "name" => ["required"],
            "email" => ["email","required"],
            "phone" => ["required","max:10"],
            "address" => ["required"],
            "gender" => ["required"]
        ]);
        $customer->update($validated);
        return redirect("/admin/customer")->with(["update" => "customer update"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
        $customer->delete();
        return redirect("/admin/customer")->with(["delete" => "customer deleted"]);
        // dd($category);
    }
}
