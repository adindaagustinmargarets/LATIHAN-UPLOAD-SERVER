<?php

namespace App\Jobs\Notifikasi\Pembayaraan;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class TransaksiBerhasil implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $payment;

    /**
     * Create a new job instance.
     */
    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Http::post('https://wa-gateway.winnicode.com/api/create-message', [
            'appkey' => 'abd173a5-eafc-494d-a7ec-691748a8bdf6',
            'authkey' => 'vL2BtMG3Zmom1hlGGvHOdVoeRw8DyF9IIqAf77cle4Ldx3Lgjh',
            'to' => $this->payment->customer_phone,
            'message' => "Pembayaraan Berhasil Data json: {{$this->payment}}",
        ]);
    }
}
