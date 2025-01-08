@extends('layouts.frontend.app')

@section('content')
@php
$title = 'Halaman Register';
@endphp

<!-- Register Section -->
<section id="register" style="height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #f7f9fc;">
    <div class="register-container" style="width: 100%; max-width: 700px; background: white; padding: 40px; border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);">
        <!-- Title -->
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Daftar Akun</h2>
            <p class="text-muted">Buat akun Anda dan mulai menggunakan layanan kami</p>
        </div>
        <!-- Form -->
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Name -->
                <div class="form-group col-md-6 mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama lengkap">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Email -->
                <div class="form-group col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <!-- Password -->
                <div class="form-group col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Masukkan password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Password Confirmation -->
                <div class="form-group col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Ulangi password">
                </div>
            </div>
            <!-- Submit Button -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary" style="background: #1e88e5; border: none; padding: 12px;">Daftar</button>
            </div>
        </form>
        <!-- Additional Links -->
        <div class="text-center mt-4">
            <p>Sudah punya akun? <a href="{{ route('login') }}" class="text-primary fw-bold">Masuk di sini</a></p>
        </div>
    </div>
</section>
@endsection