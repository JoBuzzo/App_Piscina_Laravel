@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

        <div class="main-secundaria">

            <div class="form-container">
                <form action="{{ route('despesas.store') }}" method="POST">
                    @csrf
                    <div class="relative z-0 mb-8 w-full group">
                        <x-inputs.text name="descricao" value="{{ old('descricao') }}" label="Descrição" />
                    </div>
                    <div class="relative z-0 mb-8 w-full group">
                        <x-inputs.text name="valor" value="{{ old('valor') }}" label="Preço" />
                    </div>
                    <div class="relative z-0 mb-8 w-full group">
                        <x-inputs.date name="data" value="{{ old('data') }}" label="Data" />
                    </div>

                    <button type="submit" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xl w-full sm:w-auto px-5 py-2.5 text-center">
                        Enviar
                    </button>
                </form>
            </div>
            
        </div>

@endsection