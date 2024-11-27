@extends('backend.layouts.app')
@section('content')
@php
$title = 'Halaman Example Data';
@endphp
<div class="container">
    <div class="mt-2 mb-2">
        <button type="button" data-bs-toggle="modal" data-bs-target="#TambahModal" class="btn btn-primary">Tambah</button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ResetModal" class="btn btn-danger">Reset</button>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exampledata as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->pekerjaan }}</td>
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
@include('backend.example-data.modal.tambah')
@include('backend.example-data.modal.reset')
@foreach($exampledata as $data)
@include('backend.example-data.modal.edit')
@include('backend.example-data.modal.hapus')
@endforeach