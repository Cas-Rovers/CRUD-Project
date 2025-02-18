@extends('admin.layouts.app')

@section('title', __('admin/authors.show.title', ['name' => $author->full_name]))

@section('content')
    <h2 class="text-2xl font-semibold mb-4 dark:text-white">{{ __('admin/authors.show.title', ['name' => $author->full_name]) }}</h2>

    <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
        <h3 class="text-xl font-bold mb-2 dark:text-gray-300">{{ __('admin/authors.show.list.full_name') }} {{ $author->full_name }}</h3>

        <p class="text-black mb-4 dark:text-white   ">{{ __('admin/authors.show.list.biography') }}</p>
        <p class="text-gray-600 mb-4 dark:text-gray-400">{{ $author->biography }}</p>
    </div>
@endsection
