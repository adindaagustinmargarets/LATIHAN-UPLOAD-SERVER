@extends('front.layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh; background: linear-gradient(to right, #ff7e5f, #feb47b);">
    <div class="col-md-6">
        <div class="card shadow-lg rounded-4 p-5">
            <div class="card-body">
                <h3 class="text-center mb-4 text-primary">Reset Your Password</h3>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold text-dark">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-bold text-dark">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="form-label fw-bold text-dark">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="d-grid gap-2 mb-4">
                        <button type="submit" class="btn btn-primary btn-lg text-white fw-bold shadow-sm hover-custom">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
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
    }

    .btn-lg {
        padding: 1rem;
        font-size: 1.1rem;
    }

    .card-body {
        padding: 2rem;
    }

    .invalid-feedback {
        font-size: 0.875rem;
        color: #e74a3b;
    }

    .hover-custom:hover {
        background-color: #0056b3 !important;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-link {
        font-size: 0.9rem;
        font-weight: 600;
    }
</style>
@endpush