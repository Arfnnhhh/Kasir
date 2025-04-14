@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-content-table">
    <section class="section">
        <div class="margin-content">
            <div class="container-sm">
                <div class="section-header">
                    @if(Auth::user()->role == 'superadmin')
                    <h1>Dashboard</h1>
                    @else
                    <h1>Halo {{ auth()->user()->name}}, Selamat Bekerja</h1>
                    @endif
                </div>
                @if(Auth::user()->role == 'superadmin')
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <h5>Total Produk</h5>
                                    <p class="h3">{{ $totalProducts }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <h5>Total Pengguna</h5>
                                    <p class="h3">{{ $totalUsers }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <h5 class="card-title">Pendapatan Bulanan</h5>
                                    <canvas id="revenueChart" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="row mt-5">
    <div class="col-12">
        <div class="card shadow-sm rounded">
            <div class="card-body">
                <h5 class="card-title">Pendapatan Bulanan</h5>
                <canvas id="revenueChart" height="100"></canvas>
            </div>
        </div>
    </div>
</div>
@endif
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');

    const revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode(array_keys($dailyRevenue->toArray())) !!},
            datasets: [{
                label: 'Pendapatan Harian',
                data: {!! json_encode(array_values($dailyRevenue->toArray())) !!},
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                tension: 0.4,
                fill: false
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString();
                        }
                    }
                },
                x: {
                    ticks: {
                        callback: function(value, index, ticks) {
                            // format date as "dd-mm"
                            const date = this.getLabelForValue(value);
                            return new Date(date).toLocaleDateString('id-ID', { day: '2-digit', month: 'short' });
                        }
                    }
                }
            }
        }
    });
</script>
@endpush

@endsection
