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
        Schema::create('issued_return_item_hisotory', function (Blueprint $table) {
            $table->id('irih_id');
            $table->foreignId('request_id')->references('request_id')->on('requests');
            $table->unsignedInteger('issue_or_return')->nullable()->default(null);
            $table->string('issue_remark');
            $table->string('issued_by');
            $table->timestamps('issued_time_stamp');
            $table->string('return_remark');
            $table->string('received_by');
            $table->timestamps('returned_time_stamp');
            $table->unsignedInteger('isactive')->nullable()->default(null);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issued_return_item_hisotory');
    }
};
