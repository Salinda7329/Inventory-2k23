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
        Schema::create('brand', function (Blueprint $table) {
            $table->id('brand_id');
            $table->string('brand_name')->nullable()->default(null);
            $table->string('created_by')->nullable()->default(null);
            $table->timestamps();
            $table->unsignedInteger('isactive')->nullable()->default(null);
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand');
    }
};
