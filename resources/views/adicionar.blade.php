@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

        <div class="main-secundaria">

            <div class="card-container">

                <div id="bottom">
                    <form action="{{ route('reservas.store') }}" method="POST">
                        @csrf
                        <div class="form-group">

                            <div class="input-label">
                                <label for="nome">Nome do Cliente</label>
                                <input  type="text" placeholder="Informe o nome" name="nome" value="{{ old('nome') }}"
                                class="@if ($errors->has('nome')) error @endif">

                                <div>
                                    @if ($errors->has('nome'))
                                        <div class="is-invalid">
                                            @foreach ($errors->get('nome') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="input-label">
                                <label for="data">Primeiro Dia de Reserva</label>
                                <input type="date" name="primeiro_dia" value="{{ old('primeiro_dia') }}"
                                class="@if ($errors->has('primeiro_dia')) error @endif">

                                <div>
                                    @if ($errors->has('primeiro_dia'))
                                        <div class="is-invalid">
                                            @foreach ($errors->get('primeiro_dia') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="input-label">
                                <label for="data">Último Dia de Reserva</label>
                                <input type="date" name="ultimo_dia" value="{{ old('ultimo_dia') }}"
                                class="@if ($errors->has('ultimo_dia')) error @endif">
                                
                                <div>
                                    @if ($errors->has('ultimo_dia'))
                                        <div class="is-invalid">
                                            @foreach ($errors->get('ultimo_dia') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="input-label">
                                <script>
                                    function mostraCampo1(obj) {
                                        var select = document.getElementById('valor');
                                        var txt = document.getElementById("outrainst");
                                        txt.style.visibility = (select.value == 'OUTRO') 
                                            ? "visible" 
                                            : "hidden";  
                                    }
                                </script>
                                <label for="pagamento">Quanto o cliente pagou:</label>

                                <select name="valor_pago" id="valor" onchange="mostraCampo1(this);"
                                class="@if ($errors->has('valor_pago')) error @endif">

                                    <option value="{{ null }}" {{ old('valor_pago') == null ? "selected" : "" }}>
                                        Selecione Aqui
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
                                <input type="text" name="outrainst" id="outrainst" style="visibility: hidden;" value="{{ old('outrainst') ? old('outrainst') : 0 }}">
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
                            
                            <div class="input-label">

                                <script>
                                    function mostraCampo2(obj) {
                                        var select = document.getElementById('valor_total');
                                        var txt = document.getElementById("outraopcao");
                                        txt.style.visibility = (select.value == 'OUTRO') 
                                            ? "visible" 
                                            : "hidden";  
                                    }
                                </script>
                               
                                <label for="pagamento">Preço Total:</label>
                                <select name="valor_total" id="valor_total" onchange="mostraCampo2(this);"
                                class="@if ($errors->has('valor_total')) error @endif">
                                    <option value="{{ null }}" {{ old('valor_total') == null ? "selected" : "" }}>
                                        Selecione Aqui
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
                                
                                <input type="text" name="outraopcao" id="outraopcao" style="visibility: hidden;" value="{{ old('outraopcao') ? old('outraopcao') : 0 }}">
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
                            <div class="input-label">
                                <input type="submit" value="Adicionar">
                            </div>
                        </div>
                    </form>

                </div>

            </div>

@endsection