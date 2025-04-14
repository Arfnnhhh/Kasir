@extends('layouts.app')

@section('title', 'Konfirmasi Penjualan')

@section('content')
<div class="main-content-table">
    <section class="section">
        <div class="margin-content">
            <div class="container-sm">
                <div class="section-header">
                    <h1>Konfirmasi Penjualan</h1>
                </div>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="section-body">
                    <div class="card shadow-sm">
                        <div class="card-body">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <h5>Informasi Member</h5>
                                        <div class="form-group mb-3">
                                            <label for="is_member">Member atau Bukan</label>
                                            <select class="form-control" id="is_member" name="is_member" required>
                                                <option value="">Pilih</option>
                                                <option value="yes">Member</option>
                                                <option value="no">Bukan Member</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3" id="member_selection" style="display: none;">
                                            <label for="member_phone">Pilih Member (Berdasarkan Nomor Telepon)</label>
                                            <br>
                                            <select class="form-control select2" id="member_phone" name="member_id">
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="total_pay">Jumlah Bayar</label>
                                            <input type="text" class="form-control" id="total_pay" value="">
                                            <input type="hidden" id="total_pay_numeric" name="total_pay">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Tambah Penjualan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
