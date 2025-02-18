<?php

    namespace Database\Seeders;

    // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use App\Models\Author;
    use App\Models\Book;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\DB;

    class AuthorBookTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $authorIds = Author::pluck('id')->toArray();
            $books = Book::all();
            $pivotData = [];

            foreach($books as $book) {
                $numberOfAuthors = fake()->boolean(70) ? 1 : fake()->numberBetween(2, 4);

                $authors = array_rand(array_flip($authorIds), $numberOfAuthors);

                if(!is_array($authors)) {
                    $authors = [$authors];
                }

                foreach($authors as $index => $authorId) {
                    $pivotData[] = [
                        'book_id' => $book->id,
                        'author_id' => $authorId,
                        'contribution_type' => $index === 0 ? 'Primary Author' : fake()->randomElement([
                            'Co-Author', 'Editor', 'Translator', 'Illustrator', 'Other',
                        ]),
                        'royalty_percentage' => fake()->randomFloat(2, 10, 50),
                        'contract_signed_at' => Carbon::now()->subDays(fake()->numberBetween(10, 365)),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            DB::table('author_book')->insert($pivotData);
        }
    }
