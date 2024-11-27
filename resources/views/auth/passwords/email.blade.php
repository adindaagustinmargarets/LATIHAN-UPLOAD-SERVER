@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color: #f8f9fa; min-height: 100vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg" style="border-radius: 1rem;">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h3>{{ __('Reset Password') }}</h3>
                        <p class="text-muted">Masukkan alamat email Anda untuk mengatur ulang kata sandi</p>
                        <i class="fas fa-lock fa-5x text-primary"></i>
                    </div>

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Masukkan Email" autocomplete="email" autofocus>
                            @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <!-- Tambahkan margin-top untuk tombol -->
                        <button type="submit" class="btn btn-primary btn-block mt-3">
                            {{ __('Send Password Reset Link') }}
                        </button>

                        <div class="text-center mt-3">
                            <p>Kembali ke <a href="{{ route('login') }}">{{ __('Masuk') }}</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan FontAwesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection