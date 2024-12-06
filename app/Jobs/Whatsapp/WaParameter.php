<?php

namespace App\Jobs\Whatsapp;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class WaParameter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $latihan;

    /**
     * Create a new job instance.
     */
    public function __construct($latihan)
    {
        $this->latihan = $latihan;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Mengirim API ke WhatsApp
        Http::post('https://wa-gateway.winnicode.com/api/create-message', [
            'appkey' => 'abd173a5-eafc-494d-a7ec-691748a8bdf6',
            'authkey' => 'vL2BtMG3Zmom1hlGGvHOdVoeRw8DyF9IIqAf77cle4Ldx3Lgjh',
            'to' => $this->latihan->nomor,
            'message' => "Halo {$this->latihan->nama},\n\n" .
                "Selamat datang! Kami senang bisa menyapa Anda dengan nomor {$this->latihan->nomor}.\n" .
                "Jika ada pertanyaan atau bantuan yang Anda perlukan, jangan ragu untuk menghubungi kami. Kami siap membantu Anda kapan saja!\n\n" .
                "Terima kasih telah bergabung! 😊"
        ]);
    }
}
