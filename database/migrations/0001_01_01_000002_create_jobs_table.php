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
            Schema::create('jobs', function (Blueprint $table) {
                $table->id()->comment('The unique identifier of the job');
                $table->string('queue')->index()->comment('The name of the queue the job belongs to');
                $table->longText('payload')->comment('The payload of the job');
                $table->unsignedTinyInteger('attempts')->comment('The number of attempts the job has been attempted');
                $table->unsignedInteger('reserved_at')->nullable()->comment('The timestamp the job was reserved at');
                $table->unsignedInteger('available_at')->comment('The timestamp when the job becomes available');
                $table->unsignedInteger('created_at')->comment('The timestamp the job was created');
            });

            Schema::create('job_batches', function (Blueprint $table) {
                $table->string('id')->primary()->comment('The unique identifier of the job batch');
                $table->string('name')->comment('The name of the job batch');
                $table->integer('total_jobs')->comment('The total jobs in the batch');
                $table->integer('pending_jobs')->comment('The number of pending jobs in the batch');
                $table->integer('failed_jobs')->comment('The number of failed jobs in the batch');
                $table->longText('failed_job_ids')->comment('The IDs of the failed jobs in the batch');
                $table->mediumText('options')->nullable()->comment('The options for the job batch');
                $table->integer('cancelled_at')->nullable()->comment('The timestamp when the job batch was cancelled');
                $table->integer('created_at')->comment('The timestamp when the job batch was created');
                $table->integer('finished_at')->nullable()->comment('The timestamp when the job batch was finished');
            });

            Schema::create('failed_jobs', function (Blueprint $table) {
                $table->id()->comment('Unique identifier for the failed job');
                $table->string('uuid')->unique()->comment('The unique UUID for the failed job');
                $table->text('connection')->comment('The connection name the job was attempted on');
                $table->text('queue')->comment('The queue name the job was attempted on');
                $table->longText('payload')->comment('The payload data for the failed job');
                $table->longText('exception')->comment('The exception message or stack trace for the failed job');
                $table->timestamp('failed_at')->useCurrent()->comment('The timestamp when the job failed');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('jobs');
            Schema::dropIfExists('job_batches');
            Schema::dropIfExists('failed_jobs');
        }
    };
