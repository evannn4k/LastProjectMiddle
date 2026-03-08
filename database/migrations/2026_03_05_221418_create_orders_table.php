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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("id_bill");
            $table->string("title");
            $table->string("link_url");
            $table->foreignId("user_id")->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId("product_id")->constrained('products')->onDelete('cascade');
            $table->string("invoice_number")->unique();
            $table->string("id_account");
            $table->string("quantity");
            $table->string("amount");
            $table->string("final_price");
            $table->string("status")->default("pending");
            $table->string("no")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
