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
        Schema::create('meters', function (Blueprint $table) {
            $table->char('meter_id', 4)->primary();
            $table->bigInteger('created_by')->unsigned()->length(20);
            $table->unsignedInteger('status');
            $table->decimal('latitude', 10, 7); // 10 total digits, 7 decimal places
            $table->decimal('longitude', 10, 7); // 10 total digits, 7 decimal places
            $table->timestamps();
            $table->unsignedInteger('isactive');
            // Add foreign key constraint
            $table->foreign('created_by')->references('id')->on('users');
        });

        // Set the starting value for meter_id
        DB::statement('ALTER TABLE meters AUTO_INCREMENT=1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meters');
    }
};
