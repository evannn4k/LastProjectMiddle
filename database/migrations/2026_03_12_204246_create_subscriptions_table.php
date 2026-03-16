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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string("id_bill");
            $table->string("invoice_number");
            $table->string("link_url");
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            $table->foreignId("membership_id")->constrained("memberships")->onDelete("cascade");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("status")->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
