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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id')->constrained()->onDelete('cascade');
            $table->foreignid('member_id')->nullable()->constrained()->nullOnUpdate();
            $table->unsignedInteger('total');
            $table->unsignedInteger('discount')->default('0');
            $table->unsignedInteger('final_amount');
            $table->unsignedInteger('cash_given');
            $table->unsignedInteger('change');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
