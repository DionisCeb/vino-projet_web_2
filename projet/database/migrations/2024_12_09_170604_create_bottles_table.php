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
        Schema::create('bottles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('saq_code');
            $table->string('country');
            $table->float('saq_price');
            $table->string('saq_url');
            $table->string('image_url');
            $table->string('format');
            $table->integer('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bottles');
    }
};
