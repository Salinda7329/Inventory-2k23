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
        Schema::create('user_request', function (Blueprint $table) {
            $table->id('request_id');
            $table->foreignId('product_id')->nullable();
            $table->string('quantity');
            $table->foreignId('user_id')->nullable();
            $table->timestamp('requested_time')->nullable()->default(null);
            $table->string('department_head_approval')->nullable()->default(null);
            $table->string('department_head_id')->nullable()->default(null);
            $table->timestamp('department_head_time')->nullable()->default(null);
            $table->unsignedInteger('isactive')->nullable()->default(null);
            });
        }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_request');
    }
};
