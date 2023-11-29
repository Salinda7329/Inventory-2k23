<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->char('AccNo', 6)->primary(); // Use AccNo as the primary key
            $table->char('Mid', 4);
            $table->unsignedBigInteger('customer_id')->length(20);
            $table->unsignedInteger('unit_price'); // Non-negative integer for unit_price
            $table->unsignedInteger('account_status');
            $table->unsignedBigInteger('created_by')->length(20);
            $table->timestamps();
            $table->unsignedInteger('isactive');
            // Add foreign key constraint
            $table->foreign('customer_id')->references('id')->on('users');

        });

        // Set the starting value for AccNo
        DB::statement('ALTER TABLE accounts AUTO_INCREMENT=000001');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
