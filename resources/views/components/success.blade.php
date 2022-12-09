<div>
    @if (session('mensagem'))
        <div class="success">
            {{ session('mensagem') }}
        </div>
    @endif
</div>