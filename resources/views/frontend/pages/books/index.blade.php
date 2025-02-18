@use(Illuminate\Pagination\Paginator)
@use(Illuminate\Pagination\LengthAwarePaginator)
@extends('frontend.layouts.guest')

@section('title', __('frontend/books.index.title'))

@section('content')
    <h1 class="text-4xl font-bold text-center text-gray-800 dark:text-gray-200">
        {{ __('frontend/books.index.title') }}
    </h1>
    <p class="mt-4 text-lg text-center text-gray-600 dark:text-gray-400">
        {{ __('frontend/books.index.description', ['count' => count($books)]) }}
    </p>

    <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($books as $book)
            <x-frontend.product-card
                :title="$book->title"
                :authors="$book->authors"
                :price="$book->price"
                :link="route('books.show', $book->id)"/>
        @endforeach
    </div>

    @if($books->hasPages() && ($books instanceof Paginator || $books instanceof LengthAwarePaginator))
        <div class="mt-3">
            {{ $books->links() }}
        </div>
    @endif
@endsection
