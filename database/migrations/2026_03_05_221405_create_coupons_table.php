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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("code");
            $table->enum("discount_type", ["percent", "fixed"]);
            $table->integer("discount_value");
            $table->integer("max_discount")->nullable();
            $table->string("usage_limit");
            $table->string("used_count");
            $table->date("start_date");
            $table->date("end_date");
            $table->boolean("is_active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
