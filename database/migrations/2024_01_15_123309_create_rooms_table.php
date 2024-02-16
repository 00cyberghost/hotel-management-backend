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
        Schema::create('rooms', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('number');
            $table->string('type');
            $table->string('capacity');
            $table->string('bed');
            $table->string('bathroom');
            $table->string('kitchen');
            $table->string('size');
            $table->text('description');
            $table->bigInteger('price');
            $table->bigInteger('tax');
            $table->string('status');
            $table->json('features')->nullable();
            $table->string('created_by');
            $table->string('modified_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
