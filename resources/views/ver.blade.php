@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')


    <div class="main-secundaria">

        <div class="card-container">

            
            <div id="bottom">
                <form action="{{ route('reservas.update', ['id' => $reserva->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="name">Nome do Cliente</label>
                    <input type="text" placeholder="Informe o nome" value="{{ $reserva->nome }}" name="nome">

                    <label for="data">Primeiro Dia de Reserva</label>
                    <input type="date" value="{{ $reserva->primeiro_dia }}" name="primeiro_dia">

                    <label for="data">Último Dia de Reserva</label>
                    <input type="date" value="{{ $reserva->ultimo_dia }}" name="ultimo_dia">


                    
                    <label for="pagamento">Pagamento</label>
                    <select name="pagamento" id="pagamento">

                        @switch($reserva->pagamento)

                            @case($reserva->pagamento === "Não-Pago")
                            <option selected="selected">{{ $reserva->pagamento }}</option>
                            <option value="Entrada">Entrada</option>
                            <option value="Completo">Completo</option>
                            @break

                            @case($reserva->pagamento === "Entrada")
                            <option value="Não-Pago">Não-Pago</option>
                            <option selected="selected">{{ $reserva->pagamento }}</option>
                            <option value="Completo">Completo</option>
                            @break

                            @case($reserva->pagamento === "Completo")
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

                    <label for="valor">Valor pago</label>
                    <input type="text" placeholder="Informe o valor pago" value="{{ $reserva->valor }}" name="valor">

                    <button type="submit">Editar</button>
                </form>
                <center>
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: red"> {{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </center>

                <form action="{{ route('reservas.destroy', ['id' => $reserva->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete">Excluir</button>
                </form>


            </div>

        </div>
    </div>
@endsection
