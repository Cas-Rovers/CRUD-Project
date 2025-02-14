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
            Schema::create('book_author', function (Blueprint $table) {
                $table->id()->comment('Unique identifier for the book author');
                $table->foreignId('book_id')->constrained('books',
                    'id')->cascadeOnDelete()->comment('Foreign key constraint referencing the books table');
                $table->foreignId('author_id')->constrained('authors',
                    'id')->comment('Foreign key constraint referencing the authors table');
                $table->enum('contribution_type', [
                    'Primary Author', 'Co-Author', 'Editor', 'Translator', 'Illustrator', 'Other'
                ])->comment('The type of contribution the author has made to the book');
                $table->decimal('royalty_percentage')->comment('Percentage of book sales that the author earns');
                $table->date('contract_signed_at')->comment('Date when the contract between author and publisher was signed');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('book_author');
        }
    };
