<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('book_genre', function (Blueprint $table) {
                $table->id()->comment('Unique identifier for the book genre');
                $table->foreignId('book_id')->constrained('books')->comment('Foreign key constraint referencing the books table');
                $table->foreignId('genre_id')->constrained('genres')->comment('Foreign key constraint referencing the genres table');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('book_genre');
        }
    };
