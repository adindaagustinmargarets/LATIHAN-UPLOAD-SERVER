<?php

namespace App\Http\Controllers;

use App\Jobs\Notifikasi\Whatsapp;
use App\Models\Latihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use App\Helpers\TelegramHelper;

class LatihanController extends Controller
{
    public function index()
    {
        $latihan = Latihan::all();
        return view('latihan.index', compact('latihan'));
    }
    public function tambah(Request $request)
    {
        $latihan = Latihan::create([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
        ]);
        Whatsapp::dispatch($latihan);
        return redirect()->back()->with('success', 'Berhasil Tamabh Data');
    }
    public function hapus($id)
    {
        $latihan = Latihan::find($id);
        $latihan->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Data');
    }
    public function cronjob()
    {
        // Path ke file cronjob.log
        $filePath = '/home/tes.latihanserver.my.id/cronjob.log';

        // Baca isi file
        $logContent = file_get_contents($filePath);

        // Kembalikan isi file ke tampilan
        return view('cronjob.list-cronjob', compact('logContent'));
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
