@extends('layouts.template')

@section('content')
    @include('layouts.topbar')

    @include('layouts.sidebar')


    <div class="main-secundaria">
        <div class="table">
            <table>
                <form action="{{ route('reservas') }}" method="GET">
                        <div class="select-rerservas">
                            <select name="select" id="select" id="search">
                                <option>Selecione aqui</option>
                                <option value="andamento">Em andamento</option>
                                <option value="expiradas">Reservas expiradas</option>
                                <option value="todos">Todos</option>
                            </select>
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                </form>

                @if (count($reservas) > 0)
                    <tr>
                        <th class="datas">Datas</th>
                        <th class="nao-importante">Nomes</th>
                        <th class="nao-importante">Pagamento</th>
                        <th>Consultar</th>
                    </tr>
                @else
                    <div class="title">
                        <h1>Reserva não encontrada</h1>
                    </div>
                @endif

                @foreach ($reservas as $reserva)
                    <tr>
                        @if ($reserva->ultimo_dia === null)
                            <td class="datas">{{ date('d/m/Y', strtotime($reserva->primeiro_dia)) }}</td>
                        @else
                            <td class="datas">
                                {{ date('d/m/Y', strtotime($reserva->primeiro_dia)) }} -
                                {{ date('d/m/Y', strtotime($reserva->ultimo_dia)) }}
                            </td>
                        @endif

                        <td class="nao-importante">{{ $reserva->nome }}</td>

                        @if ($reserva->pagamento != 'Não-Pago')
                            <td class="nao-importante">{{ $reserva->pagamento }}: R${{ $reserva->valor }}</td>
                        @else
                            <td class="nao-importante">{{ $reserva->pagamento }}</td>
                        @endif

                        <td><a href="{{ route('reservas.ver', ['id' => $reserva->id]) }}" class="show">Ver mais</a></td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="form-group">
            {{ $reservas->links() }}
        </div>

    </div>
@endsection
