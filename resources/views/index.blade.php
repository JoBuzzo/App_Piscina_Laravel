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
            <div class="card">
                <div class="card-content">
                    <div class="number">{{ $despesas['quantia'] }}</div>
                    <div class="card-name">Quantia de despesas</div>
                </div>
                <div class="icon-box">
                    <i class="far fa-file-alt"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="number">${{ $despesas['total'] }}</div>
                    <div class="card-name">Total de despesas</div>
                </div>
                <div class="icon-box">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
            </div>
        </div>


            <div class="charts">
                <div class="chart space-y-5">
                    <div class="flex space-x-2">
                        <h2><i class="fas fa-chart-bar"></i> Estatísticas</h2>
                        
                        <form action="{{ route('index') }}" method="GET">
                            <div class="flex h-6">
                                <span class="inline-flex items-center px-3 text-xs text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                                  <button type="submit"><i class="fas fa-search"></i></button>
                                </span>
                                <input type="number" name="ano" placeholder="Pesquisar ano" value="{{ $ano }}" 
                                    class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 text-xs border-gray-300 w-24 p-2.5 ">
                              </div>
                         
                        </form>
                        
                    </div>
                    <canvas id="barChart"></canvas>
                    <script>
                        new Chart(document.getElementById("barChart"), {
                            type: 'bar',
                            data: {
                                labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                                datasets: [{
                                    label: 'Total: R${{ $total['faltam'] }} - Faltam pagar',
                                    data: [
                                        {{ $faltam['janeiro'] }}, {{ $faltam['fevereiro'] }}, {{ $faltam['marco'] }},
                                        {{ $faltam['abril'] }}, {{ $faltam['maio'] }}, {{ $faltam['junho'] }},
                                        {{ $faltam['julho'] }}, {{ $faltam['agosto'] }}, {{ $faltam['setembro'] }},
                                        {{ $faltam['outubro'] }}, {{ $faltam['novembro'] }}, {{ $faltam['dezembro']}}
                                    ],
                                    backgroundColor: [
                                        'red',
                                    ],
                                    borderColor:[
                                        'red',
                                    ],
                                    borderWidth: 1,
                                },
                                {
                                    label: 'Total: R${{ $total['pagos_parte'] }} - Pagos em parte',
                                    data: [
                                        {{ $pagos_parte['janeiro'] }}, {{ $pagos_parte['fevereiro'] }}, {{ $pagos_parte['marco'] }},
                                        {{ $pagos_parte['abril'] }}, {{ $pagos_parte['maio'] }}, {{ $pagos_parte['junho'] }},
                                        {{ $pagos_parte['julho'] }}, {{ $pagos_parte['agosto'] }}, {{ $pagos_parte['setembro'] }},
                                        {{ $pagos_parte['outubro'] }}, {{ $pagos_parte['novembro'] }}, {{ $pagos_parte['dezembro']}}
                                    ],
                                    backgroundColor: [
                                        'orange',
                                    ],
                                    borderColor:[
                                        'orange',
                                    ],
                                    borderWidth: 1,
                                },
                                {
                                    label: 'Total: R${{ $total['completo'] }} - Pagos por completo',
                                    data: [
                                        {{ $completo['janeiro'] }}, {{ $completo['fevereiro'] }}, {{ $completo['marco'] }},
                                        {{ $completo['abril'] }}, {{ $completo['maio'] }}, {{ $completo['junho'] }},
                                        {{ $completo['julho'] }}, {{ $completo['agosto'] }}, {{ $completo['setembro'] }},
                                        {{ $completo['outubro'] }}, {{ $completo['novembro'] }}, {{ $completo['dezembro'] }}
                                    ],
                                    backgroundColor: [
                                        'green',
                                    ],
                                    borderColor:[
                                        'green',
                                    ],

                                    borderWidth: 1,
                                
                                },
                                {
                                    label: 'Total: R${{$total['geral']}} - Pagos em geral',
                                    data: [
                                        {{ $geral['janeiro'] }}, {{ $geral['fevereiro'] }}, {{ $geral['marco'] }},
                                        {{ $geral['abril'] }}, {{ $geral['maio'] }}, {{ $geral['junho'] }},
                                        {{ $geral['julho'] }}, {{ $geral['agosto'] }}, {{ $geral['setembro'] }},
                                        {{ $geral['outubro'] }}, {{ $geral['novembro'] }}, {{ $geral['dezembro'] }}
                                    ],
                                    backgroundColor: [
                                        'indigo',
                                    ],
                                    borderColor:[
                                        'indigo',
                                    ],
                                    borderWidth: 1,
                                }]
                            },
                            options: {
                                onResize: true
                            }
                        });
                    </script>
                </div>

                <div class="chart" id="pie-chart">
                    <h2><i class="fas fa-chart-pie"></i> Estatísticas de todos anos</h2>
                    <canvas id="pie"></canvas>
                 
                    <script>
                            new Chart(document.getElementById("pie"), {
                                type: 'pie',
                                data: {
                                    labels: [
                                            'Faltam pagar ({{$quantia['valor_pago']}})',
                                            'Pagos em parte ({{$quantia['valor_pendente']}})',
                                            'Pagos por completo ({{$quantia['pagos']}})' ,
                                            'Pagos em geral'
                                        ],
                                    datasets: [{
                                        label: 'Employess',
                                        data: [
                                                {{$pagamentos['valor_pago']}},
                                                {{$pagamentos['valor_pendente']}},
                                                {{$pagamentos['pagos']}},
                                                {{$totalTodos}}
                                            ],
                                        backgroundColor: [
                                            "red",
                                            "orange",
                                            "green",
                                            "indigo",
                                        ],

                                    }]
                                },
                               
                            });
                    </script>

                </div>

            </div>

    @endsection
