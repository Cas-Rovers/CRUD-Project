<?php

    namespace Database\Factories;

    use App\Models\Author;
    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends Factory<Author>
     */
    class AuthorFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                'first_name' => fake(config('app.locale'))->firstName(),
                'last_name' => fake(config('app.locale'))->lastName(),
                'biography' => fake(config('app.locale'))->text(),
            ];
        }
    }
