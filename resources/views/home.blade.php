@extends('app')

@section('title', 'Início')

@section('navbar')
    <x-navbar view="home" />
    <x-sidebar />
@endsection

@section('content')

    <div class="flex flex-col justify-center items-center gap-4">
        <div class="flex flex-wrap justify-center items-center gap-2">
            <x-card.preco title="Reservas em R$" value="R$" />
            <x-card.preco title="Despesas em R$" value="-R$" />
            <x-card.total title="Total de reservas" value="" icon="fas fa-file-alt" />
            <x-card.total title="Total de despesas" value="" />
        </div>

        <div class="flex flex-wrap justify-center items-center rounded-lg p-4 w-full">
            <div class="md:w-1/2 p-8">
                <canvas id="pieChart" width="350" height="350"></canvas>
            </div>
            <div class="md:w-1/2 p-8">
                <canvas id="barChart" width="350" height="350"></canvas>
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
                    'Outubro', 'Novembro', 'Dezembro'
                ],
                datasets: [{
                    label: 'Ganhos',
                    data: [
                        <?php 
                        for ($i = 1; $i <= 12; $i++) {
                            echo "$meses[$i],";
                        }                           
                        ?>
                    ],

                    borderColor: [
                        'rgba(135, 206, 250, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Deve Receber', 'Recebeu', 'Faltam Receber'],
                datasets: [{
                    label: 'Reservas',
                    data: [ {{$reserva['receber']}}, {{$reserva['recebido']}}, {{$reserva['falta']}} ],

                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },

        });
    </script>
@endsection


@section('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
