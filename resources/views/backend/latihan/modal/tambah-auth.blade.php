<div class="modal fade" id="TambahAuthModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data dengan Auth</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('latihan.tambah-auth') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div>
                        <label>Nama</label>
                        <input type="text" name="nama" value="{{ Auth::user()->name }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label>Nomor</label>
                        <input type="text" name="nomor" value="{{ Auth::user()->nomor }}" class="form-control @error('nomor') is-invalid @enderror" placeholder="Masukkan Nomor">
                        @error('nomor')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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