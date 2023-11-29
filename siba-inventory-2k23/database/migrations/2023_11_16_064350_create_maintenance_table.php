<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id('mid');
            $table->bigInteger('writer_id')->unsigned()->length(20);
            $table->string('customer');
            $table->string('matter');
            $table->unsignedInteger('matter_status');
            $table->timestamps();
            $table->unsignedInteger('isactive');
            // Add foreign key constraint
            $table->foreign('writer_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance');

    }
};
