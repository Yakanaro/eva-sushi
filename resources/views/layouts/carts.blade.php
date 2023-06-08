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
                    <td class="px-6 py-4 text-center">
                        2
                    </td>
                    <td class="px-6 py-4">
                        {{ $position->price }}
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
</div>
