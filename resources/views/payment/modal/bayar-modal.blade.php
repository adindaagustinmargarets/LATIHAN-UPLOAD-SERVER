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
                        <label for="month" class="form-label">Pilih Bulan</label><br>

                        <!-- Menggunakan radio button, hanya satu yang bisa dipilih -->
                        <input type="radio" id="bulan1" name="bulan" value="1">
                        <label for="bulan1">Bulan 1 (Rp 30,000)</label><br>

                        <input type="radio" id="bulan2" name="bulan" value="2">
                        <label for="bulan2">Bulan 2 (Rp 60,000)</label>
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label">Jumlah</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="amount" name="amount" min="0" step="1000" value="30000" placeholder="Masukan Nominal" required readonly>
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
<script>
    // Ambil elemen radio button dan input amount
    const bulan1Radio = document.getElementById('bulan1');
    const bulan2Radio = document.getElementById('bulan2');
    const amountInput = document.getElementById('amount');

    // Fungsi untuk update nilai berdasarkan radio button
    function updateAmount() {
        // Jika radio button Bulan 1 dicentang, set amount ke 30000
        if (bulan1Radio.checked) {
            amountInput.value = 30000;
        }
        // Jika radio button Bulan 2 dicentang, set amount ke 6000
        else if (bulan2Radio.checked) {
            amountInput.value = 60000;
        }
    }

    // Menambahkan event listener ke radio button untuk memanggil updateAmount ketika berubah
    bulan1Radio.addEventListener('change', updateAmount);
    bulan2Radio.addEventListener('change', updateAmount);
</script>