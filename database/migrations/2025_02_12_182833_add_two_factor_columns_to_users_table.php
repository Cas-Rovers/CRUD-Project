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
            Schema::table('users', function (Blueprint $table) {
                $table->text('two_factor_secret')
                    ->after('password')
                    ->nullable()->comment('The two-factor secret of the user');

                $table->text('two_factor_recovery_codes')
                    ->after('two_factor_secret')
                    ->nullable()->comment('The two-factor recovery codes of the user');

                $table->timestamp('two_factor_confirmed_at')
                    ->after('two_factor_recovery_codes')
                    ->nullable()->comment('The two-factor confirmed at of the user');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn([
                    'two_factor_secret',
                    'two_factor_recovery_codes',
                    'two_factor_confirmed_at',
                ]);
            });
        }
    };
