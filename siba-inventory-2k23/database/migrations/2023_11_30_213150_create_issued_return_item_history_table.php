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
        Schema::create('issued_return_item_history', function (Blueprint $table) {
            $table->bigIncrements('irih_id');
            $table->unsignedBigInteger('request_id')->index('request_id');
            $table->unsignedInteger('issue_or_return')->nullable();
            $table->string('issue_remark')->nullable();
            $table->string('issued_by')->nullable();
            $table->timestamp('issued_time_stamp')->nullable();
            $table->string('return_remark')->nullable();
            $table->string('received_by')->nullable();
            $table->timestamp('returned_time_stamp')->nullable();
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
        Schema::dropIfExists('issued_return_item_history');
    }
};
