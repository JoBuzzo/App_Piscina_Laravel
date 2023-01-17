@extends('app')

@section('title', 'Adicionar Reserva')

@section('navbar')
    <x-navbar view="reserva" />
    <x-sidebar />
@endsection


@section('content')
    <x-form action="{{ route('reservas.store') }}">
        <div class="mb-6">
            <x-input.text name="nome" label="Nome do cliente" value="{{ old('nome') }}" placeholder="Nome do cliente..." />
        </div>
        <div class="mb-6">
            <x-input.text name="numero" label="Número do cliente" value="{{ old('numero') }}" placeholder="Número do cliente..." />
        </div>
        <div class="mb-6">
            <x-input.date value1="{{ old('primeiro_dia') }}" value2="{{ old('ultimo_dia') }}" />
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <x-input.select name="valor_pago" label="Valor Pago pelo cliente">
                
                <option value="" selected>Selecione o valor pago</option>
                @for ($i = 0; $i < 2600; $i += 100)
                    <option value="{{ $i }}">R${{ $i }}</option>
                @endfor
            </x-input.select>

            <x-input.select name="valor_total" label="Valor cobrado">
                <option value="" selected>Selecione o valor cobrado</option>
                @for ($i = 400; $i < 2600; $i += 100)
                    <option value="{{ $i }}">R${{ $i }}</option>
                @endfor
            </x-input.select>
        </div>

        <x-button.submit>Enviar</x-button.submit>
    </x-form>

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

