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

                            <x-selects.label  name="valor_pago" value="Valor pago:" for="valor"/>

                            <x-selects.select name="valor_pago" id="valor" onchange="mostraCampo1(this);"> 
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
                            </x-selects.select>

                            <x-selects.input name="outrainst" value="{{ old('outrainst')}}"/>
                            
                        </div>
                        <div class="relative z-0 mb-8 w-full group">

                            <x-selects.label  name="valor_total" value="Valor total:" for="valor_total"/>

                            <x-selects.select name="valor_total" id="valor_total" onchange="mostraCampo2(this);"> 
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
                            </x-selects.select>
                           
                            <x-selects.input name="outraopcao" value="{{ old('outraopcao')}}"/>

                        </div>
                        
                    </div>
                    
                    <x-buttons.submit value="Enviar" />
                </form>
            </div>
            
        </div>

@endsection