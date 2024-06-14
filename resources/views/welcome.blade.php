<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>
    {{-- CSS Tailwindcss --}}
    @vite('resources/css/app.css')
    {{-- CSS FONTAWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- CSS APP --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="h-full bg-gray-900">
    <header
        class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-slate-950 border-b border-black text-sm py-2 sm:py-0 dark:bg-slate-950 dark:border-black">
        @include('components.content.nav')
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="footer items-center p-4 justify-center bg-white">
        @include('components.content.footer')
    </footer>
    {{-- JS Preline --}}
    @vite('resources/js/app.js')
</body>

</html>
