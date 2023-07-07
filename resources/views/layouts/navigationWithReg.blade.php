<nav class="bg-white fixed w-full z-50 top-0 left-0 border-b border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 bg-white">
        <a href="{{route('home.index')}}" class="flex items-center">
            <img src="https://sun9-62.userapi.com/impg/YOW9CE7ff8X-2EpIoW1hY4VbRW10Ju00Q5KmwA/T09PRNl3oSk.jpg?size=564x640&quality=96&sign=9e5a1c9bad3b265bd3e5f72242fc702f&type=album"
                 class="h-10 mr-3" alt="Flowbite Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap">EVA Sushi</span>
        </a>

        <!-- shop basket -->
        <div class="flex items-center md:order-2 bg-white">
            <a href="{{ route('cart.index') }}"
               class="relative flex items-center justify-center w-8 h-8 text-gray-500 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 mr-1">
                <svg fill="#000000" height="80px" width="80px" id="XMLID_268_"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24"
                     xml:space="preserve">
                <g id="shop-basket">
                    <g>
                        <path d="M20.9,24H3.1l-1-11H0V7h4.5l4.7-7l1.7,1.1L7,6.9h10.2l-3.9-5.8L15,0l4.7,7H24v6h-2.1L20.9,24z M13,22h6.1l0.8-9H4.1l0.8,9 H13z M2,11h20V9H2V11z"/>
                    </g>
                </g>
                </svg>
                <span class="absolute top-0 right-0 flex items-center justify-center w-4 h-4 text-xs font-bold bg-red-500 text-white rounded-full">{{$positionCount}}</span>
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
    </div>
</nav>
