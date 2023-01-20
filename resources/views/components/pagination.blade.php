
@if ($link->count() > 1)
<nav>
    <ul class="inline-flex space-x-px">
        <li>
            <a href="{{ $link->previousPageUrl() }}"
                class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Voltar
            </a>
        </li>
        @for ($i = 1; $i <= $link->lastPage(); $i++)
            <li>
                <a class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white
                {{ $link->currentPage() == $i ? 'text-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white' : '' }}" href="{{ $link->url($i) }}">
                {{ $i }}
                </a>
            </li>
        @endfor
        <li>
            <a href="{{ $link->nextPageUrl() }}"
                class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Avançar
            </a>
        </li>
    </ul>
</nav>
@endif