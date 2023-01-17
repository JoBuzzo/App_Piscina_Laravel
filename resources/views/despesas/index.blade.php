@extends('app')

@section('title', 'Despesas')

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
    <x-navbar view="despesa" />
    <x-sidebar />
@endsection

@section('content')
    

    @if (count($despesas) > 0)

        <div class="overflow-x-auto rounded">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs uppercase text-gray-700 bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Datas
                        </th>
                        <th scope="col" class="mobile-table py-3 px-6">
                            Descrição
                        </th>
                        <th scope="col" class="mobile-table py-3 px-6">
                            Preço
                        </th>
                        <th scope="col" class="py-3 px-2 text-center">
                            Consultar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($despesas as $despesa)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="py-4 px-6">
                                {{ date('d/m/Y', strtotime($despesa->data)) }}
                            </td>
                            <td class="mobile-table py-4 px-6">
                                {{ $despesa->descricao }}
                            </td>
                            <td class="mobile-table py-4 px-6">
                                R${{ $despesa->valor }}
                            </td>

                            <td class="py-4 px-2 text-center">
                                <a href="{{ route('despesas.edit', ['id' => $despesa->id]) }}"
                                    class="font-medium text-blue-600">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-5">
            {{ $despesas->links() }}
        </div>
    @else
        <div class="p-4 text-ls text-blue-700 bg-blue-100 rounded-lg" role="alert">
            <span class="font-bold">404! </span> Não foram encontrados nenhuma despesa.
        </div>

    @endif


@endsection
