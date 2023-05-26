<div class="px-6 py-6 lg:px-8">
    <h3 class="mb-4 text-xl font-medium text-gray-900">Добавить позицию</h3>
    <form class="space-y-6" method="POST" action="{{route('position.store')}}">
        @csrf
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Название позиции</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required>
        </div>
        <div>
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Цена позиции</label>
            <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="350" required>
        </div>
        <div>
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Добавить описание позиции</label>
            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder=""></textarea>
        </div>
        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Добавить позицию</button>
    </form>
</div>