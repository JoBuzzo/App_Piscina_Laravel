@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

        <div class="main-secundaria">

            <div class="form-container">
                <form action="{{ route('despesas.update', ['id' => $despesa->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="relative z-0 mb-8 w-full group">
                        <x-inputs.text name="descricao" value="{{ $despesa->descricao }}" label="Descrição" />
                    </div>
                    <div class="relative z-0 mb-8 w-full group">
                        <x-inputs.text name="valor" value="{{ $despesa->valor }}" label="Preço" />
                    </div>
                    <div class="relative z-0 mb-8 w-full group">
                        <x-inputs.date name="data" value="{{ $despesa->data }}" label="Data" />
                    </div>

                    <button type="submit" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xl w-full sm:w-auto px-5 py-2.5 text-center">
                        Enviar
                    </button>
                    <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-xl px-5 py-2.5 text-center" 
                        type="button" data-modal-toggle="popup-modal">
                        Excluir
                    </button>
                    @include('components.success')
                </form>


                <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                    <div class="relative w-full h-full max-w-md md:h-auto">
                        <div class="relative bg-white rounded-lg shadow">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="popup-modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-6 text-center">
                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 ">Deseja mesmo excluir essa despesa?</h3>
                                <form action="{{ route('despesas.destroy', ['id' => $despesa->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button data-modal-toggle="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xl px-5 py-2.5 w-1/2 text-center m-1.5">
                                        Excluir
                                    </button>
                                </form>
                                <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-lg border border-gray-200 text-xl font-medium px-5 py-2.5 w-1/2 hover:text-gray-900 focus:z-10 m-1.5">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            
        </div>

@endsection