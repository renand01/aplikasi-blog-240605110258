<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $schema) {
            $schema->id();
            $schema->string('name');
            $schema->text('description')->nullable();
            $schema->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};