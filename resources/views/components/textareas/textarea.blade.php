
<label for="{{ $name }}" class="block mb-2 text-xl font-medium">{{ $label }}</label>
<textarea name="{{ $name }}" id="{{ $name }}" cols="10" rows="4" 
    class="block p-2.5 w-full text-xl text-gray-900 bg-transparent rounded-lg border border-gray-300 focus:outline-none focus:border-gray-600
    @if ($errors->has("$name")) text-red-500 border-red-300 @endif" placeholder="Escreva aqui...">
    {!! $value !!}
</textarea>

<div>
    @if ($errors->has("$name"))
        <div class="is-invalid">
            @foreach ($errors->get("$name") as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
</div>