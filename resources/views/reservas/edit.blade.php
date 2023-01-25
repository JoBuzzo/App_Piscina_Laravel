@extends('app')

@section('title', 'Editar Reserva')

@section('navbar')
    <x-navbar view="reserva" />
    <x-sidebar />
@endsection


@section('content')
<x-form action="{{ route('reservas.update', $reserva->id) }}" method="PUT">
    <div class="mb-6">
            <x-input.text name="nome" label="Nome do cliente" value="{{ $reserva->nome }}"
                placeholder="Nome do cliente..." />
        </div>
        <div class="mb-6">
            <x-input.text name="numero" label="Número do cliente" value="{{ $reserva->numero }}"
                placeholder="Número do cliente..." />
        </div>
        <div class="mb-6">
            <x-input.date value1="{{ $reserva->primeiro_dia }}" value2="{{ $reserva->ultimo_dia }}" />
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <x-input.select name="valor_pago" label="Valor Pago pelo cliente">
                @for ($i = 0; $i <= 2600; $i += 50)
                    <option value="{{ $i }}" {{ $i == $reserva->valor_pago ? 'selected' : '' }}>
                        R${{ $i }}</option>
                @endfor
            </x-input.select>

            <x-input.select name="valor_total" label="Valor cobrado">
                @for ($i = 0; $i <= 2600; $i += 50)
                    <option value="{{ $i }}" {{ $i == $reserva->valor_total ? 'selected' : '' }}>
                        R${{ $i }}
                    </option>
                @endfor
            </x-input.select>

        </div>
        <div class="mb-6">
            <x-input.text name="" class="cursor-not-allowed" disabled label="Faltam receber"
                value="R${{ $reserva->valor_pendente }}" placeholder="" />
        </div>

        <div class="flex">
            <x-button.submit>Enviar</x-button.submit>
            <x-button.delete>Excluir</x-button.delete>
        </div>

    </x-form>
    <x-modal.delete action="{{ route('reservas.destroy', $reserva->id) }}" />
@endsection


@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
    <script src="{{URL::asset('https://code.jquery.com/jquery-3.6.1.min.js') }}" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="{{URL::asset('JS/jquery.mask.js')}}"></script>

    <script>
        $(function() {
            $('#numero').mask('(00) 00000-0000');
        });
    </script>
@endsection
