<?php

    namespace Database\Seeders;

    // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
            $this->call([
                UsersTableSeeder::class,
                GenresTableSeeder::class,
                BooksTableSeeder::class,
                AuthorsTableSeeder::class,
                AuthorBookTableSeeder::class,
                BookGenreTableSeeder::class,
            ]);
        }
    }
