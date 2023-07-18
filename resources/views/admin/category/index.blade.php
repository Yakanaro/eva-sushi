@extends('admin.layouts.adminApp')

@section('content')
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
            @foreach($categories as $category)
                <tr class="bg-white border-b text-black text-center">
                    <td class="px-6 py-4" >{{ $category->title }}</td>
                    <td class="px-6 py-4" >
                        <form action="{{route('category.delete', $category->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            <button data-modal-target="create-category" data-modal-toggle="create-category" class=" ml-2 mb-2 mt-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Добавить
            </button>
        </div>
        <div>
            @include('admin.category.create')
        </div>
    </div>
@endsection
