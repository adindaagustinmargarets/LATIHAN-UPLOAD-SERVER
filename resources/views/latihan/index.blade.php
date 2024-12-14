@extends('latihan.layouts.app')
@section('content')
@php
$title = 'Latihan CRUD';
@endphp
<div class="container mt-2">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">Latihan CRUD</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="mt-2 mb-2">
        <button type="button" data-bs-toggle="modal" data-bs-target="#tambahmodal" class="btn btn-primary">Tambah</button>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
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
@include('latihan.modal.tambah')