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
        $filePath = '/home/tes.latihanserver.my.id/cronjob.log';

        // Debug untuk melihat apakah path benar
        dd([
            'filePath' => $filePath,
            'fileExists' => file_exists($filePath),
            'isReadable' => is_readable($filePath),
        ]);

        if (file_exists($filePath)) {
            $logContent = file_get_contents($filePath);
            return view('cronjob.list-cronjob', compact('logContent'));
        }

        return response()->json([
            'error' => 'File cronjob.log tidak ditemukan.',
            'suggestion' => 'Pastikan file berada di path yang benar dan server memiliki izin membaca file tersebut.'
        ], 404);
    }
}
