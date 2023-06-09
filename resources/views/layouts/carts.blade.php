<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-black ">
        <thead class="text-xs text-black uppercase bg-pink-50 text-center ">
        <tr>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">Image</span>
            </th>
            <th scope="col" class="px-6 py-3">
                Название позиции
            </th>
            <th scope="col" class="px-6 py-3">
                Количество
            </th>
            <th scope="col" class="px-6 py-3">
                Цена
            </th>
            <th scope="col" class="px-6 py-3">
                Действия
            </th>
        </tr>
        </thead>
        <tbody>
            @foreach($cart->positions as $position)
                <tr class="bg-white border-b border-pink-400 text-center">
                    <td class="px-6 py-4">
                        <div class="flex justify-center">
                            <img src="{{asset('/storage/'.$position->preview_image)}}" alt="" srcset="" width="50" height="50">
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        {{ $position->name }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3 justify-center">
                            <button id="quantity-decrease-{{$position->id}}" class="quantity-decrease inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                <span class="sr-only">Quantity button</span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            </button>
                            <div>
                                <input type="number" id="quantity-input-{{$position->id}}" class="quantity-input bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required value="1">
                            </div>
                            <button id="quantity-increase-{{$position->id}}" class="quantity-increase inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                <span class="sr-only">Quantity button</span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        {{ $position->price}}₽
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{route('cart.delete', $position->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10" type="submit">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 text-center mt-2">Добавить комментарий к заказу</label>
    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Ваш комментарий"></textarea>
    <div class="flex flex justify-center items-center">
        <button type="button" class="mt-2 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Оформить заказ</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        var increaseBtn = $('[id^="quantity-increase-"]');
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

