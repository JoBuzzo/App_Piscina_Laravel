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
                                <label for="pagamento">Pagamento</label>

                                <select name="pagamento" id="pagamento">
                                    <option value="Não-Pago">Não-Pago</option>
                                    <option value="Entrada">Entrada</option>
                                    <option value="Completo">Completo</option>
                                </select>
                            </div>
                            
                            <div class="input-label">
                                <label for="valor">Valor</label>
                                <input type="text" name="valor" value="{{ old('valor') }}" placeholder="informe um valor caso não queira um padrão"
                                class="@if ($errors->has('valor')) error @endif">

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
                            <div class="input-label">
                                <input type="submit" value="Adicionar">
                            </div>
                        </div>
                    </form>

                </div>

            </div>

@endsection