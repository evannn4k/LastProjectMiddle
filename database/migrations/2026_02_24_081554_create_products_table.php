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
            $table->foreignId("game_id")->constrained("games")->onDelete("cascade");
            $table->string("name");
            $table->enum("type", ["diamond", "skin", "weekly_membership", "monthly_membership", "weekly_diamond_pass"]);
            $table->integer("amount");
            $table->integer("price");
            $table->integer("stock");
            $table->boolean("is_active")->default(true);
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
