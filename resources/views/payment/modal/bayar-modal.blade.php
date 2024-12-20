<!-- Tambahkan ini di bagian atas file, setelah tombol "Buat Pembayaran Baru" -->
<div class="modal fade" id="BayarModal" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPaymentModalLabel">Tambah Pembayaran Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('payments.bayar') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="customer_name" class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="Dummy" placeholder="Masukkan Nama lengkap" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="customer_email" class="form-label">Email Pelanggan</label>
                                <input type="email" class="form-control" id="customer_email" name="customer_email" value="dummy@gmail.com" placeholder="Masukkan Email Aktif" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="customer_nomor" class="form-label">Nomor Pelanggan</label>
                                <input type="text" class="form-control" id="customer_email" name="customer_phone" value="6285741710084" placeholder="Masukkan Email Aktif" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label">Jumlah</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" name="amount" value="30000" placeholder="Masukan Nominal" required readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="method" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" id="method" name="payment_method" required>
                            <option value="">Pilih metode pembayaran</option>
                            @foreach ($paymentChannels as $channel)
                            <option value="{{ $channel['code'] }}">
                                {{ $channel['name'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>