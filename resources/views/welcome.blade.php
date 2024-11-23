@extends('front.layouts.app')

@section('content')
@php
$title = 'Home - Example';
@endphp
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-6 text-center">
        <div class="card shadow-lg rounded-3 p-4">
            <h3 class="mb-4">Selamat Datang di Data Example</h3>
            <p class="text-muted mb-4">Untuk Mengakses Halaman <span class="badge text-bg-primary">Data Example</span> membutuhkan akses admin.</p>
            <a href="{{ route('latihan.index') }}" class="btn btn-primary btn-lg w-100 hover-effect">Data Example</a>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .hover-effect:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .card {
        background-color: #f8f9fa;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card h3 {
        font-size: 1.75rem;
        font-weight: 600;
    }

    .card p {
        font-size: 1rem;
    }
</style>
@endpush