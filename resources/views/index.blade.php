@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

    <div class="main">
        <div class="cards">

            <div class="card">
                <div class="card-content">
                    <div class="number">{{ $datas }}</div>
                    <div class="card-name">Datas Reservadas</div>
                </div>
                <div class="icon-box">
                    <i class="far fa-calendar-alt"></i>
                </div>
            </div>
            

            <div class="card">
                <div class="card-content">
                    <div class="number">${{$totalTodos}}</div>
                    <div class="card-name">Total de Ganhos (Todos os Anos)</div>
                </div>
                <div class="icon-box">
                    <i class="fas fa-dollar-sign"></i>
                </div>
            </div>

        </div>
        <br>
        <h2 class="title">Configurações de preço</h2>
        <div id="cards">
            <div id="card">
                <div class="card-content">
                    <div class="number">R$ {{ $config->entrada_um }}</div>
                    <div class="card-name">Preço entrada (1 dia)</div>
                </div>
                <div class="icon-box">
                    <i class="fas fa-cog"></i>
                </div>
            </div>

            <div id="card">
                <div class="card-content">
                    <div class="number">R$ {{ $config->entrada_dois }}</div>
                    <div class="card-name">Preço entrada (2 dias)</div>
                </div>
                <div class="icon-box">
                    <i class="fas fa-cog"></i>
                </div>
            </div>

            <div id="card">
                <div class="card-content">
                    <div class="number">R$ {{ $config->completo_um }}</div>
                    <div class="card-name">Preço completo (1 dia)</div>
                </div>
                <div class="icon-box">
                    <i class="fas fa-cog"></i>
                </div>
            </div>

            <div id="card">
                <div class="card-content">
                    <div class="number">R$ {{ $config->completo_dois }}</div>
                    <div class="card-name">Preço completo (2 dias)</div>
                </div>
                <div class="icon-box">
                    <i class="fas fa-cog"></i>
                </div>
            </div>

            
            

        </div>
        <div class="charts">

            <div class="chart">

                <h2><i class="fas fa-chart-bar"></i> Ganhos ({{$ano}})</h2>
                <h2>Total : {{$totalAno}} </h2>

                <canvas id="barChart"></canvas>
                <script>
                    new Chart(document.getElementById("barChart"), {
                        type: 'bar',
                        data: {
                            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                            datasets: [{
                                label: 'Ganhos em $',
                                data: [{{$janeiro}}, {{$fevereiro}}, {{$marco}}, {{$abril}}, {{$maio}}, {{$junho}}, {{$julho}}, {{$agosto}}, {{$setembro}}, {{$outubro}}, {{$novembro}}, {{$dezembro}}],
                                backgroundColor: [
                                    'green',
                                ],
                                borderColor: [
                                    'rgb(41, 155, 99, 1)',
                                ],
                                borderWidth: 5
                            }]
                        },
                        options: {
                            responsive: true,
                        }
                    });
                </script>
            </div>

            <div class="chart" id="doughnut-chart">
                <h2><i class="fas fa-chart-pie"></i> Reservas</h2>
                <canvas id="doughnut"></canvas>

                <script>
                    var m1 = 
                    new Chart(document.getElementById("doughnut"), {
                        type: 'doughnut',
                        data: {
                            labels: ['Não-Pago', 'Entrada', 'Completo', ],
                            datasets: [{
                                label: 'Employess',
                                data: [{{$nao_pago}} , {{ $entrada }}, {{$completo}}],
                                backgroundColor: [
                                    "orange",
                                    "green",
                                    "indigo",
                                ],

                            }]
                        },
                        options: {
                            responsive: true,
                        }
                    });
                </script>

            </div>

        </div>

    </div>

@endsection
