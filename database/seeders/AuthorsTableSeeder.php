<?php

    namespace Database\Seeders;

    //use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use App\Models\Author;
    use Illuminate\Database\Seeder;

    class AuthorsTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            Author::factory(200)->create();
        }
    }
