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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('image')->nullable();
    
            // Foreign key columns
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('categoryId');
    
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
