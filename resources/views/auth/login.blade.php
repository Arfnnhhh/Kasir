@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
    body {
        background-color: #36393f;
        color: #b9bbbe;
    }

    .card {
        background-color: #2f3136;
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .card-header {
        background-color: transparent;
        border-bottom: none;
        color: #ffffff;
    }

    .form-label {
        color: #dcddde;
    }

    .form-control {
        background-color: #202225;
        border: 1px solid #202225;
        color: #dcddde;
    }

    .form-control:focus {
        background-color: #202225;
        border-color: #5865F2;
        box-shadow: 0 0 0 0.25rem rgba(88, 101, 242, 0.25);
        color: #ffffff;
    }

    .btn-primary {
        background-color: #5865F2;
        border-color: #5865F2;
    }

    .btn-primary:hover {
        background-color: #4752C4;
        border-color: #4752C4;
    }

    .form-check-label {
        color: #b9bbbe;
    }

    .invalid-feedback {
        color: #f04747;
    }

    .margin-content-login {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="margin-content-login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card p-4">
                    <div class="card-header text-center">
                        <h4 class="mb-0">Masukan detail akun anda</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="#">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-4 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <!-- Submit -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
