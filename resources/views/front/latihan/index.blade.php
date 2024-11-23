@extends('front.layouts.app')
@section('content')
@php
$title = 'Data - Example';
@endphp
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">Latihan</h1>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="mt-2 mb-2">
        <button type="button" data-bs-toggle='modal' data-bs-target='#TambahModal' class="btn btn-primary">Tambah Data</button>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latihan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->keterangan}}</td>
                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#EditModal{{ $data->id }}" class="btn btn-primary">Edit</button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#HapusModal{{ $data->id }}" class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@include('front.latihan.modal.tambah')
@foreach($latihan as $data)
@include('front.latihan.modal.edit')
@include('front.latihan.modal.hapus')
@endforeach