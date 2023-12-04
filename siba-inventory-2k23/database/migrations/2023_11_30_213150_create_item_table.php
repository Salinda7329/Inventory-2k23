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
        Schema::create('item', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->unsignedBigInteger('product_id')->nullable()->index('product_id');
            $table->unsignedBigInteger('brand_id')->nullable()->index('brand_id');
            $table->string('item_name')->nullable();
            $table->string('condition')->nullable();
            $table->string('condition_updated_by')->nullable();
            $table->timestamp('conditon_updated_timestamp')->nullable();
            $table->string('created_by')->nullable();
            $table->string('lower_limit')->nullable();
            $table->timestamp('created_time_stamp')->nullable();
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
        Schema::dropIfExists('item');
    }
};
