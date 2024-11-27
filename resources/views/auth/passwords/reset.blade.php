@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color: #f8f9fa; min-height: 100vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg" style="border-radius: 1rem;">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h3>{{ __('Reset Password') }}</h3>
                        <p class="text-muted">Silakan atur ulang kata sandi Anda</p>
                        <i class="fas fa-lock fa-5x text-primary"></i>
                    </div>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required placeholder="Masukkan Email" autocomplete="email" autofocus>
                            @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Masukkan Password Baru" autocomplete="new-password">
                            @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Masukkan Konfirmasi Password Baru" autocomplete="new-password">
                        </div>

                        <!-- Tambahkan margin-top untuk tombol -->
                        <button type="submit" class="btn btn-primary btn-block mt-3">
                            {{ __('Reset Password') }}
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