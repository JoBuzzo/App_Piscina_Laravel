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
                    <input type="text" placeholder="Informe o nome" value="João Lucas Buzzo">

                    <label for="data">Primeiro Dia de Reserva</label>
                    <input type="date" value="2022-10-30">

                    <label for="data">Último Dia de Reserva</label>
                    <input type="date">

                    <label for="pagamento">Pagamento</label>
                    <select name="pagamento" id="pagamento">
                        <option value="Não-Pago">Não-Pago</option>
                        <option value="Entrada" selected="selected">Entrada</option>
                        <option value="Completo">Completo</option>
                    </select>

                    <label for="valor">Valor pago</label>
                    <input type="text" placeholder="Informe o valor pago" value="R$ 300">

                    <button type="submit">Editar</button>
                </form>
                <form action="/reservas.html">
                    <button class="delete">Excluir</button>
                </form>


            </div>

        </div>
    </div>
@endsection
