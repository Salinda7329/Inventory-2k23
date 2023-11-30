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
            $table->string('issued_by');
            $table->string('issue_remark');
            $table->string('issue_remark');


            $table->string('dept_name');
            $table->timestamps();
            $table->unsignedInteger('status')->nullable()->default(null);
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
