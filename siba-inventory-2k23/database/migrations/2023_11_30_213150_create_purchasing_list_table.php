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
        Schema::create('purchasing_list', function (Blueprint $table) {
            $table->bigIncrements('list_id');
            $table->string('list_no')->nullable();
            $table->unsignedBigInteger('product_id')->nullable()->index('product_id');
            $table->string('quantity')->nullable();
            $table->string('create_by')->nullable();
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
        Schema::dropIfExists('purchasing_list');
    }
};
