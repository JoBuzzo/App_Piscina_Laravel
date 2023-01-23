@extends('app')

@section('title', 'Reservas')

@section('head')
    <style>
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
            <div>
                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600"
                    type="button">
                    <svg class="mr-2 w-4 h-4 text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    @if ($filter)
                        {{ $filter }}
                    @else
                        Buscar
                    @endif
                    <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <form action="{{ route('reservas.index') }}" method="GET">
                    <div id="dropdownRadio"
                        class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input @if ($filter === 'Proximas') checked="" @endif id="filter-radio-1"
                                        type="radio" value="Proximas" name="filter"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-1"
                                        class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Proximas
                                        Datas</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input @if ($filter === 'Vencidas') checked="" @endif id="filter-radio-2"
                                        type="radio" value="Vencidas" name="filter"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-2"
                                        class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Datas
                                        Vencidas</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input @if ($filter === 'Todas') checked="" @endif id="filter-radio-3"
                                        type="radio" value="Todas" name="filter"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-3"
                                        class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Todas
                                        Datas</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input @if ($filter === 'Hoje') checked="" @endif id="filter-radio-4"
                                        type="radio" value="Hoje" name="filter"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-4"
                                        class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Hoje</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <button type="submit" class="dark:text-gray-200 w-full text-left">Pesquisar</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </form>
                
            </div>
            <div>
                <button id="dataButton" data-dropdown-toggle="dataInput"
                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600"
                    type="button">
                        PDF Reservas Disponiveis
                    <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <form action="{{ route('reservas.pdf') }}" method="POST" target="_blank">
                    @csrf
                    <div id="dataInput"
                        class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dataButton">
                            <li>
                                <div>
                                    <label for="mes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione o mês</label>
                                    <input type="month" name="mes" id="mes" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <button type="submit" class="dark:text-gray-200 w-full text-left">Baixar</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </form>
                
            </div>
            
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
                                    <x-whatsapp :value="$reserva->numero"/>
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
