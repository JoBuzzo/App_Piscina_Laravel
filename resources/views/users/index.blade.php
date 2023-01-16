@extends('app')

@section('title', 'Usúarios')

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
    <x-navbar />
    <x-sidebar />
@endsection

@section('content')
    <x-toast.alert />

        <div class="overflow-x-auto rounded">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs uppercase text-gray-700 bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nome
                        </th>
                       
                        <th scope="col" class="mobile-table py-3 px-6">
                            Login
                        </th>
                        <th scope="col" class="py-3 px-2 text-center">
                            Consultar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="py-4 px-6">
                                {{ $user->name }}
                            </td>
                            <td class="mobile-table py-4 px-6">
                                {{ $user->login }}
                            </td>

                            <td class="py-4 px-2 text-center">
                                <a href="{{ route('users.edit', [ 'login'=> $user->login , 'id' => $user->id ]) }}"
                                    class="font-medium text-blue-600">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



@endsection
