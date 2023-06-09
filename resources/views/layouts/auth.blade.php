<div id="auth-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="auth-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900">Укажите номер телефона</h3>
                <form class="space-y-6" action="{{route('register')}}" method="POST">
                    @csrf
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Ваш номер телефона</label>
                        <input type="tel" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="8(900)888-88-88" pattern="8\(\d{3}\)\d{3}-\d{2}-\d{2}" oninput="formatPhoneNumber(this)" required>
                    </div>
                    <button type="submit" class="w-full text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Войти</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function formatPhoneNumber(input) {
        let original = input.value;
        let number = original.replace(/\D/g,'');

        if (number.length > 11) {
            input.setCustomValidity("Номер не должен превышать 11 знаков");
            input.reportValidity();
            return;
        } else {
            input.setCustomValidity("");
        }

        if (number.length > 1) {
            number = number.slice(0,1) + "(" + number.slice(1);
        }
        if (number.length > 5) {
            number = number.slice(0,5) + ")" + number.slice(5);
        }
        if (number.length > 9) {
            number = number.slice(0,9) + "-" + number.slice(9);
        }
        if (number.length > 12) {
            number = number.slice(0,12) + "-" + number.slice(12);
        }
        input.value = number;
    }
</script>