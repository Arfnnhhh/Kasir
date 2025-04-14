@extends('layouts.app')

@section('title', 'Invoice Penjualan')

@section('content')
<div class="main-content-table">
    <section class="section">
        <div class="margin-content">
            <div class="container-sm">
                <div class="section-header text-center mb-4">
                    <h1 class="fw-bold">Nomor Invoice: <strong>{{ $invoiceNumber }}</strong></h1>
                </div>
                <div class="invoice-container">
                    <div class="card shadow-sm p-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Nomor Invoice: <strong>{{ $invoiceNumber }}</strong></h5>
                                    <h5>Informasi Pelanggan</h5>
                                    <p><strong>Nama:</strong> {{ $memberName }}</p>
                                    <p><strong>Status:</strong> {{ $memberId ? 'Member' : 'Non-Member' }}</p>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <h5>Tanggal Transaksi</h5>
                                    <p>{{ $createdAt->format('d F Y, H:i') }}</p>
                                </div>
                            </div>
                            
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            
                            <div class="row mt-4">
                            </div>
                            
                            <div class="text-center mt-4">
                                <button class="btn btn-success" onclick="window.print()">Cetak Invoice</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
