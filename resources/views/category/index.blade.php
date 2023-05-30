<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-center">
        <tr>
            <th scope="col" class="px-6 py-3">
                Название категории
            </th>
            <th scope="col" class="px-6 py-3">
                Действия
            </th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div>
        <button data-modal-target="create-category" data-modal-toggle="create-category" class=" ml-2 mb-2 mt-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Добавить
        </button>
    </div>
    <div>
        @include('category.create')
    </div>
</div>

