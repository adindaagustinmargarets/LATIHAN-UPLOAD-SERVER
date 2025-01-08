@extends('layouts.frontend.app')

@section('content')
@php
$title = 'Halaman Login';
@endphp

<!-- Login Section -->
<section id="login" style="height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #f7f9fc;">
    <div class="login-container" style="width: 100%; max-width: 600px; background: white; padding: 40px; border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);">
        <!-- Title -->
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Selamat Datang</h2>
            <p class="text-muted">Masuk untuk melanjutkan ke akun Anda</p>
        </div>
        <!-- Form -->
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Email -->
                <div class="form-group col-md-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Masukkan email">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Password -->
                <div class="form-group col-md-12 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Masukkan password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- Remember Me -->
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label for="remember" class="form-check-label">Ingat Saya</label>
                </div>
                <!-- Forgot Password -->
                <a href="{{ route('password.request') }}" class="text-muted">Lupa password?</a>
            </div>
            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary" style="background: #1e88e5; border: none; padding: 12px;">Masuk</button>
            </div>
        </form>
        <!-- Additional Links -->
        <div class="text-center mt-4">
            <p>Belum punya akun? <a href="{{ route('register') }}" class="text-primary fw-bold">Daftar Sekarang</a></p>
        </div>
    </div>
</section>
@endsection