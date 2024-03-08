<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mzati's Blog</title>
    <meta name="author" content="Mzati tembo">
    <meta name="description" content="idek">

    <link href="/css/app.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body class="bg-white font-family-karla">
    <x-header />

    <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a href="#"
                class=" md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open">
                Topics <i :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block' : 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div
                class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <a href="/" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">HOME</a>
                @foreach ($categories as $category)
                    <a href="{{ route('by-category', $category) }}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">
                        {{ $category->title }}</a>
                @endforeach
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">ABOUT US</a>

            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="w-full bg-white pb-12 footer footer-center">
        <div class="w-full container mx-auto flex flex-col items-center p-12">
            <div class="uppercase pb-6">&copy; Mzati.com</div>
        </div>
    </footer>
</body>

</html>
