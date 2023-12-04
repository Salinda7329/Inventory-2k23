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
        Schema::create('item', function (Blueprint $table) {
            $table->id('item_id');
            $table->foreignId('product_id')->nullable()->default(null);
            $table->foreignId('brand_id')->nullable()->default(null);
            $table->string('item_name')->nullable()->default(null);
            $table->string('condition')->nullable()->default(null);
            $table->string('condition_updated_by')->nullable()->default(null);
            $table->timestamp('conditon_updated_timestamp')->nullable()->default(null);
            $table->string('created_by')->nullable()->default(null);
            $table->string('lower_limit')->nullable()->default(null);
            $table->timestamp('created_time_stamp')->nullable()->default(null);
            $table->unsignedInteger('isactive')->nullable()->default(null);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
