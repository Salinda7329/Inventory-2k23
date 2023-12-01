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
        Schema::table('item', function (Blueprint $table) {
            $table->foreign(['product_id'], 'item_ibfk_1')->references(['product_id'])->on('product')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['brand_id'], 'item_ibfk_2')->references(['brand_id'])->on('brand')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item', function (Blueprint $table) {
            $table->dropForeign('item_ibfk_1');
            $table->dropForeign('item_ibfk_2');
        });
    }
};
