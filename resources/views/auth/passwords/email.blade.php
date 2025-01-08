@extends('layouts.frontend.app')

@section('content')
@php
$title = 'Reset Password';
@endphp

<!-- Reset Password Section -->
<section id="reset-password" style="height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #f7f9fc;">
    <div class="reset-container" style="width: 100%; max-width: 600px; background: white; padding: 40px; border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ __('kami sudah mengirimkan email reset password.') }}
        </div>
        @endif
        <!-- Title -->
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Reset Password</h2>
            <p class="text-muted">Masukkan email Anda untuk menerima tautan reset password.</p>
        </div>
        <!-- Form -->
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <!-- Email Input -->
            <div class="form-group mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email Anda">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary" style="background: #1e88e5; border: none; padding: 12px;">Kirim Tautan Reset</button>
            </div>
        </form>
        <!-- Additional Links -->
        <div class="text-center mt-4">
            <p>Kembali ke <a href="{{ route('login') }}" class="text-primary fw-bold">Halaman Login</a></p>
        </div>
    </div>
</section>
@endsection