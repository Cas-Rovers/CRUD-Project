<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Author;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;

    class AuthorController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Factory|Application|View
         */
        public function index(): Factory|Application|View
        {
            $authors = Author::paginate(15);

            return view('admin.pages.authors.index', [
                'authors' => $authors,
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Factory|Application|View
         */
        public function create(): Factory|Application|View
        {
            return view('admin.pages.authors.create');
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
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'biography' => ['required', 'string'],
            ]);

            if(!$validator) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $author = Author::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'biography' => $request->biography,
            ]);

            return redirect()->route('admin.authors.index');
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
            $author = Author::findOrFail($id);

            return view('admin.pages.authors.show', [
                'author' => $author,
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
            $author = Author::findOrFail($id);

            return view('admin.pages.authors.edit', [
                'author' => $author,
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
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'biography' => ['required', 'string'],
            ]);

            if(!$validator) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $author = Author::findOrFail($id);
            $author->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'biography' => $request->biography,
            ]);

            return redirect()->route('admin.authors.index');
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
            $author = Author::findOrFail($id);

            $author->delete();

            return redirect()->route('admin.authors.index');
        }
    }
