@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-content-table">
    <section class="section">
        <div class="margin-content">
            <div class="container-sm">
                <div class="section-header">
                    <h1>Dashboard</h1>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <h5>Total Produk</h5>
                                    {{--  <p class="h3">{{ $totalProducts }}</p>  --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <h5>Total Pengguna</h5>
                                    {{--  <p class="h3">{{ $totalUsers }}</p>  --}}
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
@endsection
