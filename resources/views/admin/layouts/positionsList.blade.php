<div>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-black uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Позиция
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Цена
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Описание
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Действия
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($positions as $position)
                <tr class="bg-white border-b text-black">
                    <td class="px-6 py-4" >{{ $position->name }}</td>
                    <td class="px-6 py-4">{{ $position->price }}</td>
                    <td class="px-6 py-4">{{ $position->description }}</td>
                    <td class="px-6 py-4">
                        <form action="{{route('position.delete', $position->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Удалить</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
</div>