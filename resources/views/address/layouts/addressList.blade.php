<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-black">
            <thead class="text-xs text-black uppercase bg-pink-50 text-center">
            <tr>
                <th scope="col" class="px-4 py-2 sm:px-6 sm:py-3">
                    Название позиции
                </th>
                <th scope="col" class="px-4 py-2 sm:px-6 sm:py-3">
                    Действия
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($addresses as $address)
                <tr class="bg-white border-b border-t border-pink-400 text-center">
                    <td class="px-4 py-2 sm:px-6 sm:py-4">
                       {{$address->fullAddress($address)}}
                    </td>
                    <td>
                        <div class="flex flex-row justify-center space-x-3 text-center">
                            <form action="{{route('address.delete', $address->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10" type="submit">
                                    Удалить
                                </button>
                            </form>
                            <button type="button" data-modal-target="editAddress" data-modal-toogle="editAddress" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                                Изменить
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-2 sm:px-6 sm:py-4 text-center">
                        <p>Список адресов пуст</p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
{{--modal window for edit address--}}
<div id="editAddress" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    @include('address.edit')
</div>