<?php

    namespace Database\Seeders;

    //use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use App\Models\Book;
    use Illuminate\Database\Seeder;

    class BooksTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            Book::factory(200)->create();
        }
    }
