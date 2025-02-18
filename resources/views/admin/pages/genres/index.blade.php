@use(Illuminate\Pagination\Paginator)
@use(Illuminate\Pagination\LengthAwarePaginator)
@use(Illuminate\Support\Str)
@extends('admin.layouts.app')

@section('title', __('admin/genres.index.title'))

@section('content')
    <h2 class="text-2xl font-semibold mb-4 dark:text-white text-center">{{ __('admin/genres.index.title') }}</h2>

    <div class="flex flex-col gap-3 mt-2">
        <div class="overflow-x-auto p-4">
            <div class="flex justify-end mb-3">
                <a href="{{ route('admin.genres.create') }}"
                   class="p-2 bg-green-400 dark:bg-green-500 rounded-lg">
                    {{ __('admin/genres.index.table.buttons.create') }} +
                </a>
            </div>
            <p class="dark:text-slate-400 text-slate-500">
                *{{ __('admin/genres.index.table.messages.info_dbl_click') }}</p>
            <div class="w-full min-w-min bg-white dark:bg-gray-800 shadow-md rounded-lg">
                <!-- Table Header -->
                <div
                    class="grid grid-cols-[2fr_2fr_2fr_2fr] bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold py-2 px-2 rounded-t-lg">
                    <div class="px-1 py-2">{{ __('admin/genres.index.table.columns.id') }}</div>
                    <div class="px-2 py-2">{{ __('admin/genres.index.table.columns.name') }}</div>
                    <div class="px-2 py-2">{{ __('admin/genres.index.table.columns.description') }}</div>
                    <div class="px-2 py-2 text-right">{{ __('admin/genres.index.table.columns.actions') }}</div>
                </div>
                <!-- End Table Header -->

                <!-- Table Body -->
                @foreach($genres as $genre)
                    <div
                        class="grid grid-cols-[2fr_2fr_2fr_2fr] @if(!$loop->last) border-b border-gray-200 dark:border-gray-600 @endif py-2 px-2 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"
                        ondblclick="window.location.href = '{{ route('admin.genres.show', $genre->id) }}'">
                        <div class="px-1 py-2 text-gray-900 dark:text-gray-300"><p>{{ $genre->id }}</p></div>
                        <div class="px-2 py-2 text-gray-900 dark:text-gray-300"><p>{{ $genre->name }}</p></div>
                        <div class="px-2 py-2 text-gray-900 dark:text-gray-300">
                            <p>{{ Str::limit($genre->description, 30) }}</p>
                        </div>
                        <div class="px-2 py-2 flex flex-col gap-2 items-end">
                            <div>
                                <a href="{{ route('admin.genres.edit', $genre->id) }}"
                                   class="bg-blue-400 dark:bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-500 dark:hover:bg-blue-400 text-center">{{ __('admin/genres.index.table.buttons.edit') }}</a>
                            </div>
                            <form action="{{ route('admin.genres.destroy', $genre->id) }}" method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-400 dark:bg-red-500 text-white py-1 px-3 rounded hover:bg-red-500 dark:hover:bg-red-400">{{ __('admin/genres.index.table.buttons.delete') }}</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <!-- End Table Body -->
            </div>
        </div>
    </div>

    @if($genres->hasPages() && ($genres instanceof Paginator || $genres instanceof LengthAwarePaginator))
        <div class="mt-3">
            {{ $genres->links() }}
        </div>
    @endif
@endsection
