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
        Schema::table('issued_return_item_history', function (Blueprint $table) {
            $table->foreign(['request_id'], 'issued_return_item_history_ibfk_1')->references(['request_id'])->on('user_request')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issued_return_item_history', function (Blueprint $table) {
            $table->dropForeign('issued_return_item_history_ibfk_1');
        });
    }
};
