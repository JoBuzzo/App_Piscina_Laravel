@extends('layouts.template')

@section('content')
    @include('layouts.topbar')

    @include('layouts.sidebar')


    <div class="main-secundaria">

        <div class="table">
            <table>
                <tr>
                    <th class="datas">Datas</th>
                    <th class="nome">Nomes</th>
                    <th>Consultar</th>
                </tr>

                @foreach ($reservas as $reserva)
                    <tr>

                        @if ($reserva->ultimo_dia === null)
                            <td class="datas">{{ date('d/m/Y', strtotime($reserva->primeiro_dia)) }}</td>
                        @else
                            <td class="datas">
                                {{ date('d/m/Y', strtotime($reserva->primeiro_dia)) }} - {{ date('d/m/Y', strtotime($reserva->ultimo_dia)) }}
                            </td>
                        @endif

                        <td class="nome">{{ $reserva->nome }}</td>
                        <td><a href="{{ route('reservas.ver', ['id' => $reserva->id]) }}" class="show">Ver mais</a></td>
                    </tr>
                @endforeach

            </table>
        </div>

        <script src="https://cdn.tailwindcss.com"></script> {{-- Para a Paginação --}}
        <div style="margin-top: 24px;">
            {{ $reservas->appends([
                'search' => request()->get('search', '')
            ])->links() }}
        </div>

    </div>
@endsection
