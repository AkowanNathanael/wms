<?php

namespace App\Http\Controllers;

use Artisan;
use App\Models\Sale;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Warehouse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Log;
use Spatie\Browsershot\Browsershot;
use App\Http\Requests\StoreSaleRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateSaleRequest;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $sales=Sale::latest()->get();
        // dd($categories);
        return view("admin.sale.index", ["sales"=>$sales]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::latest()->get();
        $customers = Customer::all();
        // dd($categories);
        return view("admin.sale.create_sale", ["customers" => $customers, "products" => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->file("image")->store("product", "public"));
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
        return view("admin.product.edit", ["product" => $product, "categories" => $categories, "brands" => $brands, "warehouses" => $warehouses]);
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
        // $validated["user_id"] = Auth::user()->id;
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

    public function invoice(Request $request)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::find($request->customer_id);
            if (!$customer) {
                return back()->with('error', 'Customer not found!');
            }

            $cart = json_decode($request->cart, true);
            if (empty($cart)) {
                return back()->with('error', 'Cart is empty!');
            }

            // Verify stock and lock records
            foreach ($cart as $item) {
                $product = Product::lockForUpdate()->find($item['id']);
                if (!$product || $product->quantity_in_stock < $item['qty']) {
                    DB::rollBack();
                    return back()->with('error', "Insufficient stock for product: {$product->name}");
                }
            }

            // Generate invoice details
            $invoiceNumber = 'INV-' . date('Ymd') . '-' . uniqid();
            $filename = 'invoice_' . $invoiceNumber . '.pdf';
            $invoice_id = date('Ymd').rand(1000, 9999);

            // Ensure directory exists
            $publicPath = public_path('storage/invoices');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0755, true);
            }

            // Set file paths
            $storagePath = storage_path('app/public/invoices/' . $filename);
            $publicFilePath = public_path('storage/invoices/' . $filename);

            // Generate and save PDF
            $pdf = Pdf::view('pdf.invoice', [
                'customer' => $customer,
                'cart' => $cart,
                'invoice_id' => $invoice_id,
                'invoiceNumber' => $invoiceNumber
            ]);
            $pdf->save($storagePath);
            $pdf->save($publicFilePath);

            // Calculate total
            $totalPrice = array_reduce($cart, function($carry, $item) {
                return $carry + ($item['price'] * $item['qty']);
            }, 0);

            // Create sale record
            $sale = Sale::create([
                'customer_id' => $request->customer_id,
                'total_price' => $totalPrice,
                'invoice_id' => $invoice_id,
                'invoice' => 'storage/invoices/' . $filename,
                'payment_type' => $request->payment_type
            ]);

            // Update stock - SINGLE DEDUCTION PER PRODUCT
            foreach ($cart as $item) {
                $product = Product::find($item['id']);
                $currentStock = $product->quantity_in_stock;
                $product->update([
                    'quantity_in_stock' => $currentStock - $item['qty']
                ]);
            }

            DB::commit();
            return response()->download($publicFilePath)->deleteFileAfterSend(false);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Sale Error: ' . $e->getMessage());
            return back()->with('error', 'An error occurred during the sale process.');
        }
    }
}
