@extends('front.layouts.app')

@section('content')
@php
$title = 'Halaman Reset Password - Example';
@endphp
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh; background: #f0f4f8;">
    <div class="col-md-6">
        <div class="card shadow-lg rounded-4 p-4">
            <div class="card-body">
                <div class="text-center mb-4">
                    <i class="bi bi-lock-fill" style="font-size: 3rem; color: #007bff;"></i>
                    <h3 class="mt-3 mb-3">{{ __('Reset Your Password') }}</h3>
                    <p class="text-muted">We will send you an email to reset your password. Please enter your registered email below.</p>
                </div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required autocomplete="email" autofocus>

                        @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 mb-4">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p class="text-muted">Remember your password? <a href="{{ route('login') }}" class="text-primary fw-bold">Log in</a></p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        background-color: #ffffff;
    }

    .form-label {
        font-weight: 600;
        font-size: 1.1rem;
    }

    .btn-lg {
        padding: 1rem;
        font-size: 1.1rem;
        border-radius: 0.5rem;
    }

    .card-body {
        padding: 2rem;
    }

    .invalid-feedback {
        font-size: 0.875rem;
        color: #e74a3b;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .text-primary {
        color: #007bff !important;
    }

    .fw-bold {
        font-weight: bold;
    }

    .bi-lock-fill {
        color: #007bff;
    }
</style>
@endpush