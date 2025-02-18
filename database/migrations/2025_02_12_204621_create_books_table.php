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
            Schema::create('books', function(Blueprint $table) {
                $table->id()->comment('Unique identifier for the book');
                $table->string('title')->comment('The title of the book');
                $table->text('description')->comment('The description of the book');
                $table->decimal('price')->comment('The price of the book');
                $table->integer('stock')->comment('The stock of the book');
                $table->date('published_at')->comment('The date the book was published');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('books');
        }
    };
