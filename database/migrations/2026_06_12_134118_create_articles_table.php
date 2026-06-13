<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $schema) {
            $schema->id();
            $schema->foreignId('category_id')->constrained()->onDelete('cascade');
            $schema->foreignId('writer_id')->constrained()->onDelete('cascade');
            $schema->string('title');
            $schema->text('content');
            $schema->string('image')->nullable();
            $schema->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};