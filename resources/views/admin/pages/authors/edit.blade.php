@extends('admin.layouts.app')

@section('title', __('admin/authors.create.title'))

@section('content')
    <h2 class="text-2xl font-semibold mb-4 dark:text-white text-center">{{ __('admin/authors.edit.title') }}</h2>
    <form action="{{ route('admin.authors.update', $author->id) }}" method="POST"
          class="max-w-md mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="first-name"
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('admin/authors.create.form.labels.first_name') }}</label>
            <x-admin.form.input name="first_name" type="text" autocomplete="name" value="{{ $author->first_name }}"
                                required/>
        </div>

        <div class="mb-6">
            <label for="last-name"
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('admin/authors.create.form.labels.last_name') }}</label>
            <x-admin.form.input name="last_name" type="text" autocomplete="name" value="{{ $author->last_name }}"
                                required/>
        </div>

        <div class="mb-6">
            <label for="biography"
                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('admin/authors.create.form.labels.biography') }}</label>
            <x-admin.form.textarea id="biography" name="biography" rows="5"
                                   required>{{ $author->biography }}"
            </x-admin.form.textarea>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 dark:bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
            {{ __('admin/authors.create.form.labels.submit') }}
        </button>
    </form>

@endsection
