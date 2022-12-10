<input type="text" name="{{ $name }}" id="{{ $name }}" style="visibility: hidden;" value="{{ $value }}"
    class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:border-gray-600
                        @if ($errors->has("$name")) text-red-500 border-red-300 @endif">
<div>
    @if ($errors->has("$name"))
        <div class="is-invalid">
            @foreach ($errors->get("$name") as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
</div>
