<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    /** @use HasFactory<\Database\Factories\SaleFactory> */
    use HasFactory;
   
    // $table->string("total_price");
    // $table->string("invoice")->nullable();
    // $table->enum("payment_type",["card","cheque","cash","momo"]);
    // $table->timestamps();
    protected $fillable=[
        "customer_id",
        "invoice_id",
        "total_price",
        "invoice",
        "payment_type"

    ];
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
