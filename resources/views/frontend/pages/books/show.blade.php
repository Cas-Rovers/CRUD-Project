@use(Illuminate\Support\Carbon)
@use(Illuminate\Support\Number)
@extends('frontend.layouts.guest')

@section('title', $book->title)

@section('content')
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <!-- Book Cover -->
        <div class="w-full h-80 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
            <img src="{{ asset('path-to-book-cover.jpg') }}" alt="Book Cover" class="h-full w-auto object-cover">
        </div>

        <div class="p-6">
            <!-- Book Title -->
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $book->title }}</h1>

            <!-- Author -->
            <p class="text-lg text-gray-700 dark:text-gray-300 mt-2">{{ __('frontend/books.show.authors') }}
                @foreach($book->authors as $author)
                    <br>
                    <span class="font-semibold">
                        {{ $author->full_name }} - {{ $author->pivot->contribution_type }}
                    </span>
                @endforeach
            </p>

            <!-- Published Date -->
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ __('frontend/books.show.published') }} {{ Carbon::parse($book->published_at)->format('d-m-Y') }}</p>

            <!-- Genre -->
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ __('frontend/books.show.genres') }}
                @foreach($book->genres as $genre)
                    <span class="font-semibold">
                        {{ $genre->name }}
                    </span>
                @endforeach
            </p>

            <!-- Description -->
            <div class="mt-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ __('frontend/books.show.description') }}</h2>
                <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $book->description }}</p>
            </div>

            <!-- Price (if applicable) -->
            <div class="mt-4">
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('frontend/books.show.price') }} {{ Number::currency($book->price, config('app.currency_locale'), config('app.locale')) }}</p>
            </div>
        </div>
    </div>
@endsection
