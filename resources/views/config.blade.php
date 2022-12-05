@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

    <div class="main-secundaria">

        <div class="form-container"> 
                
                <form action="{{ route('config') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="relative z-0 mb-8 w-full group">
                        <input name="entrada_um" id="entrada_um" type="text" value="{{ $config->entrada_um }}" placeholder=" "
                            class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:border-gray-600 peer
                            @if ($errors->has('entrada_um')) text-red-500 border-red-300  @endif"/>
                        <label for="entrada_um" class="whitespace-nowrap peer-focus:font-medium absolute text-xl duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8
                            @if ($errors->has('entrada_um')) text-red-500 border-red-300  @endif">
                            Preço de entrada (1 dia)
                        </label>
                        <div>
                            @if ($errors->has('entrada_um'))
                                <div class="is-invalid">
                                    @foreach ($errors->get('entrada_um') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="relative z-0 mb-8 w-full group">
                        <input name="entrada_dois" id="entrada_dois" type="text" value="{{ $config->entrada_dois }}" placeholder=" "
                            class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:border-gray-600 peer
                            @if ($errors->has('entrada_dois')) text-red-500 border-red-300  @endif"/>
                        <label for="entrada_dois" class="whitespace-nowrap peer-focus:font-medium absolute text-xl duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8
                            @if ($errors->has('entrada_dois')) text-red-500 border-red-300  @endif">
                            Preço de entrada (2 dias)
                        </label>
                        <div>
                            @if ($errors->has('entrada_dois'))
                                <div class="is-invalid">
                                    @foreach ($errors->get('entrada_dois') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="relative z-0 mb-8 w-full group">
                        <input name="completo_um" id="completo_um" type="text" value="{{ $config->completo_um }}" placeholder=" "
                            class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:border-gray-600 peer
                            @if ($errors->has('completo_um')) text-red-500 border-red-300  @endif"/>
                        <label for="completo_um" class="whitespace-nowrap peer-focus:font-medium absolute text-xl duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8
                            @if ($errors->has('completo_um')) text-red-500 border-red-300  @endif">
                            Preço completo (1 dia)
                        </label>
                        <div>
                            @if ($errors->has('completo_um'))
                                <div class="is-invalid">
                                    @foreach ($errors->get('completo_um') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="relative z-0 mb-8 w-full group">
                        <input name="completo_dois" id="completo_dois" type="text" value="{{ $config->completo_dois }}" placeholder=" "
                            class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:border-gray-600 peer
                            @if ($errors->has('completo_dois')) text-red-500 border-red-300  @endif"/>
                        <label for="completo_dois" class="whitespace-nowrap peer-focus:font-medium absolute text-xl duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8
                            @if ($errors->has('completo_dois')) text-red-500 border-red-300  @endif">
                            Preço completo (2 dias)
                        </label>
                        <div>
                            @if ($errors->has('completo_dois'))
                                <div class="is-invalid">
                                    @foreach ($errors->get('completo_dois') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="input-label">
                        <button type="button" data-modal-toggle="popup-modal" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg text-xl px-5 py-2.5 text-center">Salvar</button>
                        <div>
                            @if (session('mensagem'))
                                <div class="success">
                                    {{ session('mensagem') }}
                                </div>
                            @endif
                        </div>
                    </div>
            
                    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <div class="relative bg-white rounded-lg shadow">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="popup-modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-7a2 2 0 012-2h2m3-4H9a2 2 0 00-2 2v7a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-1m-1 4l-3 3m0 0l-3-3m3 3V3"></path></svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500">Tem certeza que deseja editar?</h3>
                                    <button data-modal-toggle="popup-modal" type="submit" class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Salvar
                                    </button>
                                    <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                

            </div> 
        </div>
@endsection
