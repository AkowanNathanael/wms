<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            // $table->string("product_names");
            $table->foreignId("customer_id")->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->decimal("total_price");
            $table->string("invoice_id");
            $table->string("invoice")->nullable();
            $table->enum("payment_type",["card","cheque","cash","momo"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
