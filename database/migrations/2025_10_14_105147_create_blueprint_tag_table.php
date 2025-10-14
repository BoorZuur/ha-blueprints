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
        Schema::create('blueprint_tag', function (Blueprint $table) {
            $table->foreignId('blueprint_id')->constrained()->cascadeOnDelete()->references('id')->on('blueprints');
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete()->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blueprint_tag');
    }
};
