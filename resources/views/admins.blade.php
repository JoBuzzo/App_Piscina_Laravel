@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')


    <div class="main-secundaria">

        <div class="table w-3/4 sm:rounded-lg space-y-5">
                
            <table class="w-full text-left text-gray-500">
                <thead class="text-white uppercase bg-gray-800">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nome
                        </th>
                        <th scope="col" class="nao-importante py-3 px-6">
                            Login
                        </th>
                        <th scope="col" class="py-3 px-2 text-center">
                            Consultar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr class="border-b bg-white hover:bg-gray-50">

                            <td class="py-4 px-6">
                                {{$admin->name}}
                            </td>
                            <td class="nao-importante py-4 px-6">
                                {{$admin->login}}
                            </td>
                            
                            <td class="py-4 px-2 text-center">
                                <a href="{{ route('perfil', ['id' => $admin->id]) }}" class="font-medium text-blue-600">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
@endsection
