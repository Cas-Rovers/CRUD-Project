@use(Illuminate\Pagination\Paginator)
@use(Illuminate\Pagination\LengthAwarePaginator)
@extends('admin.layouts.app')

@section('title', __('admin/books.index.title'))

@section('content')
    <h2>{{ __('admin/books.index.title') }}</h2>

    <div class="flex flex-col gap-3 mt-2">
        <div class="overflow-x-auto p-4">
            <div class="flex justify-end mb-3">
                <a href="{{ route('admin.books.create') }}"
                   class="p-2 bg-green-400 dark:bg-green-500 rounded-lg">
                    {{ __('admin/books.index.table.buttons.create') }} +
                </a>
            </div>
            <p class="dark:text-slate-400 text-slate-500">
                *{{ __('admin/books.index.table.messages.info_dbl_click') }}</p>
            <div class="w-full min-w-min bg-white dark:bg-gray-800 shadow-md rounded-lg">
                <!-- Table Header -->
                <div
                    class="grid grid-cols-[0.5fr_1.5fr_2fr_1.5fr_1.5fr_1fr_0.75fr] bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold py-2 px-2 rounded-t-lg">
                    <div class="px-1 py-2">{{ __('admin/books.index.table.columns.id') }}</div>
                    <div class="px-2 py-2">{{ __('admin/books.index.table.columns.title') }}</div>
                    <div class="px-2 py-2">{{ __('admin/books.index.table.columns.description') }}</div>
                    <div class="px-2 py-2">{{ __('admin/books.index.table.columns.genres') }}</div>
                    <div class="px-2 py-2">{{ __('admin/books.index.table.columns.authors') }}</div>
                    <div class="px-2 py-2">{{ __('admin/books.index.table.columns.price') }}</div>
                    <div class="px-2 py-2 text-right">{{ __('admin/books.index.table.columns.actions') }}</div>
                </div>
                <!-- End Table Header -->

                <!-- Table Body -->
                @foreach($books as $book)
                    <div
                        class="grid grid-cols-[0.5fr_1.5fr_2fr_1.5fr_1.5fr_1fr_0.75fr] @if(!$loop->last) border-b border-gray-200 dark:border-gray-600 @endif py-2 px-2 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"
                        ondblclick="window.location.href = '{{ route('admin.books.show', $book->id) }}'">
                        <div class="px-1 py-2 text-gray-900 dark:text-gray-300"><p>{{ $book->id }}</p></div>
                        <div class="px-2 py-2 text-gray-900 dark:text-gray-300"><p>{{ $book->title }}</p></div>
                        <div class="px-2 py-2 text-gray-900 dark:text-gray-300">
                            <p>{{ Str::limit($book->description, 15) }}</p>
                        </div>
                        <div class="px-2 py-2 text-gray-900 dark:text-gray-300">
                            <p>{{ $book->genres->pluck('name')->implode(', ') }}</p>
                        </div>
                        <div class="px-2 py-2 text-gray-900 dark:text-gray-300">
                            @foreach($book->authors as $author)
                                <p>{{ $author->full_name }}</p>
                            @endforeach
                        </div>
                        <div class="px-2 py-2 text-gray-900 dark:text-gray-300">
                            <p>{{ Number::currency($book->price, config('app.currency_locale'), config('app.locale')) }}</p>
                        </div>
                        <div class="px-2 py-2 flex flex-col gap-2">
                            <a href="{{ route('admin.books.edit', $book->id) }}"
                               class="bg-blue-400 dark:bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-500 dark:hover:bg-blue-400 text-center">{{ __('admin/books.index.table.buttons.edit') }}</a>
                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-400 dark:bg-red-500 text-white py-1 px-3 rounded hover:bg-red-500 dark:hover:bg-red-400">{{ __('admin/books.index.table.buttons.delete') }}</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <!-- End Table Body -->
            </div>
        </div>
    </div>

    @if($books->hasPages() && ($books instanceof Paginator || $books instanceof LengthAwarePaginator))
        <div class="mt-3">
            {{ $books->links() }}
        </div>
    @endif
@endsection
