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
        Schema::create('warranty', function (Blueprint $table) {
            $table->id('warranty_id');
            $table->foreignId('item_id')->nullable();
            $table->string('description')->nullable()->default(null);
            $table->string('quantity')->nullable()->default(null);
            $table->string('document_link')->nullable()->default(null);
            $table->string('claim_status')->nullable()->default(null);
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
        Schema::dropIfExists('warranty');
    }
};
