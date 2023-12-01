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
    Schema::create('purchasing_list', function (Blueprint $table) {
            $table->id('list_id');
            $table->string('list_no')->nullable()->default(null);
            $table->foreignId('product_id')->nullable();
            $table->string('quantity')->nullable()->default(null);
            $table->string('create_by')->nullable()->default(null);
            $table->timestamp('created_time')->nullable()->default(null);
            $table->string('finance_head_approval')->nullable()->default(null);
            $table->timestamp('finance_head_time')->nullable()->default(null);
            $table->unsignedInteger('isactive')->nullable()->default(null);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasing_list');
    }
};
