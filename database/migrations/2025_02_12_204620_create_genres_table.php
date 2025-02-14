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
            Schema::create('genres', function (Blueprint $table) {
                $table->id()->comment('Unique identifier for the genre');
                $table->string('name')->comment('The name of the genre');
                $table->text('description')->comment('The description of the genre');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('genres');
        }
    };
