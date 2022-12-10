<label for="{{ $for }}"
    class="whitespace-nowrap block mb-2 text-xl font-medium 
    @if ($errors->has("$name")) text-red-500 border-red-300 @endif">
    {{ $value }}
</label>
