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
        Schema::table('warranty', function (Blueprint $table) {
            $table->foreign(['item_id'], 'warranty_ibfk_1')->references(['item_id'])->on('item')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('warranty', function (Blueprint $table) {
            $table->dropForeign('warranty_ibfk_1');
        });
    }
};
