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
        Schema::create('payments', function (Blueprint $table) {
            $table->char('payment_id', 6)->primary();
            $table->bigInteger('paid_by')->unsigned()->length(20);
            $table->char('bill_id', 4);
            $table->decimal('amount', 8, 2)->nullable()->default(null);
            $table->timestamps();
            $table->unsignedInteger('isactive')->nullable();
            // Add foreign key constraint
            $table->foreign('paid_by')->references('id')->on('users');
            $table->foreign('bill_id')->references('bill_id')->on('bills');


        });
        // Set the starting value for meter_id
        DB::statement('ALTER TABLE readings AUTO_INCREMENT=1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
