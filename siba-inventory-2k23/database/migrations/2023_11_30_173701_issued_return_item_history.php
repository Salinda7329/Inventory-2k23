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
        Schema::create('issued_return_item_history', function (Blueprint $table) {
            $table->id('irih_id');
            $table->foreignId('request_id');
            $table->unsignedInteger('issue_or_return')->nullable()->default(null);
            $table->string('issue_remark')->nullable()->default(null);
            $table->string('issued_by')->nullable()->default(null);
            $table->timestamp('issued_time_stamp')->nullable()->default(null);
            $table->string('return_remark')->nullable()->default(null);
            $table->string('received_by')->nullable()->default(null);
            $table->timestamp('returned_time_stamp')->nullable()->default(null);
            $table->unsignedInteger('isactive')->nullable()->default(null);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issued_return_item_history');
    }
};
