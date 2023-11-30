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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('epf');
            $table->foreignId('dept_id')->references('dept_id')->on('departments');
            $table->unsignedInteger('role')->nullable()->default(null);
            $table->string('name');//first_name
            $table->string('last_name');
            $table->string('phone')->nullable()->default(null);
            $table->string('password');
            $table->unsignedInteger('status')->nullable()->default(null);
            $table->unsignedInteger('isactive')->nullable()->default(null);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
