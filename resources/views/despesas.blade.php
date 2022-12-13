@extends('layouts.template')

@section('content')
    @include('layouts.topbar')

    @include('layouts.sidebar')

    <div class="main-secundaria">
        <div class="table w-3/4 sm:rounded-lg space-y-5">
            <div class="flex justify-between items-center pb-4 space-x-2">
                
                <div>
                    <a href="{{route('despesas.adicionar')}}"
                    class="bg-gray-100 text-gray-500 text-sm font-bold whitespace-nowrap mr-2 px-2.5 py-2 rounded mobile-table">
                        <i class="fas fa-file-medical"></i> Adicionar
                    </a>
                </div>
                <div class="search">
                    <form action="{{ route('despesas') }}" method="GET">
                        <button type="submit" class="lupa"><i class="fas fa-search"></i></button>
                        <input type="search" id="search" placeholder="Pesquisar..." name="search"
                            @if (isset($search)) value="{{ $search }}" @endif>
                    </form>
                </div>
                
                

            </div>
            @if (count($despesas) > 0)
                
            <table class="w-full text-left text-gray-500 font-bold">
                <thead class="text-white uppercase bg-gray-800">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Datas
                        </th>
                        <th scope="col" class="mobile-table py-3 px-6">
                            Descrição
                        </th>
                        <th scope="col" class="mobile-table-valor py-3 px-6">
                            Preço
                        </th>
                        
                        <th scope="col" class="py-3 px-2 text-center">
                            Consultar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($despesas as $despesa)
                    <tr class="border-b bg-white hover:bg-gray-50">

                        <td class="py-4 px-6">
                           
                            {{ date('d/m/Y', strtotime($despesa->data)) }}
                            
                        </td>
                        <td class="mobile-table mobile-table-descricao py-4 px-6">
                            {!!$despesa->descricao!!}
                        </td>
                        <td class="mobile-table-valor py-4 px-6">
                            R${{$despesa->valor}}
                        </td>
                     
                     
                    
                        <td class="py-4 px-2 text-center">
                            <a href="{{ route('despesas.edit', ['id' => $despesa->id]) }}" class="font-medium text-blue-600">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $despesas->links() }}
            @else

            <div class="p-4 mb-4 text-ls text-blue-700 bg-blue-100 rounded-lg" role="alert">
                <span class="font-bold">404! </span> Não foram encontrados nenhuma despesa.
              </div>

            @endif
        </div>

    </div>
@endsection
