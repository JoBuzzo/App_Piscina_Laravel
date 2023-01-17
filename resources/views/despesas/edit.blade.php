@extends('app')

@section('title', 'Editar Despesa')

@section('navbar')
    <x-navbar view="despesa" />
    <x-sidebar />
@endsection


@section('content')
    
    <x-form action="{{ route('despesas.update', $despesa->id) }}" method="PUT">
        <div class="mb-6">
            <x-input.textarea name="descricao" label="Descrição" value="{{ $despesa->descricao }}"
                placeholder="Ex: Com o que gastou.." />
        </div>
        <div class="mb-6">
            <x-input.text name="valor" label="Preço" placeholder="Valor gasto..." value="{{ $despesa->valor }}" />
        </div>
        <div class="mb-6">
            <div class="p-2">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input datepicker datepicker-autohide datepicker-title="Data da despesa" type="text" name="data"
                        value="{{ $despesa->data }}" placeholder="Selecione a data" autocomplete="off"
                        datepicker-format="dd/mm/yyyy"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
        </div>
        <div class="flex">
            <x-button.submit>Enviar</x-button.submit>
            <x-button.delete>Excluir</x-button.delete>
        </div>
    </x-form>

    <x-modal.delete action="{{ route('despesas.destroy', $despesa->id) }}" />
    <x-toast.alert />


@endsection


@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
@endsection
