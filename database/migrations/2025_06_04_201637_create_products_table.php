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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->foreignId("brand_id")->constrained();
            $table->foreignId("category_id")->constrained();
            $table->foreignId("warehouse_id")->constrained();
            $table->date("manufactury_date")->nullable();
            $table->date("expiry_date")->nullable();
            $table->string("description")->nullable();
            $table->string("image")->nullable();
            $table->string("username");
            $table->integer("quantity_in_stock");
            $table->decimal("unit_price",8,3);
            $table->decimal("selling_price",8,3);
            $table->dateTime("updated_date")->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
