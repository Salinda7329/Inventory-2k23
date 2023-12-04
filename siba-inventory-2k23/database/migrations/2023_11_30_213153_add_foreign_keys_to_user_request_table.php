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
        Schema::table('user_request', function (Blueprint $table) {
            $table->foreign(['product_id'], 'user_request_ibfk_1')->references(['product_id'])->on('product')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'user_request_ibfk_2')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_request', function (Blueprint $table) {
            $table->dropForeign('user_request_ibfk_1');
            $table->dropForeign('user_request_ibfk_2');
        });
    }
};
