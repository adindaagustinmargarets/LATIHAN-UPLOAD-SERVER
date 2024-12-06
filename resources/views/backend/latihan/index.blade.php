@extends('backend.layouts.app')
@section('content')
@php
$title = 'List Data Latihan';
@endphp
<div class="container mt-2">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">Latihan Notifikasi Whatsapp</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="mt-2 mb-2">
        <button type="button" data-bs-toggle="modal" data-bs-target="#TambahModal" class="btn btn-primary">Tambah</button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#TambahAuthModal" class="btn btn-primary">Tambah Auth</button>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Nomor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latihan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nomor }}</td>
                        <td>
                            <form action="{{ route('latihan.hapus', $data->id) }}" method="post">
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
@include('backend.latihan.modal.tambah')
@include('backend.latihan.modal.tambah-auth')