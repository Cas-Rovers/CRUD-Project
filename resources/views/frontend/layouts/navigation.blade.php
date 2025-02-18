<nav class="bg-blue-700 dark:bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold">{{ config('app.name') }}</a>
        <div class="flex justify-center items-center">
            <ul class="hidden md:flex space-x-6">
                <li><a href="{{ route('home') }}" class="hover:text-gray-400 dark:hover:text-gray-300">Home</a></li>
                <li><a href="{{ route('books.index') }}"
                       class="hover:text-gray-400 dark:hover:text-gray-300">{{ __('frontend/books.index.title') }}</a>
                </li>
                @guest
                    <li>
                        <a href="{{ route('login') }}"
                           class="hover:text-gray-400 dark:hover:text-gray-300">Login</a>
                    </li>

                @else
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                           class="hover:text-gray-400 dark:hover:text-gray-300">Dashboard</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
