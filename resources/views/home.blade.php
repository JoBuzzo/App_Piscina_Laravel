@extends('app')

@section('title', 'Início')

@section('navbar')
    <x-navbar view="home" />
    <x-sidebar />
@endsection

@section('content')

    <div class="flex flex-col justify-center items-center gap-4">
        <div class="flex flex-wrap justify-center items-center gap-2 w-full">
            <x-card.preco title="Reservas em R$" value="R$200.50" />
            <x-card.preco title="Despesas em R$" value="-R$150.00" />
            <x-card.total title="Total de reservas" value="50" icon="fas fa-file-alt" />
            <x-card.total title="Total de reservas" value="50" />
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
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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


