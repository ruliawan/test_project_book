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
        Schema::create('book', function (Blueprint $table) {
            $table->bigIncrements('book_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('book_category_id');
            $table->string('title');
            $table->timestamps();

            $table->foreign('author_id')->references('author_id')->on('author');
            $table->foreign('book_category_id')->references('book_category_id')->on('book_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
