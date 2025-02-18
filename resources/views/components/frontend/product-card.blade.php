@props([
    'title' => '',
    'authors' => [],
    'image' => 'https://via.placeholder.com/300x400',
    'price' => null,
    'link' => '#',
])

<div
    class="p-4 bg-white dark:bg-gray-800 shadow-lg rounded-2xl overflow-hidden transition-transform transform hover:scale-105">
    <div class="flex flex-col gap-7">
        <div class="relative">
            {{--<img src="{{ $image }}" alt="{{ $title }}" class="w-full h-64 object-cover">--}}
            @if ($price)
                <span
                    class="absolute top-3 left-3 bg-blue-600 text-white text-sm font-semibold px-3 py-1 rounded-lg shadow-md">
                {{ \Illuminate\Support\Number::currency($price, config('app.currency_locale'), config('app.locale')) }}
            </span>
            @endif
        </div>

        <div class="p-5">
            <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 leading-tight">
                {{ $title }}
            </h2>
            @foreach($authors as $author)
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    {{ $author->full_name }}
                </p>
            @endforeach

            <a href="{{ $link }}"
               class="mt-4 inline-flex items-center justify-center bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 dark:hover:bg-blue-500 transition-all w-full">
                View Details
            </a>
        </div>
    </div>
</div>
