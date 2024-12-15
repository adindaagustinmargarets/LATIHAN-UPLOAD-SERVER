<?php

namespace App\Jobs\Notifikasi;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class Whatsapp implements ShouldQueue
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
        Http::post('https://wa-gateway.winnicode.com/api/create-message', [
            'appkey' => env('WA_GATEWAY_APP'),
            'authkey' => env('WA_GATEWAY_AUTH'),
            'to' => $this->latihan->nomor,
            'message' => "Data Berhasil Di simpan di server. Data Json: {{$this->latihan}}",
        ]);
    }
}
