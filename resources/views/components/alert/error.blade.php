@if ($errors->any())
    <div class="w-full flex p-4 mb-4 text-sm rounded-lg bg-red-200 text-red-800" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Danger</span>
        <div>
            <span class="font-medium">Certifique-se de que estes requisitos sejam atendidos:</span>
            <ul class="mt-1.5 ml-4 text-red-700 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif