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
                    <div class="number">${{ $totalTodos }}</div>
                    <div class="card-name">Total de Ganhos (Todos os Anos)</div>
                </div>
                <div class="icon-box">
                    <i class="fas fa-dollar-sign"></i>
                </div>
            </div>
        </div>


            <div class="charts">

                <div class="chart space-y-5">

                    <div class="search-ano">
                        <div>
                            <h2><i class="fas fa-chart-bar"></i> Ganhos ({{ $ano }})</h2>
                        </div>
                        <div>
                            <h2>Total: ${{ $totalAno }} </h2>
                        </div>
                        <div class="search-number">
                            <form action="{{ route('index') }}" method="GET">
                                <button type="submit" class="lupa"><i class="fas fa-search"></i></button>
                                <input type="number" name="ano" placeholder="Pesquisar ano"
                                    value="{{ $ano }}">
                            </form>
                        </div>
                    </div>
                    
                    <canvas id="barChart"></canvas>
                    <script>
                        new Chart(document.getElementById("barChart"), {
                            type: 'bar',
                            data: {
                                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                                datasets: [{
                                    label: 'Ganhos em $',
                                    data: [{{ $mes['janeiro'] }}, {{ $mes['fevereiro'] }}, {{ $mes['marco'] }},
                                        {{ $mes['abril'] }}, {{ $mes['maio'] }}, {{ $mes['junho'] }},
                                        {{ $mes['julho'] }}, {{ $mes['agosto'] }}, {{ $mes['setembro'] }},
                                        {{ $mes['outubro'] }}, {{ $mes['novembro'] }}, {{ $mes['dezembro'] }}
                                    ],
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
                                        data: [ {{$pagamentos['nao_pago']}}, {{$pagamentos['entrada']}}, {{$pagamentos['completo']}} ],
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

    @endsection
