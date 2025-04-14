@extends('layouts.app')

@section('title', 'Members')

@push('style')
<!-- Add any custom styles if needed -->
@endpush

@section('content')
<div class="main-content-table">
    <section class="section">
        <div class="margin-content">
            <div class="container-sm">
                <div class="section-header">
                    <h1>Members</h1>
                </div>

                <div class="section-body">
                    <div class="table-responsive">
                        <div class="row mb-3">
                            <div class="col-md-12 d-flex justify-content-between align-items-center">
                            </div>
                        </div>

                        <table class="table table-bordered my-3" style="background-color: #f3f3f3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Member Code</th>
                                    <th>Name</th>
                                    <th>Points</th>
                                    <th>Phone Number</th>
                                    @if(Auth::user()->role == 'superadmin')
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
