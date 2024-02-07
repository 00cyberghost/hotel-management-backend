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
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('role');
            $table->text('job_description')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
