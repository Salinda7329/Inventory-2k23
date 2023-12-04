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
        Schema::table('purchasing_list', function (Blueprint $table) {
            $table->foreign(['product_id'], 'purchasing_list_ibfk_1')->references(['product_id'])->on('product')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchasing_list', function (Blueprint $table) {
            $table->dropForeign('purchasing_list_ibfk_1');
        });
    }
};
