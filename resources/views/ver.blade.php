@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')


    <div class="main-secundaria">

        <div class="card-container">


            <div id="bottom">
                <div class="form-group">
                    <form action="{{ route('reservas.update', ['id' => $reserva->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="input-label">
                            <label for="name">Nome do Cliente</label>
                            <input type="text" placeholder="Informe o nome" value="{{ $reserva->nome }}" name="nome"
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
                            <input type="date" value="{{ $reserva->primeiro_dia }}" name="primeiro_dia"
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
                            <input type="date" value="{{ $reserva->ultimo_dia }}" name="ultimo_dia"
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

                                @switch($reserva->pagamento)
                                    @case($reserva->pagamento === 'Não-Pago')
                                        <option selected="selected">{{ $reserva->pagamento }}</option>
                                        <option value="Entrada">Entrada</option>
                                        <option value="Completo">Completo</option>
                                    @break

                                    @case($reserva->pagamento === 'Entrada')
                                        <option value="Não-Pago">Não-Pago</option>
                                        <option selected="selected">{{ $reserva->pagamento }}</option>
                                        <option value="Completo">Completo</option>
                                    @break

                                    @case($reserva->pagamento === 'Completo')
                                        <option value="Não-Pago">Não-Pago</option>
                                        <option value="Entrada">Entrada</option>
                                        <option selected="selected">{{ $reserva->pagamento }}</option>
                                    @break

                                    @default
                                        <option value="Não-Pago">Não-Pago</option>
                                        <option value="Entrada">Entrada</option>
                                        <option value="Completo">Completo</option>
                                @endswitch
                            </select>
                        </div>

                        <div class="input-label">
                            <label for="valor">Valor pago</label>
                            <input type="text" placeholder="Informe o valor pago" value="{{ $reserva->valor }}" name="valor"
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
                            <input type="submit" value="Salvar">
                            <div>
                                @if (session('mensagem'))
                                    <div class="success">
                                        <span class="msg">{{ session('mensagem') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>


                    <form action="{{ route('reservas.destroy', ['id' => $reserva->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="input-label">
                            <button class="delete">Excluir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
