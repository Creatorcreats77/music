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
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category')->OnDelete('cascade');
            $table->unsignedBigInteger('artist_id');
            $table->foreign('artist_id')->references('id')->on('artist')->OnDelete('cascade');
            $table->unsignedBigInteger('album_id');
            $table->foreign('album_id')->references('id')->on('album')->nullOnDelete();
            $table->string('name');
            $table->string('audio')->nullable();
            $table->boolean('viewed')->default(0);
            $table->boolean('downloaded')->default(0);
            $table->boolean('favorites')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music');
    }
};
