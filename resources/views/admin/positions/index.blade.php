@extends('admin.layouts.adminApp')

@section('content')
    <form method="get"
          action="{{route('position.search')}}"
          class="ml-[150px]">
        @csrf
        <div class="relative w-full">
            <input type="search" id="search" name="search" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Поиск по названию позиции" required>
            <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </form>

    @if($errors->any())
        <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif

    <div class="">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-black uppercase bg-gray-50 text-center">
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
                    Категория
                </th>
                <th scope="col" class="px-6 py-3">
                    Метки
                </th>
                <th scope="col" class="px-6 py-3">
                    Изображение позиции
                </th>
                <th scope="col" class="px-6 py-3">
                    Статус позиции
                </th>
                <th scope="col" class="px-6 py-3">
                    Действия
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($positions as $position)
                <tr class="bg-white border-b text-black text-center">
                    <td class="px-6 py-4" >{{ $position->name }}</td>
                    <td class="px-6 py-4">{{ $position->price }}</td>
                    <td class="px-6 py-4">{{ $position->description }}</td>
                    <td class="px-6 py-4">{{ $position->category['title'] }}</td>
                    @foreach($position->labels as $label)
                        <td class="px-6 py-4 flex flex-row">{{ $label->title }}</td>
                    @endforeach
                    <td class="px-6 py-4 ">
                        <div class="flex justify-center">
                            <img src="{{asset('/storage/'.$position->preview_image)}}" alt="" srcset="" width="50" height="50">
                        </div>
                    </td>
                    <td class="px-6 py-4 flex items-center justify-center">
                        @if($position->status)
                            <span class="flex w-3 h-3 bg-green-500 rounded-full mt-4" ></span>
                        @else
                            <span class="flex w-3 h-3 bg-red-500 rounded-full mt-4"></span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-row space-x-3 justify-center">
                            <button id="deleteButton" data-modal-toggle="deleteModal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10" type="button">
                                Удалить
                            </button>
                            <button type="submit" data-modal-target="edit-position-{{ $position->id }}" data-modal-toggle="edit-position-{{ $position->id }}" data-position-id="{{ $position->id }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Изменить</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class=" ml-2 mb-2 mt-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Добавить
        </button>
        <div>
            @include('admin.positions.create')
        </div>
        @foreach($positions as $position)
            <div>
                @if(count($positions->toArray()) == 0 )
                    <div></div>
                @else
                    @include('admin.positions.edit')
                @endif
            </div>
            <div>
                @include('admin.positions.destroy')
            </div>
        @endforeach
    </div>
@endsection


