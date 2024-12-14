<?php

namespace App\Http\Controllers;

use App\Jobs\Notifikasi\Whatsapp;
use App\Models\Latihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

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
        $filePath = public_path('../cronjob.log');

        // Periksa apakah file ada
        if (File::exists($filePath)) {
            // Baca isi file
            $logContent = File::get($filePath);

            // Kembalikan isi file dalam tampilan
            return view('cronjob.list-cronjob', compact('logContent'));
        }

        // Jika file tidak ditemukan, tampilkan pesan error
        return response()->json(['error' => 'File cronjob.log tidak ditemukan.'], 404);
    }
}
