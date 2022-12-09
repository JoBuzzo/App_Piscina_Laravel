@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

        <div class="main-secundaria">

            <div class="form-container">
                <form action="{{ route('despesas.store') }}" method="POST">
                    @csrf
                    <div class="relative z-0 mb-8 w-full group">
                        <input name="descricao" id="descricao" type="text" value="{{ old('descricao') }}" placeholder=" "
                        class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:border-gray-600 peer
                        @if ($errors->has('descricao')) text-red-500 border-red-300  @endif"/>
                        <label for="descricao" class="whitespace-nowrap peer-focus:font-medium absolute text-xl duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8
                        @if ($errors->has('descricao')) text-red-500 border-red-300  @endif">
                            Descrição
                        </label>
                        <div>
                            @if ($errors->has('descricao'))
                                <div class="is-invalid">
                                    @foreach ($errors->get('descricao') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="relative z-0 mb-8 w-full group">
                        <input name="valor" id="valor" type="text" value="{{ old('valor') }}" placeholder=" "
                        class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:border-gray-600 peer
                        @if ($errors->has('valor')) text-red-500 border-red-300  @endif"/>
                        <label for="valor" class="whitespace-nowrap peer-focus:font-medium absolute text-xl duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8
                        @if ($errors->has('valor')) text-red-500 border-red-300  @endif">
                            Preço
                        </label>
                        <div>
                            @if ($errors->has('valor'))
                                <div class="is-invalid">
                                    @foreach ($errors->get('valor') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="relative z-0 mb-8 w-full group">
                        <input name="data" id="data" type="date" value="{{ old('data') }}" placeholder=" "
                        class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:border-gray-600 peer
                        @if ($errors->has('data')) text-red-500 border-red-300  @endif"/>
                        <label for="data" class="whitespace-nowrap peer-focus:font-medium absolute text-xl duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8
                        @if ($errors->has('data')) text-red-500 border-red-300  @endif">
                            Data
                        </label>
                        <div>
                            @if ($errors->has('data'))
                                <div class="is-invalid">
                                    @foreach ($errors->get('data') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xl w-full sm:w-auto px-5 py-2.5 text-center">
                        Enviar
                    </button>
                </form>
            </div>
            
        </div>

@endsection