<?php

    namespace Database\Factories;

    use App\Models\Book;
    use App\Models\Genre;
    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends Factory<Book>
     */
    class BookFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                'title' => fake()->sentence(2),
                'description' => fake()->text(),
                'price' => fake()->randomFloat(2, 10, 100),
                'stock' => fake()->numberBetween(1, 100),
                'published_at' => fake()->date(),
            ];
        }
    }
