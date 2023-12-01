<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty', function (Blueprint $table) {
            $table->bigIncrements('warranty_id');
            $table->unsignedBigInteger('item_id')->nullable()->index('item_id');
            $table->string('description')->nullable();
            $table->string('quantity')->nullable();
            $table->string('document_link')->nullable();
            $table->string('claim_status')->nullable();
            $table->timestamp('created_time')->nullable();
            $table->string('finance_head_approval')->nullable();
            $table->timestamp('finance_head_time')->nullable();
            $table->unsignedInteger('isactive')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warranty');
    }
};
