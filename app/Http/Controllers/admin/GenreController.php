<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Genre;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;

    class GenreController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Factory|Application|View
         */
        public function index(): Factory|Application|View
        {
            $genres = Genre::paginate(15);

            return view('admin.pages.genres.index', [
                'genres' => $genres,
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Factory|Application|View
         */
        public function create(): Factory|Application|View
        {
            return view('admin.pages.genres.create');
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
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
            ]);

            if(!$validator) {
                return redirect()->back()->with('errors', __('admin.genres.exceptions.validation_failed'));
            }

            $genre = Genre::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.genres.index');
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
            $genre = Genre::findOrFail($id);

            return view('admin.pages.genres.show', [
                'genre' => $genre,
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
            $genre = Genre::findOrFail($id);

            return view('admin.pages.genres.edit', [
                'genre' => $genre,
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
            $validator = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
            ]);

            if(!$validator) {
                return redirect()->back()->with('errors', __('admin.genres.exceptions.validation_failed'));
            }

            $genre = Genre::findOrFail($id);

            $genre->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.genres.index');
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
            $genre = Genre::findOrFail($id);

            $genre->delete();

            return redirect()->route('admin.genres.index');
        }
    }
