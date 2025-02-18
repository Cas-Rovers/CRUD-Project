<?php

    namespace App\Http\Controllers\Frontend;

    use App\Http\Controllers\Controller;
    use App\Models\Book;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;

    //use Illuminate\Http\Request;

    class BookController extends Controller
    {
        /**
         * Show a list of books.
         *
         * @return Factory|Application|View
         */
        public function index(): Factory|Application|View
        {
            $books = Book::with('genres', 'authors')->paginate(24);

            return view('frontend.pages.books.index', [
                'books' => $books,
            ]);
        }

        public function show(string $id): Factory|Application|View
        {
            $book = Book::with('genres', 'authors')->findOrFail($id);

            return view('frontend.pages.books.show', [
                'book' => $book,
            ]);
        }
    }
