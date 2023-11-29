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
        Schema::create('bills', function (Blueprint $table) {
            $table->char('bill_id', 4)->primary();
            $table->char('AccNo', 6);
            $table->timestamp('start_time')->nullable()->default(null)->useCurrent(false);
            $table->timestamp('end_time')->nullable()->default(null)->useCurrent(false);
            $table->decimal('units', 8, 2)->nullable()->default(null);
            $table->decimal('fee', 8, 2)->nullable()->default(null);
            $table->unsignedInteger('bill_settled')->nullable();
            $table->timestamps();
            $table->unsignedInteger('isactive')->nullable();
            // Add foreign key constraint
            $table->foreign('AccNo')->references('AccNo')->on('accounts');
        });
        // Set the starting value for meter_id
        DB::statement('ALTER TABLE readings AUTO_INCREMENT=1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
