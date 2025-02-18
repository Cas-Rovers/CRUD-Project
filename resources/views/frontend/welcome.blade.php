@extends('frontend.layouts.guest')

@section('title', config('app.name'))

@section('content')
    <h1 class="text-4xl font-bold text-center text-gray-800 dark:text-gray-200">
        {{ __('frontend/books.welcome.title', ['name' => config('app.name')]) }}
    </h1>
    <p class="mt-4 text-lg text-center text-gray-600 dark:text-gray-400">
        {{ __('frontend/books.welcome.description') }}
    </p>
@endsection
