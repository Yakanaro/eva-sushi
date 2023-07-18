
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
    <link rel="icon" href="/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cookieconsent.min.css') }}" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased h-full ">
@include('layouts.navigationWithReg')
@yield('content')
<footer>
    @include('layouts.footer')
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/cookieconsent.min.js') }}"></script>
<script>
    window.addEventListener('load', function () {
        window.cookieconsent.initialise({
            'palette': {
                'popup': {
                    'background': '#edeff5',
                    'text': '#838391'
                },
                'button': {
                    'background': '#fbcfe8'
                }
            },
            'theme': 'classic',
            'position': 'bottom-right',
            'content': {
                'message': 'Этот веб-сайт использует файлы cookie для обеспечения лучшего пользовательского опыта.',
                'dismiss': 'Принять',
                'link': 'Узнай больше'
            }
        })
    });
</script>
<script src="{{ asset('js/app.js') }}"></script>
</html>