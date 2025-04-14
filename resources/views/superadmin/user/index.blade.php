@extends('layouts.app')

@section('title', 'User')

@push('style')

@endpush

@section('content')
<div class="main-content-table">
    <section class="section">
        <div class="margin-content">
            <div class="container-sm">
                <div class="section-header">
                    <h1>User</h1>
                </div>
                <div class="section-body">
                    <div class="table-responsive">
                        <div class="row mb-3">
                            <div class="col-md-12 d-flex justify-content-between align-items-center">
                                <form action="{{ route('user.index') }}" method="GET" class="d-flex"
                                style="max-width: 100%%;">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control rounded"
                                    placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary rounded ml-2" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                            @if(Auth::user()->role == 'superadmin')
                            <a href="{{ route('user.create') }}" class="btn btn-success ml-2 p-2">
                                Create User
                            </a>
                            @endif
                        </div>
                        <table class="table table-bordered my-3" style="background-color: #f3f3f3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
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
@endsection
@endpush
