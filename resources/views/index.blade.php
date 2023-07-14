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
<div class="flex flex-col h-screen max-w-screen-xl mx-auto">
    <header class="">
        <nav class="bg-white fixed w-full z-50 top-0 left-0 border-b border-gray-200">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 bg-white">
                <a href="{{route('home.index')}}" class="flex items-center">
                    <img src="https://sun9-62.userapi.com/impg/YOW9CE7ff8X-2EpIoW1hY4VbRW10Ju00Q5KmwA/T09PRNl3oSk.jpg?size=564x640&quality=96&sign=9e5a1c9bad3b265bd3e5f72242fc702f&type=album"
                         class="h-10 mr-3" alt="Flowbite Logo">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap">EVA Sushi</span>
                </a>

                <!-- shop basket -->
                <div class="flex items-center md:order-2 bg-white">
                        {{--account user--}}
                    @auth
                        <div class="mr-2">
                            <a href="{{route('account.index')}}">
                                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                            </a>
                        </div>
                    @endauth
{{--                    <a href="{{ route('cart.index') }}"--}}
{{--                       class="relative flex items-center justify-center w-8 h-8 text-gray-500 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 mr-1">--}}
{{--                        <svg fill="#000000" height="50px" width="800px" version="1.1" id="XMLID_268_"--}}
{{--                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
{{--                             viewBox="0 0 24 24" xml:space="preserve">--}}
{{--                <g id="shop-basket">--}}
{{--                    <g>--}}
{{--                        <path d="M20.9,24H3.1l-1-11H0V7h4.5l4.7-7l1.7,1.1L7,6.9h10.2l-3.9-5.8L15,0l4.7,7H24v6h-2.1L20.9,24z M13,22h6.1l0.8-9H4.1l0.8,9 H13z M2,11h20V9H2V11z"/>--}}
{{--                    </g>--}}
{{--                </g>--}}
{{--                </svg>--}}
{{--                        <span class="absolute top-0 right-0 flex items-center justify-center w-4 h-4 text-xs font-bold bg-red-500 text-white rounded-full"--}}
{{--                              id="positionCount">{{$positionCount}}</span>--}}
{{--                    </a>--}}
                    <a href="{{ route('cart.index') }}"
                       class="relative flex items-center justify-center w-8 h-8 text-gray-500 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 mr-1">
                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
                        </svg>
                        <span class="absolute top-0 right-0 flex items-center justify-center w-4 h-4 text-xs font-bold bg-red-500 text-white rounded-full"
                              id="positionCount">{{$positionCount}}</span>
                    </a>
                </div>

                <div class="bg-white items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                     id="navbar-sticky">
                    <ul class="flex flex-col p-4 bg-white md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white md:dark:bg-white">
                        <li class="bg-white">
                            <button id="dropdownNavbarLink1" data-dropdown-toggle="dropdownNavbar1"
                                    class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto md:dark:hover:text-blue-500 md:dark:hover:bg-transparent">
                                Роллы
                                <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar1"
                                 class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Запеченные роллы</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Фирменные роллы</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Темпура роллы</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="bg-white">
                            <button id="dropdownNavbarLink2" data-dropdown-toggle="dropdownNavbar2"
                                    class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto md:dark:hover:text-blue-500 md:dark:hover:bg-transparent">
                                Суши
                                <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar2"
                                 class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Запеченные суши</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Спайси суши</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Нигири суши</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#"
                               class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent">Супы</a>
                        </li>
                        <li>
                            <a href="#"
                               class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent">Закуски</a>
                        </li>
                        <li>
                            <a href="#"
                               class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent">Напитки</a>
                        </li>
                    </ul>
                </div>
                <!-- Call the modal bucket window -->
{{--                <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"--}}
{{--                     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full ">--}}
{{--                    @include('account.NewOrder')--}}
{{--                </div>--}}
            </div>
        </nav>

    </header>
    <div class="mt-20">
        @include('layouts.carousel')
    </div>
    <div>
        <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                @foreach($categories as $category)
                    <button type="button"
                            class="text-pink-700 hover:text-white border border-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-pink-400 dark:text-pink-400 dark:hover:text-white dark:hover:bg-pink-500 dark:focus:ring-pink-900"
                            id="{{$category->title}}-tab"
                            data-tabs-target="#{{$category->title}}"
                            type="button" role="tab"
                            aria-controls="{{$category->title}}">
                        {{$category->title}}
                    </button>
                @endforeach
            </ul>
        </div>
        <div>
            <div id="myTabContent">
                @foreach($categories as $category)
                    <div id="{{$category->title}}" role="tabpanel" aria-labelledby="{{$category->title}}-tab"
                         class="grid grid-cols-1 mx-3 md:grid-cols-3 gap-4">
                        @foreach($positions as $position)
                            @if ($position->category['title'] === $category->title && $position->status )
                                <div class="w-full bg-white border border-gray-200 rounded-lg shadow"
                                     id="{{$category->title}}-{{$position->id}}" role="tabpanel"
                                     aria-labelledby="{{$category->title}}-tab">
                                    <a href="#">
                                        <img class="rounded-t-lg" src="{{asset('/storage/'.$position->preview_image)}}"
                                             width="232" height="360" alt=""/>
                                    </a>
                                    @foreach($position->labels as $label)
                                        <span class="bg-pink-100 text-pink-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300 ml-4">{{$label->title}}</span>
                                    @endforeach
                                    <div class="p-5">
                                        <a href="#">
                                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center">{{$position->name}}</h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 text-center">{{$position->description}}</p>
                                        <div class="flex items-center justify-between mt-[80px]">
                                            <span class="text-3xl font-bold text-gray-900">{{intval($position->price)}}₽</span>
                                            @auth
                                                <button data-position-id="{{$position->id}}"
                                                        class=" text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center add-to-cart-btn">
                                                    Заказать
                                                </button>
                                            @else
                                                <button data-modal-target="auth-modal" data-modal-toggle="auth-modal"
                                                        class=" text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    Заказать
                                                </button>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            @include('layouts.auth')
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('js/cookieconsent.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('.add-to-cart-btn').on('click', function (e) {
                    e.preventDefault();

                    var positionId = $(this).data('position-id');

                    $.ajax({
                        url: '{{ route("cart.add") }}',
                        type: 'POST',
                        data: {
                            position_id: positionId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            var cartCounter = $('#positionCount');
                            var currentCount = parseInt(cartCounter.text());
                            cartCounter.text(currentCount + 1);
                        },
                        error: function (xhr, status, error) {
                            console.log(error);
                        }
                    });
                });
            });
        </script>

        <script>
            const addToCartBtns = document.querySelectorAll('.add-to-cart-btn');

            addToCartBtns.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    btn.textContent = 'Добавлено в корзину';
                    btn.disabled = true;
                    btn.classList.remove('bg-gradient-to-r', 'from-red-200', 'via-red-300', 'to-yellow-200', 'hover:bg-gradient-to-bl');
                    btn.classList.add('bg-gray-400', 'hover:bg-gray-400', 'cursor-not-allowed');
                });
            });
        </script>
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
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>