@extends('admin.layouts.app')

@section('title', __('admin/books.create.title'))

@section('content')
    @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2 class="text-2xl font-semibold mb-4 dark:text-white text-center">{{ __('admin/books.create.title') }}</h2>
    <form action="{{ route('admin.books.store') }}" method="POST"
          class="max-w-md mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
        @csrf
        <div class="mb-6">
            <label for="title"
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('admin/books.create.form.labels.title') }}</label>
            <x-admin.form.input name="title" type="text" required/>
        </div>
        <div class="mb-6">
            <label for="description"
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('admin/books.create.form.labels.description') }}</label>
            <x-admin.form.textarea id="description" name="description" rows="5"
                                   required></x-admin.form.textarea>
        </div>

        <div class="mb-6">
            <label for="price"
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('admin/books.create.form.labels.price') }}</label>

            <x-admin.form.input type="number" id="price" name="price" min="0" step="0.01" required/>
        </div>

        <div class="mb-6">
            <label for="stock"
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('admin/books.create.form.labels.stock') }}</label>

            <x-admin.form.input type="number" id="stock" name="stock" min="0" required/>
        </div>

        <div class="mb-6">
            <label for="published-at"
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('admin/books.create.form.labels.published_at') }}</label>

            <x-admin.form.input type="date" id="published-at" name="published_at" min="0" required/>
        </div>

        <div class="mb-6">
            <label for="genre"
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('admin/books.create.form.labels.genres') }}</label>

            <x-admin.form.select name="genre" id="genre" class="w-full px-4 py-2 border rounded-md dark:bg-gray-700">
                <x-admin.form.option
                    value="#">{{ __('admin/books.create.form.placeholders.genres') }}</x-admin.form.option>
                @foreach($genres as $genre)
                    <x-admin.form.option
                        value="{{ $genre->id }}">{{ $genre->name }}
                    </x-admin.form.option>
                @endforeach
            </x-admin.form.select>
        </div>

        <div class="mb-6">
            <label for="authors" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                {{ __('admin/books.create.form.labels.authors') }}
            </label>

            <div id="author-container" class="space-y-4">
                <div class="author-group flex flex-col gap-3">
                    <x-admin.form.select name="authors[0][id]" id="authors"
                                         class="author-select w-full px-4 py-2 border rounded-md dark:bg-gray-700">
                        <x-admin.form.option
                            value="#">{{ __('admin/books.create.form.placeholders.authors') }}</x-admin.form.option>
                        @foreach($authors as $author)
                            <x-admin.form.option
                                value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</x-admin.form.option>
                        @endforeach
                    </x-admin.form.select>

                    <x-admin.form.select name="authors[0][contribution_type]" id="authors"
                                         class="contribution-select w-full px-4 py-2 border rounded-md dark:bg-gray-700">
                        <x-admin.form.option value="Primary Author">Primary Author</x-admin.form.option>
                        <x-admin.form.option value="Co-Author">Co-Author</x-admin.form.option>
                        <x-admin.form.option value="Editor">Editor</x-admin.form.option>
                        <x-admin.form.option value="Translator">Translator</x-admin.form.option>
                        <x-admin.form.option value="Illustrator">Illustrator</x-admin.form.option>
                        <x-admin.form.option value="Other">Other</x-admin.form.option>
                    </x-admin.form.select>

                    <x-admin.form.input type="number" name="authors[0][royalty_percentage]" id="authors" step="0.01"
                                        min="0"
                                        max="100" placeholder="Royalty %"/>

                    <x-admin.form.input type="date" name="authors[0][contract_signed_at]" id="authors"/>
                </div>
                <hr>
            </div>

            <button type="button" id="add-author"
                    class="mt-2 bg-green-500 text-white py-2 px-4 rounded-md cursor-pointer">
                + Add Author
            </button>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 dark:bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
            {{ __('admin/books.create.form.labels.submit') }}
        </button>
    </form>

    @push('scripts')
        <script>
            document.getElementById('add-author').addEventListener('click', function () {
                let container = document.getElementById('author-container');
                let index = container.getElementsByClassName('author-group').length;

                let newAuthor = document.createElement('div');
                newAuthor.classList.add('author-group', 'flex', 'flex-col', 'gap-3');

                newAuthor.innerHTML = `
            <select name="authors[${index}][id]" class="author-select w-full px-4 py-2 border rounded-md dark:bg-gray-700">
                @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
                @endforeach
                </select>

                <select name="authors[${index}][contribution_type]" class="contribution-select w-full px-4 py-2 border rounded-md dark:bg-gray-700">
                    <option value="Co-Author">Co-Author</option>
                    <option value="Editor">Editor</option>
                    <option value="Translator">Translator</option>
                    <option value="Illustrator">Illustrator</option>
                    <option value="Other">Other</option>
                </select>

                <input type="number" name="authors[${index}][royalty_percentage]" step="0.01" min="0" max="100"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500" placeholder="Royalty %"/>

                <input type="date" name="authors[${index}][contract_signed_at]"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500"/>

                <button type="button" class="remove-author bg-red-500 text-white px-3 py-1 rounded-md">Remove</button>
                <hr>
                `;

                container.appendChild(newAuthor);

                newAuthor.querySelector('.remove-author').addEventListener('click', function () {
                    newAuthor.remove();
                });
            });
        </script>
    @endpush
@endsection
