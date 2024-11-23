@extends('front.layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-info text-white text-center py-4 rounded-top">
                    <h4>{{ __('Create Your New Account') }}</h4>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label">{{ __('Full Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="form-label">{{ __('Phone Number') }}</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                            @error('phone')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn btn-success btn-lg">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <div class="text-center">
                            <p class="text-muted">Already have an account? <a href="{{ route('login') }}" class="text-primary fw-bold">Login here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border-radius: 1rem;
        background-color: #f9f9f9;
    }

    .card-header {
        background-color: #17a2b8;
        color: white;
        border-radius: 1rem 1rem 0 0;
    }

    .card-body {
        padding: 2.5rem;
    }

    .form-label {
        font-weight: 500;
    }

    .btn-lg {
        font-size: 1.2rem;
        padding: 1rem;
        border-radius: 0.5rem;
    }

    .invalid-feedback {
        font-size: 0.875rem;
        color: #e74a3b;
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

    .card-footer {
        background-color: #f8f9fa;
    }

    .d-grid {
        display: grid;
        gap: 10px;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>
@endpush