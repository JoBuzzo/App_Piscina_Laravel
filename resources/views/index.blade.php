@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

    <div class="main">
        <div class="cards">

            <div class="card">
                <div class="card-content">
                    <div class="number">10</div>
                    <div class="card-name">Datas Reservadas</div>
                </div>
                <div class="icon-box">
                    <i class="far fa-calendar-alt"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="number">6</div>
                    <div class="card-name">Total de Alugueis</div>
                </div>
                <div class="icon-box">
                    <i class="fas fa-search-dollar"></i>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="number">$1000</div>
                    <div class="card-name">Ganhos</div>
                </div>
                <div class="icon-box">
                    <i class="fas fa-dollar-sign"></i>
                </div>
            </div>

        </div>
        <div class="charts">

            <div class="chart">

                <h2><i class="fas fa-chart-area"></i> Ganhos (últimos 12 meses)</h2>
                <h2>Total : R$40000</h2>

                <canvas id="lineChart"></canvas>
                <script>
                    new Chart(document.getElementById("lineChart"), {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                            datasets: [{
                                label: 'Ganhos em $',
                                data: [3000, 4600, 3500, 2500, 1700, 2000, 2100, 2300, 3450, 4950, 4300, 4900],
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
                    new Chart(document.getElementById("doughnut"), {
                        type: 'doughnut',
                        data: {
                            labels: ['Não-Pago', 'Entrada', 'Completo', ],
                            datasets: [{
                                label: 'Employess',
                                data: [2, 7, 1],
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
