@extends('admin.layouts.app')

@section('title', __('admin/books.show.title', ['title' => $book->title]))

@section('content')
    <h2 class="text-2xl font-semibold mb-4 dark:text-white">{{ __('admin/books.show.title', ['title' => $book->title]) }}</h2>

    <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
        <h3 class="text-xl font-bold mb-2 dark:text-gray-300">Title: {{ $book->title }}</h3>

        <p class="text-gray-600 mb-4 dark:text-gray-400">{{ $book->description }}</p>

        <div class="mb-4">
            <strong class="text-gray-800 dark:text-gray-200">Genres:</strong>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($book->genres as $genre)
                    <li class="text-gray-700 dark:text-gray-300">{{ $genre->name }}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <strong class="text-gray-800 dark:text-gray-200">Authors:</strong>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($book->authors as $author)
                    <li class="text-gray-700 dark:text-gray-300">{{ $author->full_name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
