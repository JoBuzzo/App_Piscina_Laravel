@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')


    <div class="main-secundaria">

        <div class="form-container">

            <form action="{{ route('reservas.update', ['id' => $reserva->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="relative z-0 mb-8 w-full group">
                    <x-inputs.text name="nome" value="{{ $reserva->nome }}" label="Nome do Cliente" />
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">

                    <div class="relative z-0 mb-8 w-full group">
                        <x-inputs.date name="primeiro_dia" value="{{ $reserva->primeiro_dia }}" label="Primeiro Dia de Reserva"/>
                    </div>

                    <div class="relative z-0 mb-8 w-full group">
                        <x-inputs.date name="ultimo_dia" value="{{ $reserva->ultimo_dia }}" label="Último Dia de Reserva"/>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 mb-8 w-full group">
                        <script>
                            function mostraCampo1(obj) {
                                var select = document.getElementById('valor');
                                var txt = document.getElementById("outrainst");
                                txt.style.visibility = (select.value == 'OUTRO') 
                                    ? "visible" 
                                    : "hidden";  
                            }
                        </script>
                        
                        <label class="whitespace-nowrap block mb-2 text-xl font-medium @if ($errors->has('valor_pago'))text-red-500 border-red-300 @endif">Valor pago:</label>
                        <select name="valor_pago" id="valor" onchange="mostraCampo1(this);"
                        class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:border-gray-200
                        @if ($errors->has('valor_pago'))text-red-500 border-red-300 @endif">

                            <option value="{{ null }}" {{ old('valor_pago') == null ? "selected" : "" }}>
                                Selecione aqui
                            </option>
                            <option value="{{ $reserva->valor_pago }}" selected>
                                R${{ $reserva->valor_pago }}
                            </option>
                            @if ($reserva->valor_pendente > 0)
                                <option value="{{ $reserva->valor_total }}">
                                    R${{ $reserva->valor_total }}
                                </option>
                            @endif
                            <option value="OUTRO" {{ old('valor_pago') == "OUTRO" ? "selected" : "" }}>
                                Outro
                            </option>

                        </select>
                        <div>
                            @if ($errors->has('valor_pago'))
                                <div class="is-invalid">
                                    @foreach ($errors->get('valor_pago') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <input type="text" name="outrainst" id="outrainst" style="visibility: hidden;" value="{{ old('outrainst')}}" 
                        class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:border-gray-600
                        @if ($errors->has('outrainst')) text-red-500 border-red-300  @endif">
                        <div>
                            @if ($errors->has('outrainst'))
                            <div class="is-invalid">
                                @foreach ($errors->get('outrainst') as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="relative z-0 mb-8 w-full group">
                        <script>
                            function mostraCampo2(obj) {
                                var select = document.getElementById('valor_total');
                                var txt = document.getElementById("outraopcao");
                                txt.style.visibility = (select.value == 'OUTRO') 
                                    ? "visible" 
                                    : "hidden";  
                            }
                        </script>
                        <label class="whitespace-nowrap block mb-2 text-xl font-medium @if ($errors->has('valor_total'))text-red-500 border-red-300 @endif">Valor total:</label>
                        <select name="valor_total" id="valor_total" onchange="mostraCampo2(this);"
                        class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:border-gray-200
                        @if ($errors->has('valor_total'))text-red-500 border-red-300 @endif">

                            <option value="{{ null }}" {{ old('valor_total') == null ? "selected" : "" }}>
                                Selecione aqui
                            </option>
                            <option value="{{ $reserva->valor_total }}" selected>
                                R${{ $reserva->valor_total }}
                            </option>
                            <option value="OUTRO"{{ old('valor_total') == "OUTRO" ? "selected" : "" }}>
                                Outro
                            </option>

                        </select>
                        <div>
                            @if ($errors->has('valor_total'))
                                <div class="is-invalid">
                                    @foreach ($errors->get('valor_total') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <input type="text" name="outraopcao" id="outraopcao" style="visibility: hidden;" value="{{ old('outraopcao')}}" 
                        class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:border-gray-600
                        @if ($errors->has('outrainst')) text-red-500 border-red-300  @endif">
                        <div>
                            @if ($errors->has('outraopcao'))
                            <div class="is-invalid">
                                @foreach ($errors->get('outraopcao') as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div> 
                </div>
                

                <label class="whitespace-nowrap block mb-2 text-xl font-medium">Quanto falta pagar:</label>
                <input type="text" value="R${{ $reserva->valor_pendente }}" disabled class="block py-2.5 px-0 text-xl bg-transparent border-0 border-b-2 border-gray-300 mb-10"/>

                <button type="submit" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg text-xl px-5 py-2.5 text-center">
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
                            <h3 class="mb-5 text-lg font-normal text-gray-500 ">Deseja mesmo excluir essa reserva?</h3>
                            <form action="{{ route('reservas.destroy', ['id' => $reserva->id]) }}" method="POST">
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
