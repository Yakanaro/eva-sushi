<div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        @foreach($categories as $category)
            <button type="button" class="text-pink-700 hover:text-white border border-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-pink-400 dark:text-pink-400 dark:hover:text-white dark:hover:bg-pink-500 dark:focus:ring-pink-900"
                    id="{{$category->title}}-tab"
                    data-tabs-target="#{{$category->title}}"
                    type="button" role="tab"
                    aria-controls="{{$category->title}}">
                {{$category->title}}
            </button>
        @endforeach
    </ul>
</div>
<div>
    <div id="myTabContent">
        @foreach($categories as $category)
            <div id="{{$category->title}}" role="tabpanel" aria-labelledby="{{$category->title}}-tab" class="grid grid-cols-1 mx-3 md:grid-cols-3 gap-4">
                @foreach($positions as $position)
                    @if ($position->category['title'] === $category->title && $position->status )
                        <div class="w-full bg-white border border-gray-200 rounded-lg shadow" id="{{$category->title}}-{{$position->id}}" role="tabpanel" aria-labelledby="{{$category->title}}-tab">
                            <a href="#">
                                <img class="rounded-t-lg" src="{{asset('/storage/'.$position->preview_image)}}" width="232" height="360" alt="" />
                            </a>
                            @foreach($position->labels as $label)
                             <span class="bg-pink-100 text-pink-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300 ml-4">{{$label->title}}</span>
                            @endforeach
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center">{{$position->name}}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 text-center">{{$position->description}}</p>

                                <div class="flex items-center justify-between mt-[80px]">
                                    <span class="text-3xl font-bold text-gray-900">{{$position->price}}₽</span>
                                    <form action="{{route('cart.add', ['position_id' => $position->id])}}" method="POST">
                                        @csrf
{{--                                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center add-to-cart-btn">Заказать</a>--}}
                                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center add-to-cart-btn">Заказать</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</div>

{{--<script>--}}
{{--    // Получаем все кнопки "Заказать"--}}
{{--    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');--}}

{{--    // Обрабатываем клик на каждой кнопке--}}
{{--    addToCartButtons.forEach(button => {--}}
{{--        button.addEventListener('click', function() {--}}
{{--            const positionId = this.getAttribute('data-position-id');--}}

{{--            // Отправляем AJAX-запрос на добавление позиции в корзину--}}
{{--            fetch('/cart/add', {--}}
{{--                method: 'POST',--}}
{{--                headers: {--}}
{{--                    'Content-Type': 'application/json',--}}
{{--                    'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                body: JSON.stringify({ position_id: positionId })--}}
{{--            })--}}
{{--                .then(response => response.json())--}}
{{--                .then(data => {--}}
{{--                    // Обработка ответа от сервера, если необходимо--}}
{{--                })--}}
{{--                .catch(error => {--}}
{{--                    console.error('Ошибка:', error);--}}
{{--                });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}



