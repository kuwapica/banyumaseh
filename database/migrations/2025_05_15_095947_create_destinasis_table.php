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
        Schema::create('destinasis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('category')->default('Wisata Alam');
            $table->decimal('rating', 2, 1)->default(0.0);
            $table->decimal('price', 10, 2)->default(0.00);
            $table->string('location');
            $table->boolean('featured')->default(false);
            $table->timestamps();
            
            // Indexes untuk performance
            $table->index('category');
            $table->index('featured');
            $table->index('rating');
            $table->index('price');
            $table->index('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasis');
    }
};