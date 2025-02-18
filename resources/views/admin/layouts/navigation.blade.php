<nav class="dark:bg-gray-800 bg-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="text-white text-lg font-bold">{{ config('app.name') }}</a>
            </div>
            <div class="sm:ml-6 sm:flex sm:space-x-8 flex justify-center items-center">
                @auth
                    <a href="{{ route('admin.authors.index') }}"
                       class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ __('admin/authors.index.title') }}</a>
                    <a href="{{ route('admin.books.index') }}"
                       class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ __('admin/books.index.title') }}</a>
                    <a href="{{ route('admin.genres.index') }}"
                       class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ __('admin/genres.index.title') }}</a>
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Logout
                        </button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                       class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                    <a href="{{ route('register') }}"
                       class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                @endguest
            </div>
        </div>
    </div>
</nav>
