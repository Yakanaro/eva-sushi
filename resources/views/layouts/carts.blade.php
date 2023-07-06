<div class="overflow-x-auto drop-shadow-lg rounded-lg mx-3 shadow-lg shadow-pink-300/30">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-black ">
            <thead class="text-xs text-black uppercase bg-pink-50 text-center drop-shadow-lg">
            <tr class="drop-shadow-lg">
                <th scope="col" class="px-4 py-2 sm:px-6 sm:py-3">
                    <span class="sr-only">Image</span>
                </th>
                <th scope="col" class="px-4 py-2 sm:px-6 sm:py-3">
                    Название позиции
                </th>
                <th scope="col" class="px-4 py-2 sm:px-6 sm:py-3">
                    Количество
                </th>
                <th scope="col" class="px-4 py-2 sm:px-6 sm:py-3">
                    Цена
                </th>
                <th scope="col" class="px-4 py-2 sm:px-6 sm:py-3">
                    Действия
                </th>
            </tr>
            </thead>
            <tbody>
                @if ($cart && $cart->positions()->count() > 0)
                    @foreach ($cart->positions as $position)
                        <tr class="bg-white border-b border-pink-400 text-center ">
                            <td class="px-4 py-2 sm:px-6 sm:py-4">
                                <div class="flex justify-center">
                                    <img src="{{asset('/storage/'.$position->preview_image)}}" alt="" srcset="" width="50" height="50">
                                </div>
                            </td>
                            <td class="px-4 py-2 sm:px-6 sm:py-4">
                                {{ $position->name }}
                            </td>
                            <td class="px-4 py-2 sm:px-6 sm:py-4">
                                <div class="flex items-center space-x-3 justify-center">
                                    <button id="quantity-decrease-{{$position->id}}" class="quantity-decrease inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                        <span class="sr-only">Quantity button</span>
                                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div>
                                        <input type="number" id="quantity-input-{{$position->id}}" class="quantity-input bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required value="1">
                                    </div>
                                    <button id="quantity-increase-{{$position->id}}" class="quantity-increase inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                        <span class="sr-only">Quantity button</span>
                                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                            <td class="px-4 py-2 sm:px-6 sm:py-4">
                                {{ $position->price}}₽
                            </td>
                            <td class="px-4 py-2 sm:px-6 sm:py-4">
                                <form action="{{route('cart.delete', $position->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" type="submit" >Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="px-4 py-2 sm:px-6 sm:py-4 text-center">
                            <div class="flex justify-center items-center">
                                <a href="/" class="mt-2 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Выбрать суши</a>
                            </div>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
{{--address--}}
<div class="rounded-lg grid grid-rows-2 grid-cols-2 gap-3 mt-3 mx-3">
    <div class="shadow-lg shadow-pink-300/30 rounded-lg">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 text-center mt-4">Адрес доставки</label>
        <div class="">
            <select id="countries" class="h-11 bg-gray-50 border border-pink-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @if($user)
                    @foreach($user->addresses as $address)
                        <option selected>{{$address->fullAddress($address)}}</option>
                    @endforeach
                @endif
            </select>
            <div class="flex flex justify-center items-center mt-3">
                <button type="button" data-modal-target="addAddress" data-modal-toggle="addAddress" class=" h-11 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Добавить</button>
            </div>
        </div>
        <div class="ml-2">
            <a href="{{route('address.index')}}" class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                <svg class="w-3 h-3 mr-2" aria-hidden="true" focusable="false" data-prefix="far" data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z"></path></svg>
                Удалить или изменить адрес можно здесь</a>
        </div>
    </div>
{{--Payment method and number of guests--}}
    <div class="shadow-lg shadow-pink-300/30 rounded-lg flex-grow">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 text-center mt-4">Способ оплаты</label>
        <div class="">
            <select id="countries" class="h-11 bg-gray-50 border border-pink-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center">
                <option selected>Курьеру по карте</option>
                <option>Наличными</option>
            </select>
        </div>
{{--        <div class="flex flex-row justify-center space-x-3">--}}
{{--            <div class="flex items-center pl-4 border border-pink-200 rounded">--}}
{{--                <input id="bordered-radio-1" type="radio" value="" name="bordered-radio" class="w-10 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">--}}
{{--                <label for="bordered-radio-1" class="w-full py-4 ml-2 text-sm font-medium text-black">Наличными</label>--}}
{{--            </div>--}}
{{--            <div class="flex items-center pl-4 border border-pink-200 rounded">--}}
{{--                <input checked id="bordered-radio-2" type="radio" value="" name="bordered-radio" class="w-5 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">--}}
{{--                <label for="bordered-radio-2" class="w-full py-4 ml-2 text-sm font-medium text-black mr-2">Курьеру по карте</label>--}}
{{--            </div>--}}
{{--        </div>--}}

        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 text-center mt-2 ">Количество гостей</label>
        <div class="flex items-center space-x-3 justify-center mb-3">
            <button id="quantity-decrease" class="quantity-decrease inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <span class="sr-only">Quantity button</span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div>
                <input type="number" id="quantity-input" class="quantity-input bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required value="1">
            </div>
            <button id="quantity-increase" class="quantity-increase inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <span class="sr-only">Quantity button</span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
{{--Total Price--}}
    <div class="shadow-lg shadow-pink-300/30 rounded-lg ">
        <label for="message" class="block ml-2 mb-4 text-sm font-medium text-gray-900 text-center mt-4">Добавить комментарий к заказу</label>
        <textarea id="message" rows="1" class="mb-2 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-pink-200 focus:ring-red-500 focus:border-red-500" placeholder="Ваш комментарий"></textarea>
    </div>
    <div class="text-black grow shadow-lg shadow-pink-300/30 text-center flex justify-center items-center rounded-lg">
        <p class="text-xl font-bold">Сумма заказа: </p>
        <p class="text-xl font-bold">{{$totalPrice}}₽</p>
    </div>
</div>
<div class="flex flex justify-center items-center mt-4">
    <button type="button" class="mt-2 mb-2 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Оформить заказ</button>
</div>

<!-- Main modal -->
<div id="addAddress" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    @include('address.addAddress')
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        let increaseBtn = $('[id^="quantity-increase-"]');
        var decreaseBtn = $('[id^="quantity-decrease-"]');
        var quantityInput = $('[id^="quantity-input-"]');


        increaseBtn.on('click', function() {
            var positionId = $(this).attr('id').split('-')[2];
            var currentValue = parseInt($('#quantity-input-' + positionId).val());
            if (!isNaN(currentValue)) {
                $('#quantity-input-' + positionId).val(currentValue + 1);
            }
        });


        decreaseBtn.on('click', function() {
            var positionId = $(this).attr('id').split('-')[2];
            var currentValue = parseInt($('#quantity-input-' + positionId).val());
            if (!isNaN(currentValue) && currentValue > 1) {
                $('#quantity-input-' + positionId).val(currentValue - 1);
            }
        });
    });
</script>

