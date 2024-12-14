@extends('latihan.layouts.app')
@section('content')
@php
$title = 'Payment Gateway';
@endphp
<div class="container mt-2">
    <div class="mt-2 mb-2">
        <button type="button" data-bs-toggle="modal" data-bs-target="#BayarModal" class="btn btn-primary">Bayar</button>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nominal</th>
                        <th>Metode</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payment as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->customer_name }}</td>
                        <td>{{ $data->amount }}</td>
                        <td>{{ $data->method }}</td>
                        <td>
                            @if($data->status == 'PENDING')
                            <span class="badge text-bg-warning">{{ $data->status }}</span>
                            @elseif($data->status == 'BERHASIL')
                            <span class="badge text-bg-success">{{ $data->status }}</span>
                            @elseif($data->status == 'GAGAL')
                            <span class="badge text-bg-danger">{{ $data->status }}</span>
                            @elseif($data->status == 'KADARLUWARSA')
                            <span class="badge text-bg-danger">{{ $data->status }}</span>
                            @elseif($data->status == 'DIKEMBALIKAN')
                            <span class="badge text-bg-success">{{ $data->status }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('payments.detail', $data->id) }}" class="btn btn-primary">
                                Detail
                            </a>
                            <form action="{{ route('payments.delete', $data->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@include('payment.modal.bayar-modal')