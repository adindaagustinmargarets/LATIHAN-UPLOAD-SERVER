<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class TelegramHelper
{
    public static function sendMessage($message)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        // Endpoint API Telegram
        $url = "https://api.telegram.org/bot{$token}/sendMessage";

        // Kirim permintaan ke API
        $response = Http::post($url, [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'HTML',
        ]);

        // Cek apakah berhasil
        if ($response->successful()) {
            return 'Pesan berhasil dikirim ke Telegram.';
        }

        return 'Gagal mengirim pesan ke Telegram.';
    }
    public function sendCronjobToTelegram()
    {
        // Path ke file cronjob.log
        $filePath = '/home/tes.latihanserver.my.id/cronjob.log';

        // Periksa apakah file ada dan dapat dibaca
        if (file_exists($filePath) && is_readable($filePath)) {
            // Baca isi file
            $logContent = file_get_contents($filePath);

            // Potong isi file jika terlalu panjang (maks 4096 karakter untuk Telegram)
            $message = substr($logContent, -4000); // Kirim 4000 karakter terakhir

            // Kirim pesan ke Telegram
            $response = TelegramHelper::sendMessage($message);

            return response()->json(['message' => $response], 200);
        }

        return response()->json(['error' => 'File cronjob.log tidak ditemukan atau tidak dapat dibaca.'], 404);
    }
}
