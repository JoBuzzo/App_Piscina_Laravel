@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

        <div class="main-secundaria">

            <div class="form-container">
                <form action="{{ route('reservas.store') }}" method="POST">
                    @csrf
                    <div class="relative z-0 mb-8 w-full group">
                        <x-inputs.text name="nome" value="{{ old('nome') }}" label="Nome do Cliente" />
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 mb-8 w-full group">
                            <x-inputs.date name="primeiro_dia" value="{{ old('primeiro_dia') }}" label="Primeiro dia de Reserva" />
                        </div>
                        <div class="relative z-0 mb-8 w-full group">
                            <x-inputs.date name="ultimo_dia" value="{{ old('ultimo_dia') }}" label="Último dia de Reserva" />
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
                                <option value="{{ $config->nao_pago }}"{{ old('valor_pago') === $config->nao_pago ? "selected" : "" }}>
                                    R${{ $config->nao_pago }}
                                </option>
                                <option value="{{ $config->entrada_um }}"{{ old('valor_pago') == $config->entrada_um ? "selected" : "" }}>
                                    R${{ $config->entrada_um }}
                                </option>
                                <option value="{{ $config->entrada_dois }}"{{ old('valor_pago') == $config->entrada_dois ? "selected" : "" }}>
                                    R${{ $config->entrada_dois }}
                                </option>
                                <option value="{{ $config->completo_um }}"{{ old('valor_pago') == $config->completo_um ? "selected" : "" }}>
                                    R${{ $config->completo_um }}
                                </option>
                                <option value="{{ $config->completo_dois }}"{{ old('valor_pago') == $config->completo_dois ? "selected" : "" }}>
                                    R${{ $config->completo_dois }}
                                </option>
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
                                <option value="{{ $config->completo_um }}"{{ old('valor_total') == $config->completo_um ? "selected" : "" }}>
                                    R${{ $config->completo_um }}
                                </option>
                                <option value="{{ $config->completo_dois }}"{{ old('valor_total') == $config->completo_dois ? "selected" : "" }}>
                                    R${{ $config->completo_dois }}
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
                    
                    <x-buttons.submit value="Enviar" />
                </form>
            </div>
            
        </div>

@endsection