@extends('admin.layouts.app')

@section('title', __('admin/genres.create.title'))

@section('content')
    <h2 class="text-2xl font-semibold mb-4 dark:text-white text-center">{{ __('admin/genres.create.title') }}</h2>
    <form action="{{ route('admin.genres.store') }}" method="POST"
          class="max-w-md mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
        @csrf
        <div class="mb-6">
            <label for="name"
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('admin/genres.create.form.labels.name') }}</label>
            <x-admin.form.input name="name" type="text" required/>
        </div>

        <div class="mb-6">
            <label for="description"
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('admin/genres.create.form.labels.description') }}</label>
            <x-admin.form.textarea id="description" name="description" rows="5"
                                   required></x-admin.form.textarea>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 dark:bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
            {{ __('admin/genres.create.form.labels.submit') }}
        </button>
    </form>

@endsection
