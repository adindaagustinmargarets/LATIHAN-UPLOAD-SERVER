<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Latihan;
use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index()
    {
        $latihan = Latihan::all();
        return view('front.latihan.index', compact('latihan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'keterangan' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'keterangan.required' => 'Keterangan wajib diisi'
        ]);

        Latihan::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('latihan.index')->with('success', 'Data berhasil disimpan');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'keterangan' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'keterangan.required' => 'Keterangan wajib diisi'
        ]);
        $latihan = Latihan::find($id);
        $latihan->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('latihan.index')->with('success', 'Data berhasil diupdate');
    }
    public function detail($id)
    {
        // Mencari data latihan berdasarkan ID
        $latihan = Latihan::find($id);

        // Jika data tidak ditemukan, kembalikan response dengan pesan error
        if (!$latihan) {
            return response()->json([
                'data' => 'Tidak Ditemukan, data mengunakan uuid',
                'message' => 'Data example dengan ID ' . $id . ' tidak ditemukan.',
            ], 404); // Status 404 untuk data tidak ditemukan
        }

        // Jika data ditemukan, kembalikan response dengan data latihan
        return response()->json([
            'data' => 'Ditemukan',
            'message' => $latihan
        ]);
    }
    public function destroy($id)
    {
        $latihan = Latihan::find($id);
        // Jika data tidak ditemukan
        if (!$latihan) {
            return redirect()->route('latihan.index')->with('error', 'Data tidak ditemukan');
        }

        $latihan->delete();
        return redirect()->route('latihan.index')->with('success', 'Data berhasil dihapus');
    }
}
