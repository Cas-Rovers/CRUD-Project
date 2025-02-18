@extends('admin.layouts.app')

@section('title', __('admin/genres.show.title', ['name' => $genre->name]))

@section('content')
    <h2 class="text-2xl font-semibold mb-4 dark:text-white">{{ __('admin/genres.show.title', ['name' => $genre->name]) }}</h2>

    <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
        <h3 class="text-xl font-bold mb-2 dark:text-gray-300">{{ __('admin/genres.show.list.name') }} {{ $genre->name }}</h3>

        <p class="text-black mb-4 dark:text-white   ">{{ __('admin/genres.show.list.description') }}</p>
        <p class="text-gray-600 mb-4 dark:text-gray-400">{{ $genre->description }}</p>
    </div>
@endsection
