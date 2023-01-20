@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

        <div class="main-secundaria">

            <div class="form-container">
                <form action="{{ route('despesas.store') }}" method="POST">
                    @csrf
                    <div class="relative z-0 mb-8 w-full group">
                        <x-textareas.textarea name="descricao" value="{{ old('descricao') }}"/>
                    </div>
                    <div class="relative z-0 mb-8 w-full group">
                        <x-inputs.text name="valor" value="{{ old('valor') }}" label="Preço" />
                    </div>
                    <div class="relative z-0 mb-8 w-full group">
                        <x-inputs.date name="data" value="{{ old('data') }}" label="Data" />
                    </div>

                    <x-buttons.submit value="Enviar" />
                    
                </form>
            </div>
            
        </div>

@endsection