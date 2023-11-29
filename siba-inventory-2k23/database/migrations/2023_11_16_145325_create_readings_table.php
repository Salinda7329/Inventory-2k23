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
        Schema::create('readings', function (Blueprint $table) {
            $table->char('rid', 4)->primary();
            $table->char('meter_id', 4);
            $table->string('reading', 6)->nullable()->default('000000');
            $table->timestamps();
            $table->unsignedInteger('isactive');
            // Add foreign key constraint
            $table->foreign('meter_id')->references('meter_id')->on('meters');

        });

        // Set the starting value for meter_id
         DB::statement('ALTER TABLE readings AUTO_INCREMENT=1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('readings');
    }
};
