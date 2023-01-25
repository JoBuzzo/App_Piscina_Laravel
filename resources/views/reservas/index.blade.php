@extends('app')

@section('title', 'Reservas')

@section('head')
    <style>
        input[type="month"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            filter: invert(0.8) brightness(100%) sepia(0%) saturate(1000%) hue-rotate(240deg);
        }

        @media (max-width:880px) {
            .mobile-table {
                display: none;
            }
        }
    </style>
@endsection




@section('navbar')
    <x-navbar view="reserva" />
    <x-sidebar />
@endsection

@section('content')
    <div class="space-y-5 p-1">

        <div class="flex items-center justify-between pb-4">
            <x-search.filter :filter="$filter" />

            <x-search.pdf />
        </div>

        @if (count($reservas) > 0)

            <div class="overflow-x-auto rounded">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs uppercase text-gray-700 bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Datas
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Nomes
                            </th>
                            <th scope="col" class="mobile-table py-3 px-6">
                                Número
                            </th>
                            <th scope="col" class="mobile-table py-3 px-6">
                                Preço
                            </th>
                            <th scope="col" class="mobile-table py-3 px-6">
                                Pagou
                            </th>
                            <th scope="col" class="mobile-table py-3 px-6">
                                Faltam
                            </th>
                            <th scope="col" class="py-3 px-2 text-center">
                                Consultar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservas as $reserva)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="py-4 px-6">
                                    @if ($reserva->ultimo_dia != $reserva->primeiro_dia)
                                        <div class="flex flex-col items-center justify-center">
                                            <span>{{ date('d/m/Y', strtotime($reserva->primeiro_dia)) }}</span>
                                            <span>{{ date('d/m/Y', strtotime($reserva->ultimo_dia)) }}</span>
                                        </div>
                                    @else
                                        {{ date('d/m/Y', strtotime($reserva->primeiro_dia)) }}
                                    @endif
                                </td>
                                <td class="py-4 px-6">
                                    {{ $reserva->nome }}
                                </td>
                                <td class="mobile-table py-4 px-6">
                                    <x-whatsapp :value="$reserva->numero" />
                                </td>
                                <td class="mobile-table py-4 px-6 text-green-400 dark:text-green-300">
                                    R${{ $reserva->valor_total }}
                                </td>
                                <td
                                    class="mobile-table py-4 px-6 @if ($reserva->valor_pago === $reserva->valor_total) text-green-400 dark:text-green-300 @else text-orange-500 dark:text-orange-300 @endif">
                                    R${{ $reserva->valor_pago }}
                                </td>
                                <td
                                    class="mobile-table py-4 px-6 @if ($reserva->valor_pendente > 0) text-red-500 dark:text-red-700 @else text-green-400 dark:text-green-300 @endif">
                                    R${{ $reserva->valor_pendente }}
                                </td>

                                <td class="py-4 px-2 text-center">
                                    <a href="{{ route('reservas.edit', $reserva->id) }}"
                                        class="font-medium text-blue-600">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-5">
                <x-pagination :link="$reservas" />
            </div>
        @else
            <div class="p-4 text-ls text-blue-700 bg-blue-100 rounded-lg" role="alert">
                <span class="font-bold">404! </span> Não foram encontrados nenhuma reserva.
            </div>

        @endif
    </div>


@endsection
