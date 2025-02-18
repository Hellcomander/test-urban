@extends('master')

@section('content')
    @if (session()->get('role') === 'vendedor')
        <div class="layout-px-spacing">
            <div class="container-fluid p-5">
                <div class="row d-flex justify-content-center">
                    <div class="card col-md-6 m-3">
                        <div class="card-body">
                            <h2>Ventas Mensuales del Producto</h2>
                            <canvas id="ventasChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Datos ficticios de ventas mensuales
        const meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
        const ventas = [120, 150, 130, 180, 170, 140, 160, 190, 210, 180, 150, 220];

        const ctx = document.getElementById('ventasChart').getContext('2d');

        const ventasChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfico (barras)
        data: {
            labels: meses, // Meses como etiquetas
            datasets: [{
                label: 'Ventas',
                data: ventas, // Datos de ventas
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            },
            responsive: true
        }
        });
    </script>
@endpush
