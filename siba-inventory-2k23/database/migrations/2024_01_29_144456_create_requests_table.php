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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('item_id_user')->nullable();
            $table->string('item_name')->nullable();
            $table->string('request_quantity')->nullable();
            $table->string('user_remark')->nullable();
            $table->foreignId('request_by')->constrained('users')->nullable()->default(null);
            $table->timestamp('requested_timestamp')->nullable()->default(null);
            $table->boolean('type')->default(1);
            $table->boolean('status')->default(1);
            $table->foreignId('item_id')->constrained('items')->nullable();;
            $table->string('quantity')->nullable();
            $table->string('sm_remark')->nullable();
            $table->foreignId('store_manager')->constrained('users')->nullable()->default(null);
            $table->timestamp('store_manager_timestamp')->nullable()->default(null);
            $table->boolean('isActive')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
