@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

        <div class="main-secundaria">

            <div class="card-container">

                <div class="top"></div>
                <div class="bottom">
                    <form action="#">
                        <label for="name">Nome do Cliente</label>
                        <input type="text" placeholder="Informe o nome">

                        <label for="data">Primeiro Dia de Reserva</label>
                        <input type="date">

                        <label for="data">Último Dia de Reserva</label>
                        <input type="date">

                        <label for="pagamento">Pagamento</label>

                        <select name="pagamento" id="pagamento">
                            <option value="Não-Pago">Não-Pago</option>
                            <option value="Entrada">Entrada</option>
                            <option value="Completo">Completo</option>
                        </select>

                        <label for="valor">Valor pago</label>
                        <input type="text" placeholder="Informe o valor pago">
                        
                        <button type="submit">Adicionar</button>
                    </form>

                </div>

            </div>

@endsection