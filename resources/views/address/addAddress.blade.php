<div class="relative w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow">
        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="addAddress">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Close modal</span>
        </button>
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900">Введите адрес доставки</h3>
            <form class="space-y-6" action="{{route('address.store')}}" method="post">
                @csrf
                <div>
                    <label for="street" class="block mb-2 text-sm font-medium text-gray-900">Улица</label>
                    <input type="text" name="street" id="street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required>
                </div>

                <!-- Дом, Корпус, Подъезд, Квартира, Этаж, Код домофона(Необязательно) -->
                <div class="flex space-x-2">
                    <div class="flex flex-col">
                        <label for="house" class="block mb-2 text-sm font-medium text-gray-900 text-center">Дом</label>
                        <input pattern="[0-9]*" type="number" name="house" id="house" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>

                    <div class="flex flex-col">
                        <label for="building" class="block mb-2 text-sm font-medium text-gray-900 text-center">Корпус</label>
                        <input type="number" name="building" id="building" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>

                    <div class="flex flex-col">
                        <label for="entrance" class="block mb-2 text-sm font-medium text-gray-900 text-center">Подъезд</label>
                        <input type="number" name="entrance" id="entrance" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>

                <div class="flex space-x-2">
                    <div class="flex flex-col">
                        <label for="apartment" class="block mb-2 text-sm font-medium text-gray-900 text-center">Квартира</label>
                        <input type="number" name="apartment" id="apartment" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>

                    <div class="flex flex-col">
                        <label for="floor" class="block mb-2 text-sm font-medium text-gray-900 text-center">Этаж</label>
                        <input type="number" name="floor" id="floor" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>

                    <div class="flex flex-col">
                        <label for="intercom_code" class="block mb-2 text-sm font-medium text-gray-900 text-center">Код домофона</label>
                        <input type="number" name="intercom_code" id="intercom_code" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>

                <button type="submit" class="w-full mt-2 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Сохранить</button>
            </form>
        </div>
    </div>
</div>
