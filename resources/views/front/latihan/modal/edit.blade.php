<!-- Modal -->
<div class="modal fade" id="EditModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('latihan.update', $data->id) }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" value="{{ $data->nama }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" value="{{ $data->keterangan }}" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan">
                            @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>