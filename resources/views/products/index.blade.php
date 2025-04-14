@extends('layouts.app')

@section('title', 'Produk')

@push('style')
@endpush

@section('content')
<div class="main-content-table">
    <section class="section">
        <div class="margin-content">
            <div class="container-sm">
                <div class="section-header">
                    <h1>Produk</h1>
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
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- Edit Stock Modal -->
<div class="modal fade" id="editStockModal" tabindex="-1" role="dialog" aria-labelledby="editStockModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <form id="editStockForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStockModalLabel">Edit Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="productName" class="font-weight-bold"></p>
                <div class="form-group">
                    <label for="quantityInput">Quantity</label>
                    <input type="number" min="0" class="form-control" id="quantityInput" name="quantity"
                    required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update Stock</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
@endpush
