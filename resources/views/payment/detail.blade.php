@extends('layouts.app')

@section('title', 'Detail Pembayaran')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detail Pembayaran</h4>
                    <span class="badge bg-info">{{ \Carbon\Carbon::parse($payment->created_at)->format('d M Y, H:i') }}</span>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-12 col-md-6 mb-3">
                            <h5 class="text-muted">Informasi Transaksi</h5>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>No. Referensi:</strong>
                                    <span class="badge bg-success">{{ $payment->merchant_ref }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Status</strong>
                                    <span class="badge bg-{{ $payment->status === 'BERHASIL' ? 'success' : ($payment->status === 'PENDING' ? 'warning' : 'secondary') }}">
                                        {{ ucfirst($payment->status) }}
                                    </span>
                                </li>
                                @if($payment->method == 'QRIS2')
                                <li class="list-group-item d-flex justify-content-end">
                                    <img src="{{ $tripayData['qr_url'] }}" alt="QR Code" class="img-fluid" style="max-width: 150px; margin-left: auto;">
                                </li>
                                @else
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Transfer</strong>
                                    {{ ($tripayData['payment_name'])}}
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Rekening</strong>
                                    {{ ($tripayData['pay_code'])}}
                                </li>
                                @endif
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Biaya Admin</strong>
                                    Rp {{ number_format($tripayData['fee_customer'], 0, ',', '.') }}
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Jumlah:</strong>
                                    Rp {{ number_format($tripayData['amount'], 0, ',', '.') }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6">
                            <h5 class="text-muted">Informasi Pelanggan</h5>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Nama:</strong>
                                    {{ $payment->customer_name }}
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Phone:</strong>
                                    {{ $payment->customer_phone }}
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Email:</strong>
                                    {{ $payment->customer_email }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('payments.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection