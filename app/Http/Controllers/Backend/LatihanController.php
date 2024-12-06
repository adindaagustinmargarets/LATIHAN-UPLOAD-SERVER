<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\Whatsapp\WaAuth;
use App\Jobs\Whatsapp\WaParameter;
use App\Models\Latihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LatihanController extends Controller
{
    public function index()
    {
        $latihan = Latihan::all();
        return view('backend.latihan.index', compact('latihan'));
    }
    public function tambah(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nomor' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'nomor.required' => 'Nomor tidak boleh kosong',
        ]);
        // Pemrosesan nomor agar selalu dalam format yang diinginkan
        $nomor = $request->nomor;

        // Menghapus karakter selain angka
        $nomor = preg_replace('/[^0-9]/', '', $nomor); // Menghapus semua karakter selain angka

        // Menangani nomor yang dimulai dengan 0 atau tanpa awalan
        if (substr($nomor, 0, 1) === '0') {
            $nomor = '62' . substr($nomor, 1); // Mengganti angka pertama 0 menjadi 62
        } elseif (substr($nomor, 0, 1) === '+') {
            $nomor = '62' . substr($nomor, 2); // Mengganti tanda + menjadi 62
        } elseif (substr($nomor, 0, 1) !== '6') {
            // Jika nomor dimulai dengan selain angka 6 (untuk memastikan awalan "62"), kita tambah awalan "62"
            $nomor = '62' . $nomor;
        }
        $latihan = Latihan::create([
            'nama' => $request->nama,
            'nomor' => $nomor
        ]);
        WaParameter::dispatch($latihan);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }
    public function tambahauth(Request $request)
    {
        Latihan::create([
            'nama' => $request->nama,
            'nomor' => $request->nomor
        ]);
        //variable auth
        $user = Auth::user();
        WaAuth::dispatch($user);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }
    public function hapus($id)
    {
        $latihan = Latihan::find($id);
        if (!$latihan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        $latihan->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
