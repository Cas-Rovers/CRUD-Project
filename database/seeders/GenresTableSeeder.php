<?php

    namespace Database\Seeders;

    //use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use App\Models\Genre;
    use Illuminate\Database\Seeder;

    class GenresTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $genres = [
                'Action', 'Comedy', 'Drama', 'Horror', 'Sci-Fi', 'Romance',
                'Thriller', 'Fantasy', 'Mystery', 'Documentary'
            ];

            foreach ($genres as $genre) {
                Genre::factory()->create(['name' => $genre]);
            }
        }
    }
