<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token">

    <title>Eva-Sushi</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased h-full ">
<div class="flex flex-col h-screen max-w-screen-xl mx-auto">
    <header class="">
        @include('layouts.navigation')
    </header>

    <div class="mt-20">
        @include('layouts.carousel')
    </div>

    <div>
        @include('layouts.cards')
    </div>

    <footer>
        @include('layouts.footer')
    </footer>
</div>
</body>
</html>