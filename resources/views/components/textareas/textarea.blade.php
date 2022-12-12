<textarea name="{{ $name }}" id="{{ $name }}" placeholder="Escreva aqui...">
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