@extends('layouts.frontend.app')

@section('content')
@php
$title = 'Konfirmasi Reset Password';
@endphp

<!-- Confirm Reset Password Section -->
<section id="confirm-reset-password" style="height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #f7f9fc;">
    <div class="confirm-container" style="width: 100%; max-width: 600px; background: white; padding: 40px; border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);">
        <!-- Title -->
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Konfirmasi Reset Password</h2>
            <p class="text-muted">Masukkan password baru Anda untuk menyelesaikan proses reset.</p>
        </div>
        <!-- Form -->
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <!-- Hidden Token -->
            <input type="hidden" name="token" value="{{ $token }}">
            <!-- Email Input -->
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $email ?? old('email') }}" required placeholder="Masukkan email Anda" readonly style="background-color: azure;">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Password Input -->
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Masukkan password baru">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Confirm Password Input -->
            <div class="form-group mb-4">
                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Ulangi password baru">
            </div>
            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary" style="background: #1e88e5; border: none; padding: 12px;">Reset Password</button>
            </div>
        </form>
        <!-- Additional Links -->
        <div class="text-center mt-4">
            <p>Kembali ke <a href="{{ route('login') }}" class="text-primary fw-bold">Halaman Login</a></p>
        </div>
    </div>
</section>
@endsection