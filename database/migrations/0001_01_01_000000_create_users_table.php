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
            Schema::create('users', function (Blueprint $table) {
                $table->id()->comment('The unique identifier for the user');
                $table->string('name')->comment('The name of the user');
                $table->string('email')->unique()->comment('The email address of the user');
                $table->timestamp('email_verified_at')->nullable()->comment('The timestamp of the email verification');
                $table->string('password')->comment('The password of the user');
                $table->rememberToken()->comment('The remember token of the user');
                $table->timestamps();
            });

            Schema::create('password_reset_tokens', function (Blueprint $table) {
                $table->string('email')->primary()->comment('The email address associated with the reset token');
                $table->string('token')->comment('The password reset token');
                $table->timestamp('created_at')->nullable()->comment('The timestamp when the token was created');
            });

            Schema::create('sessions', function (Blueprint $table) {
                $table->string('id')->primary()->comment('The unique identifier for the session');
                $table->foreignId('user_id')->nullable()->index()->comment('Foreign key constraint referencing the users table');
                $table->string('ip_address', 45)->nullable()->comment('The IP address of the user');
                $table->text('user_agent')->nullable()->comment('The user agent string from the browser');
                $table->longText('payload')->comment('The session payload');
                $table->integer('last_activity')->index()->comment('The last activity timestamp');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('users');
            Schema::dropIfExists('password_reset_tokens');
            Schema::dropIfExists('sessions');
        }
    };
