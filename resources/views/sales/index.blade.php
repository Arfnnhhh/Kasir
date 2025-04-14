<?php
use Illuminate\Support\Facades\DB;
?>
@extends('layouts.app')

@section('title', 'Penjualan')

@push('style')
@endpush

@section('content')
<div class="main-content-table">
    <section class="section">
        <div class="margin-content">
            <div class="container-sm">
                <div class="section-header">
                    <h1>Penjualan</h1>
                </div>
                <div class="section-body">
                    <div class="table-responsive">
                        <div class="row mb-3">
                            <div class="col-md-12 d-flex justify-content-between align-items-center">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control rounded"
                                    placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary rounded ml-2" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered" style="background-color: #f3f3f3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Tanggal Penjualan</th>
                                <th>Total Harga</th>
                                <th>Dibuat Oleh</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-3">
                            {{ $sales->links() }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- Detail Transaksi Modal -->
<div class="modal fade" id="transactionDetailModal" tabindex="-1" aria-labelledby="transactionDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Nomor Invoice:</strong> <span id="invoiceNumber"></span></p>
                <p><strong>Nama Pelanggan:</strong> <span id="customerName"></span></p>
                <p><strong>Total Bayar:</strong> Rp <span id="paymentAmount"></span></p>
                <p><strong>Total Harga:</strong> Rp <span id="totalAmount"></span></p>
                <p><strong>Potongan Harga:</strong> Rp <span id="discountAmount">0</span></p>
                <p><strong>Kembalian:</strong> Rp <span id="changeAmount"></span></p>
                <h5 class="mt-3">Produk:</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id="transactionProducts"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

