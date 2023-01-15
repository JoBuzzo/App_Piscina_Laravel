@props(['name', 'label', 'placeholder' => null, 'value' => null])




<div class="p-2 w-96">
    <label for="{{ $name }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}">{{ $value }}</textarea>
</div>
