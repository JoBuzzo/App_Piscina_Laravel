@props([
    'title', 'value', 'icon' => 'fas fa-dollar-sign'
])


<div class="w-72 md:w-1/2 p-5 rounded-lg flex border">
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