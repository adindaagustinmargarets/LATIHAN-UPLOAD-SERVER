<?php

namespace App\Http\Controllers;

use App\Models\Latihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        Http::post('https://wa-gateway.winnicode.com/api/create-message', [
            'appkey' => 'abd173a5-eafc-494d-a7ec-691748a8bdf6',
            'authkey' => 'vL2BtMG3Zmom1hlGGvHOdVoeRw8DyF9IIqAf77cle4Ldx3Lgjh',
            'to' => $latihan->nomor,
            'message' => 'Data Berhasil Di simpan di server',
        ]);
        return redirect()->back()->with('success', 'Berhasil Tamabh Data');
    }
    public function hapus($id)
    {
        $latihan = Latihan::find($id);
        $latihan->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Data');
    }
}
