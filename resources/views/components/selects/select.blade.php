
<script>
    function mostraCampo1(obj) {
        var select = document.getElementById('valor');
        var txt = document.getElementById("outrainst");
        txt.style.visibility = (select.value == 'OUTRO') 
            ? "visible" 
            : "hidden";  
    }
</script>

<script>
    function mostraCampo2(obj) {
        var select = document.getElementById('valor_total');
        var txt = document.getElementById("outraopcao");
        txt.style.visibility = (select.value == 'OUTRO') 
            ? "visible" 
            : "hidden";  
    }
</script>


<select name="{{ $name }}" id="{{$id}}"  onchange="{{ $onchange }}"
class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:border-gray-200
@if ($errors->has("$name")) text-red-500 border-red-300 @endif">
    {{ $slot}}
</select>


<div>
    @if ($errors->has("$name"))
        <div class="is-invalid">
            @foreach ($errors->get("$name") as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
</div>