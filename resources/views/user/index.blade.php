<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-center">
        <tr>
            <th scope="col" class="px-6 py-3">
                Номер телефона
            </th>
            <th scope="col" class="px-6 py-3">
                Адрес
            </th>
            <th scope="col" class="px-6 py-3">
                Действия
            </th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="bg-white border-b text-black text-center">
                    <td class="px-6 py-4">{{$user->phone}}</td>
                    @foreach($user->addresses as $address)
                        <td class="px-6 py-4 flex flex-col">
                            {{$address->fullAddress($address)}}
                        </td>
                    @endforeach
                    <td class="px-6 py-4">Удалить</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
