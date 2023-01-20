@props(['value1' => null,'value2' => null])

<div>
    <div date-rangepicker datepicker-autohide datepicker-format="dd/mm/yyyy" class="flex justify-center items-center p-2">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input name="primeiro_dia" value="{{ $value1 }}" type="text" datepicker-format="dd/mm/yyyy" autocomplete="off"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                @if ($errors->has("primeiro_dia")) border border-red-500 dark:border-red-500 dark:text-red-600 focus:ring-red-500 focus:border-red-500 dark:focus:ring-red-500 dark:focus:border-red-500 @endif"
                placeholder="Data de início">
                <div>
                    @if ($errors->has("primeiro_dia"))
                        <div class="absolute text-red-500 border-red-300 text-sm">
                            @foreach ($errors->get("primeiro_dia") as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
        </div>
        <span class="mx-4 text-gray-500 dark:text-gray-200">até</span>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input name="ultimo_dia" value="{{ $value2 }}" type="text" datepicker-format="dd/mm/yyyy" autocomplete="off" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                @if ($errors->has("ultimo_dia")) border border-red-500 dark:border-red-500 dark:text-red-600 focus:ring-red-500 focus:border-red-500 dark:focus:ring-red-500 dark:focus:border-red-500 @endif"
                placeholder="Data final">
                <div>
                    @if ($errors->has("ultimo_dia"))
                        <div class="absolute text-red-500 border-red-300 text-sm">
                            @foreach ($errors->get("ultimo_dia") as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
        </div>
    </div>
</div>
