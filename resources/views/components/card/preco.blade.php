@props([
    'title', 'value', 'icon' => 'fas fa-dollar-sign'
])


<div class="w-72 md:w-1/2 p-5 rounded-lg flex text-gray-700 border dark:border-gray-800 dark:bg-gray-700 dark:text-gray-400">
    <div class="w-24 flex items-center">
        <i class="{{ $icon }} font-bold text-5xl"></i>
    </div>
    
    <div class="flex flex-col">
        <div class="w-full font-bold tex-1xl md:text-3xl">
            {{$title}}
        </div>
        <div class="w-full text-2xl">
            <span>{{ $value }}</span>
        </div>
    </div>
</div>