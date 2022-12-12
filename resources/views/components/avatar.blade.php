<button id="dropdownUserAvatarButton"
    {{ $attributes->merge([
        'class' => "inline-flex overflow-hidden relative justify-center items-center w-10 h-10 rounded-full $color"
    ]) }}
    type="button">
    <span class="font-medium text-gray-600 uppercase">
        {{ $avatar }}
    </span>
</button>

