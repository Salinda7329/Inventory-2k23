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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('role')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);
            $table->string('last_name')->nullable()->default(null);
            $table->unsignedInteger('epf')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->unsignedInteger('status')->nullable()->default(null);
            $table->unsignedInteger('isactive')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role',
                'title',
                'last_name',
                'epf',
                'phone',
                'status',
                'isactive',
            ]);
        });
    }
};
