@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

        <div class="main-secundaria">

            <div class="card-container">

                <div class="bottom">
                    <form action="{{ route('reservas.store') }}" method="POST">
                        @csrf
                        <label for="nome">Nome do Cliente</label>
                        <input  type="text" placeholder="Informe o nome" name="nome" value="{{ old('nome') }}">

                        <label for="data">Primeiro Dia de Reserva</label>
                        <input type="date" name="primeiro_dia" value="{{ old('primeiro_dia') }}">

                        <label for="data">Último Dia de Reserva</label>
                        <input type="date" name="ultimo_dia" value="{{ old('ultimo_dia') }}">

                        <label for="pagamento">Pagamento</label>

                        <select name="pagamento" id="pagamento">
                            <option value="Não-Pago">Não-Pago</option>
                            <option value="Entrada">Entrada</option>
                            <option value="Completo">Completo</option>
                        </select>

                        <label for="valor">Valor pago</label>
                        <input  type="text" name="valor" placeholder="Informe o valor pago" value="{{ old('valor') }}">
                        
                        <button type="submit">Adicionar</button>
                    </form>

                </div>


                <center>
                    @if ($errors->any())
                    <ul style="list-style: none">
                        @foreach ($errors->all() as $error)
                        <li style="color: red"> {{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </center>

            </div>

@endsection