@php
    if ($errors->has("$name")){
     $error = "border border-red-500 dark:border-red-500 dark:text-red-600 focus:ring-red-500 focus:border-red-500 dark:focus:ring-red-500 dark:focus:border-red-500";
    }else {
        $error = '';
    }
@endphp

@props([
    'name', 'label', 'placeholder' => null, 'value' => null,
])

<div class="p-2 relative">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <input type="text" {{ $attributes->merge([
        'class' => "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        ."$error"
    ]) }} id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}">
    <div>
        @if ($errors->has("$name"))
            <div class="absolute text-red-500 border-red-300 text-sm">
                @foreach ($errors->get("$name") as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
    </div>
</div>
