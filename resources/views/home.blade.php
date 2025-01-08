@extends('layouts.frontend.app')

@section('content')
@php
$title = 'Mitra Jasa - Solusi Tepat Gudangnya Freelance';
@endphp

<div class="row m-0">
    <!-- Main Content -->
    <div class="col-md-12 p-4">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @elseif (session('verified'))
        <div class="alert alert-success" role="alert">
            {{ session('verified') }}
        </div>
        @endif
        <!-- Welcome Message -->
        <div class="alert alert-primary">
            <h4>Selamat datang, {{ Auth::user()->name }}!</h4>
            <p>Kami senang Anda bergabung dengan kami untuk solusi jasa digital terbaik.</p>
        </div>
    </div>
</div>
@endsection