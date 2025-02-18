<?php

    namespace Database\Seeders;

    //use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use App\Models\Book;
    use App\Models\Genre;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class BookGenreTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $genresIds = Genre::pluck('id')->toArray();

            $books = Book::all();

            $pivotData = [];

            foreach($books as $book) {
                $randomGenreId = $genresIds[array_rand($genresIds)];

                $pivotData[] = [
                    'book_id' => $book->id,
                    'genre_id' => $randomGenreId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('book_genre')->insert($pivotData);
        }
    }
