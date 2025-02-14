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
            Schema::create('authors', function (Blueprint $table) {
                $table->id()->comment('Unique identifier for the author');
                $table->string('first_name')->comment('The first name of the author');
                $table->string('last_name')->comment('The last name of the author');
                $table->text('biography')->comment('The biography of the author');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('authors');
        }
    };
