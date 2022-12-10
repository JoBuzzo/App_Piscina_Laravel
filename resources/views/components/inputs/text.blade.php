<input name="{{ $name }}" id="{{ $name }}" type="text" value="{{ $value }}" placeholder=" "
    class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:border-gray-600 peer
                        @if ($errors->has("$name")) text-red-500 border-red-300 @endif" />
<label for="{{ $name }}"
    class="whitespace-nowrap peer-focus:font-medium absolute text-xl duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8
                        @if ($errors->has("$name")) text-red-500 border-red-300 @endif">
    {{$label}}
</label>
<div>
    @if ($errors->has("$name"))
        <div class="is-invalid">
            @foreach ($errors->get("$name") as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
</div>
