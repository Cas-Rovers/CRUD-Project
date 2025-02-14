<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name'))</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite('resources/assets/admin/css/app.css')
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>
<body class="font-sans antialiased dark:bg-gray-900 dark:text-gray-100">
    @include('admin.layouts.navigation')
    <main class="container py-3">
        @yield('content')
    </main>
    @vite('resources/assets/admin/js/app.js')
    @stack('scripts')
</body>
</html>
