<?php

namespace App\Http\Controllers;

use App\Jobs\Notifikasi\Pembayaraan\TransaksiBerhasil;
use App\Mail\NotifikasiEmail;
use App\Models\Latihan;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PaymentController extends Controller
{
    private $apiKey;
    private $privateKey;
    private $merchantCode;
    private $apiUrl;

    public function __construct()
    {
        $this->apiKey = config('tripay.api_key');
        $this->privateKey = config('tripay.private_key');
        $this->merchantCode = config('tripay.merchant_code');
        $this->apiUrl = config('tripay.api_url');
    }
    public function index()
    {
        $payment = Payment::all();
        $paymentChannels = $this->getPaymentChannels();
        return view('payment.index', compact('payment', 'paymentChannels'));
    }
    public function bayar(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000',
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $merchantRef = 'INV-' . time();
        $amount = $request->amount;

        $signature = hash_hmac('sha256', $this->merchantCode . $merchantRef . $amount, $this->privateKey);

        $data = [
            'method' => $request->payment_method,
            'merchant_ref' => $merchantRef,
            'amount' => $amount,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'order_items' => [
                [
                    'name' => 'Pembayaran Invoice',
                    'price' => $amount,
                    'quantity' => 1
                ]
            ],
            'signature' => $signature
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey
        ])->post($this->apiUrl . '/transaction/create', $data);

        if ($response->successful()) {
            $tripayResponse = $response->json();

            $payment = Payment::create([
                'merchant_ref' => $merchantRef,
                'tripay_reference' => $tripayResponse['data']['reference'],
                'method' => $request->payment_method,
                'amount' => $amount,
                'status' => 'PENDING',
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'order_items' => json_encode($data['order_items']),
            ]);

            return redirect()->route('payments.detail', $payment);
        } else {
            return back()->withErrors('Gagal membuat transaksi. Silakan coba lagi.');
        }
    }
    public function detail(Payment $payment)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey
        ])->get($this->apiUrl . '/transaction/detail', [
            'reference' => $payment->tripay_reference
        ]);

        if ($response->successful()) {
            $tripayData = $response->json()['data'];
            return view('payment.detail', compact('payment', 'tripayData'));
        } else {
            return back()->withErrors('Gagal mengambil detail transaksi.');
        }
    }
    public function cetak($id)
    {
        try {
            // Mengambil data pembayaran berdasarkan ID
            $payment = Payment::findOrFail($id);

            // Mengambil detail transaksi dari API Tripay
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey, // Pastikan $this->apiKey sudah diatur di controller
            ])->get($this->apiUrl . '/transaction/detail', [
                'reference' => $payment->tripay_reference, // Menggunakan reference dari Payment
            ]);

            // Periksa apakah request ke API Tripay berhasil
            if ($response->successful()) {
                $tripayData = $response->json()['data'];

                // Memuat view PDF dengan data pembayaran dan tripayData
                $pdf = PDF::loadView('PDF.bukti', compact('payment', 'tripayData'));

                // Sanitasi nama file PDF
                $filename = 'bukti_' . Str::slug($payment->customer_name) . '.pdf';

                // Mengirimkan file PDF untuk diunduh
                return $pdf->download($filename);
            } else {
                // Tangani error jika API gagal
                return back()->withErrors('Gagal mengambil detail transaksi dari Tripay.');
            }
        } catch (\Exception $e) {
            // Menangani error jika terjadi masalah lainnya
            return redirect()->back()->with('error', 'Gagal mencetak bukti pembayaran: ' . $e->getMessage());
        }
    }
    public function getPaymentChannels()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey
        ])->get($this->apiUrl . '/merchant/payment-channel');

        \Log::info('Tripay API Response:', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        if ($response->successful()) {
            return $response->json()['data'];
        }

        return [];
    }
    public function delete($id)
    {
        $latihan = Payment::find($id);
        if (!$latihan) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan');
        }
        $latihan->delete();
        return redirect()->back()->with('success', 'berhasil hapus Data');
    }
    public function paymentCallback(Request $request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();

        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid signature',
            ]);
        }

        $data = json_decode($json);

        $uniqueRef = $data->merchant_ref;
        $status = strtolower($data->status);

        $payment = Payment::where('merchant_ref', $uniqueRef)->first();

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'No order found',
            ]);
        }

        switch ($status) {
            case 'paid':
                $payment->update(['status' => 'BERHASIL', 'paid_at' => now()]);
                break;
            case 'unpaid':
                $payment->update(['status' => 'PENDING']);
                break;
            case 'refund':
                $payment->update(['status' => 'DIKEMBALIKAN']);
                break;
            case 'expired':
                $payment->update(['status' => 'KADARLUWARSA']);
                break;
            case 'failed':
                $payment->update(['status' => 'GAGAL']);
                break;
            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Unrecognized status',
                ]);
        }
        TransaksiBerhasil::dispatch($payment);
        Mail::to($payment->customer_email)->send(new NotifikasiEmail($payment));
        return response()->json(['success' => true]);
    }
}
