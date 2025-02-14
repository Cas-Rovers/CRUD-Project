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
            Schema::create('cache', function (Blueprint $table) {
                $table->string('key')->primary()->comment('The unique identifier for the cache');
                $table->mediumText('value')->comment('The value stored in the cache');
                $table->integer('expiration')->comment('The expiration time of the cache in seconds');
            });

            Schema::create('cache_locks', function (Blueprint $table) {
                $table->string('key')->primary()->comment('The unique identifier for the cache lock');
                $table->string('owner')->comment('The owner for the lock');
                $table->integer('expiration')->comment('The expiration time of the lock in seconds');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('cache');
            Schema::dropIfExists('cache_locks');
        }
    };
