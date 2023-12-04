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
        Schema::create('user_request', function (Blueprint $table) {
            $table->bigIncrements('request_id');
            $table->unsignedBigInteger('product_id')->nullable()->index('product_id');
            $table->string('quantity');
            $table->unsignedBigInteger('user_id')->nullable()->index('user_id');
            $table->timestamp('requested_time')->nullable();
            $table->string('department_head_approval')->nullable();
            $table->string('department_head_id')->nullable();
            $table->timestamp('department_head_time')->nullable();
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
        Schema::dropIfExists('user_request');
    }
};
