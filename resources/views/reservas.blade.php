@extends('layouts.template')

@section('content')
    @include('layouts.topbar')

    @include('layouts.sidebar')

    <div class="main-secundaria">
        <div class="table w-3/4 sm:rounded-lg space-y-5">
            <div class="flex justify-between items-center pb-4 space-x-2">
                <div>
                    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5" type="button">
                        <svg class="mr-2 w-4 h-4 text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                        @if ($filter)
                            {{$filter}}
                        @else
                            Buscar
                        @endif
                        <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <!-- Dropdown menu -->
                    <form action="{{ route('reservas') }}" method="GET">
                        <div id="dropdownRadio" class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                            <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <input @if ($filter === "Proximas") checked="" @endif  id="filter-radio-1" type="radio" value="Proximas" name="filter" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 focus:ring-gray-500">
                                        <label for="filter-radio-1" class="ml-2 w-full text-sm font-medium text-gray-900 rounded">Proximas Datas</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <input @if ($filter === "Vencidas") checked="" @endif id="filter-radio-2" type="radio" value="Vencidas" name="filter" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 focus:ring-gray-500">
                                        <label for="filter-radio-2" class="ml-2 w-full text-sm font-medium text-gray-900 rounded">Datas Vencidas</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <input @if ($filter === "Todas") checked="" @endif id="filter-radio-3" type="radio" value="Todas" name="filter" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 focus:ring-gray-500">
                                        <label for="filter-radio-3" class="ml-2 w-full text-sm font-medium text-gray-900 rounded">Todas Datas</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <input @if ($filter === "Hoje") checked="" @endif id="filter-radio-4" type="radio" value="Hoje" name="filter" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 focus:ring-gray-500">
                                        <label for="filter-radio-4" class="ml-2 w-full text-sm font-medium text-gray-900 rounded">Hoje</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <button type="submit" class="w-4 h-4 bg-gray-100 border-gray-300">Pesquisar</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div>
                    <a href="{{route('reservas.adicionar')}}"
                    class="bg-gray-100 text-gray-500 text-sm font-bold whitespace-nowrap mr-2 px-2.5 py-2 rounded mobile-table">
                        <i class="fas fa-calendar-plus"></i> Adicionar
                    </a>
                </div>
                <div class="search">
                    <form action="{{ route('reservas') }}" method="GET">
                        <button type="submit" class="lupa"><i class="fas fa-search"></i></button>
                        <input type="search" id="search" placeholder="Pesquisar..." name="search"
                            @if (isset($search)) value="{{ $search }}" @endif>
                    </form>
                </div>
                
                <div class="flex">
                    <span class="bg-green-100 text-green-500 text-sm font-bold whitespace-nowrap mx-2 px-2.5 py-1 rounded mobile-table-valor">Pago</span>
                    <span class="bg-gray-100 text-gray-500 text-sm font-bold whitespace-nowrap mx-2 px-2.5 py-1 rounded mobile-table-valor">Em haver</span>
                </div>

            </div>
            @if (count($reservas) > 0)
                
            <table class="w-full text-left text-gray-500 font-bold">
                <thead class="text-white uppercase bg-gray-800">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Datas
                        </th>
                        <th scope="col" class="mobile-table py-3 px-6">
                            Nomes
                        </th>
                        <th scope="col" class="mobile-table-valor py-3 px-6">
                            Preço
                        </th>
                        <th scope="col" class="mobile-table py-3 px-6">
                            Pagou
                        </th>
                        <th scope="col" class="mobile-table-valor py-3 px-6">
                            Faltam
                        </th>
                        <th scope="col" class="py-3 px-2 text-center">
                            Consultar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                    <tr class="border-b @if ($reserva->valor_pago === $reserva->valor_total) bg-green-100 @endif bg-white hover:bg-gray-50">

                        <td class="py-4 px-6">
                            @if ($reserva->ultimo_dia)
                                {{ date('d/m/Y', strtotime($reserva->primeiro_dia)) }} &
                                {{ date('d/m/Y', strtotime($reserva->ultimo_dia)) }}
                            @else
                                {{ date('d/m/Y', strtotime($reserva->primeiro_dia)) }}
                            @endif
                        </td>
                        <td class="mobile-table py-4 px-6">
                            {{$reserva->nome}}
                        </td>
                        <td class="mobile-table-valor py-4 px-6 text-green-500">
                            R${{$reserva->valor_total}}
                        </td>
                        <td class="mobile-table py-4 px-6 @if ($reserva->valor_pago === $reserva->valor_total) text-green-500 @else text-orange-400 @endif">
                            R${{$reserva->valor_pago}}
                        </td>
                        <td class="mobile-table-valor py-4 px-6 @if ($reserva->valor_pendente > 0) text-red-500 @else text-green-500 @endif">
                            R${{$reserva->valor_pendente}}
                        </td>
                    
                        <td class="py-4 px-2 text-center">
                            <a href="{{ route('reservas.ver', ['id' => $reserva->id]) }}" class="font-medium text-blue-600">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $reservas->links() }}
            @else

            <div class="p-4 mb-4 text-ls text-blue-700 bg-blue-100 rounded-lg" role="alert">
                <span class="font-bold">404! </span> Não foram encontrados nenhuma reserva.
              </div>

            @endif
        </div>

    </div>
@endsection
