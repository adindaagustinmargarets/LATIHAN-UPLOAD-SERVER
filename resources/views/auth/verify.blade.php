@extends('layouts.frontend.app')

@section('content')
@php
$title = 'Verifikasi Email';
@endphp

<!-- Email Verification Section -->
<section id="email-verification" style="height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #f7f9fc;">
    <div class="verification-container" style="width: 100%; max-width: 600px; background: white; padding: 40px; border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('Link Verifikasi Sudah kami kirimkan ke email terdaftar') }}
        </div>
        @endif
        <!-- Title -->
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Verifikasi Email Anda</h2>
            <p class="text-muted">Kami telah mengirimkan tautan verifikasi ke email Anda. Silakan cek email Anda dan klik tautan tersebut untuk memverifikasi akun Anda.</p>
        </div>
        <!-- Message -->
        <div class="alert alert-info text-center">
            <p class="mb-0">Belum menerima email? Coba cek folder spam atau kirim ulang tautan verifikasi.</p>
        </div>
        <!-- Resend Button -->
        <form action="{{ route('verification.resend') }}" method="POST" class="text-center">
            @csrf
            <button type="submit" class="btn btn-primary" style="background: #1e88e5; border: none; padding: 12px;">Kirim Ulang Email Verifikasi</button>
        </form>
        <!-- Logout Option -->
        <div class="text-center mt-4">
            <p><a href="{{ route('logout') }}" class="text-primary fw-bold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a></p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</section>
@endsection