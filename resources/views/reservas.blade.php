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
                            @switch($select)
                                @case($select === 'andamento')
                                    <option value="andamento" selected="selected">Proximas Datas</option>
                                    <option value="expiradas">Datas Vencidas</option>
                                    <option value="todos">Todas Datas</option>
                                @break

                                @case($select === 'expiradas')
                                    <option value="andamento">Proximas Datas</option>
                                    <option value="expiradas" selected="selected">Datas Vencidas</option>
                                    <option value="todos">Todas Datas</option>
                                @break

                                @case($select === 'todos')
                                    <option value="andamento">Proximas Datas</option>
                                    <option value="expiradas">Datas Vencidas</option>
                                    <option value="todos" selected="selected">Todas Datas</option>
                                @break

                                @default
                                    <option value="andamento">Proximas Datas</option>
                                    <option value="expiradas">Datas Vencidas</option>
                                    <option value="todos">Todas Datas</option>
                            @endswitch
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
                            <td class="datas" style="@if (date('Y-m-d') == $reserva->primeiro_dia) font-weight:bold @endif">
                                @if (date('Y-m-d') == $reserva->primeiro_dia)
                                    Hoje
                                @else
                                    {{ date('d/m/Y', strtotime($reserva->primeiro_dia)) }}
                                @endif

                            </td>
                        @else
                            <td class="datas" style="@if (date('Y-m-d') == $reserva->primeiro_dia) font-weight:bold @endif">
                                @if (date('Y-m-d') == $reserva->primeiro_dia)
                                    Hoje e {{ date('d/m/Y', strtotime($reserva->ultimo_dia)) }}
                                @else
                                    {{ date('d/m/Y', strtotime($reserva->primeiro_dia)) }} -
                                    {{ date('d/m/Y', strtotime($reserva->ultimo_dia)) }}
                                @endif
                            </td>
                        @endif

                        <td class="nao-importante" style="@if (date('Y-m-d') == $reserva->primeiro_dia) font-weight:bold @endif">
                            {{ $reserva->nome }}</td>

                        @if ($reserva->pagamento != 'Não-Pago')
                            <td class="nao-importante" style="@if (date('Y-m-d') == $reserva->primeiro_dia) font-weight:bold @endif">
                                {{ $reserva->pagamento }}: R${{ $reserva->valor }}</td>
                        @else
                            <td class="nao-importante" style="@if (date('Y-m-d') == $reserva->primeiro_dia) font-weight:bold @endif">
                                {{ $reserva->pagamento }}</td>
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
