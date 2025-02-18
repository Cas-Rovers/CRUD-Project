<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Author;
    use App\Models\Book;
    use App\Models\Genre;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;

    class BookController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Factory|Application|View
         */
        public function index(): Factory|Application|View
        {
            $books = Book::with('genres:name', 'authors:first_name,last_name')->paginate(15);

            return view('admin.pages.books.index', [
                'books' => $books,
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Factory|Application|View
         */
        public function create(): Factory|Application|View
        {
            $genres = Genre::orderBy('name')->get(['name', 'id']);
            $authors = Author::orderBy('last_name')->get(['first_name', 'last_name', 'id']);

            return view('admin.pages.books.create', [
                'genres' => $genres,
                'authors' => $authors,
            ]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param Request $request
         *
         * @return RedirectResponse
         */
        public function store(Request $request): RedirectResponse
        {
            $validator = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'price' => ['required', 'numeric', 'min:0'],
                'stock' => ['required', 'integer', 'min:0'],
                'published_at' => ['required', 'date'],
                'genre' => ['required', 'string', 'exists:genres,id'],
                'authors' => ['required', 'array'],
                'authors.*.id' => ['required_with:authors', 'exists:authors,id'],
                'authors.*.contribution_type' => ['required_with:authors', 'string', 'in:Primary Author,Co-Author,Editor,Translator,Illustrator,Other'],
                'authors.*.royalty_percentage' => ['required_with:authors', 'numeric', 'min:0', 'max:100'],
                'authors.*.contract_signed_at' => ['required_with:authors', 'date'],
            ]);

            if(!$validator) {
                return redirect()->back()->with('errors', __('admin.books.exceptions.validation_failed'));
            }

            $book = Book::create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'published_at' => $request->published_at,
            ]);

            $book->genres()->attach($request->genre);

            $pivotData = [];

            foreach($request->authors as $author) {
                $pivotData[$author['id']] = [
                    'contribution_type' => $author['contribution_type'],
                    'royalty_percentage' => $author['royalty_percentage'],
                    'contract_signed_at' => $author['contract_signed_at'],
                ];
            }

            $book->authors()->attach($pivotData);

            return redirect()->route('admin.books.index')->with('success', __('admin.books.messages.book_created'));
        }

        /**
         * Display the specified resource.
         *
         * @param string $id
         *
         * @return Factory|Application|View
         */
        public function show(string $id): Factory|Application|View
        {
            $book = Book::with('genres', 'authors')->findOrFail($id);

            return view('admin.pages.books.show', [
                'book' => $book,
            ]);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param string $id
         *
         * @return Factory|Application|View
         */
        public function edit(string $id): Factory|Application|View
        {
            $book = Book::with('genres', 'authors')->findOrFail($id);
            $genres = Genre::orderBy('name')->get(['name', 'id']);
            $authors = Author::orderBy('last_name')->get(['first_name', 'last_name', 'id']);

            return view('admin.pages.books.edit', [
                'book' => $book,
                'genres' => $genres,
                'authors' => $authors,
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param Request $request
         * @param string $id
         *
         * @return RedirectResponse
         */
        public function update(Request $request, string $id): RedirectResponse
        {
            // Validates the request attributes
            $validator = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'price' => ['required', 'numeric', 'min:0'],
                'stock' => ['required', 'integer', 'min:0'],
                'published_at' => ['required', 'date'],
                'genre' => ['required', 'string', 'exists:genres,id'],
                'authors' => ['required', 'array'],
                'authors.*.id' => ['required_with:authors', 'exists:authors,id'],
                'authors.*.contribution_type' => ['required_with:authors', 'string', 'in:Primary Author,Co-Author,Editor,Translator,Illustrator,Other'],
                'authors.*.royalty_percentage' => ['required_with:authors', 'numeric', 'min:0', 'max:100'],
                'authors.*.contract_signed_at' => ['required_with:authors', 'date'],
            ]);

//            dd($validator);

            if(!$validator) {
                return redirect()->back()->with('errors', __('admin.books.exceptions.validation_failed'));
            }

            $book = Book::findOrFail($id);

            $book->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'published_at' => $request->published_at,
            ]);

            $book->genres()->sync($request->genre);

            $pivotData = [];

            foreach($request->authors as $author) {
                $pivotData[$author['id']] = [
                    'contribution_type' => $author['contribution_type'],
                    'royalty_percentage' => $author['royalty_percentage'],
                    'contract_signed_at' => $author['contract_signed_at'],
                ];
            }

            $book->authors()->sync($pivotData);

            return redirect()->route('admin.books.index')->with('success', __('admin.books.messages.book_updated'));
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param string $id
         *
         * @return RedirectResponse
         */
        public function destroy(string $id): RedirectResponse
        {
            $book = Book::findOrFail($id);
            if(!$book) {
                return redirect()->back()->with('error', __('admin.books.exceptions.book_not_found'));
            }

            $book->delete();

            return redirect()->route('admin.books.index')->with('success', __('admin.books.messages.book_deleted'));
        }
    }
