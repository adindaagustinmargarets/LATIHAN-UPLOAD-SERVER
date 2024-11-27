<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\Notifikasi\ExampleData\DeleteNotifikasi;
use App\Mail\Notifikasi\ExampleData\EditNotifikasi;
use App\Mail\Notifikasi\ExampleData\HapusNotifikasi;
use App\Mail\Notifikasi\ExampleData\ResetNotifikasi;
use App\Mail\Notifikasi\ExampleData\TambahNotifikasi;
use App\Models\ExampleData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExampleDataController extends Controller
{
    public function index()
    {
        $exampledata = ExampleData::all();
        return view('backend.example-data.index', compact('exampledata'));
    }
    public function detail(Request $request)
    {
        // Ambil ID langsung dari query string tanpa validasi
        $id = $request->input('id');

        // Gunakan query mentah tanpa parameter binding
        $data = DB::select("SELECT * FROM example_data WHERE id = $id");

        return response()->json($data);
    }
    public function tambah(Request $request)
    {
        $data = ExampleData::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan
        ]);
        //variable auth
        $email = Auth::user()->email;
        $nama = Auth::user()->name;
        //kirim notifikasi email
        Mail::to($email)->send(new TambahNotifikasi($data, $nama));
        return redirect()->route('example-data.index')->with('success', 'Data Berhasil Ditambah');
    }
    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required'
        ], [
            'nama.required' => 'Nama Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
            'pekerjaan.required' => 'Pekerjaan Wajibd Diisi'
        ]);
        $data = ExampleData::find($id);
        if (!$data) {
            return redirect()->route('example-data.index')->with('error', 'Data Tidak Ditemukan');
        }
        $data->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
        ]);
        //variable auth
        $nama = Auth::user()->name;
        $email = Auth::user()->email;
        Mail::to($email)->send(new EditNotifikasi($data, $nama));
        return redirect()->route('example-data.index')->with('success', 'Data Berhasil Diedit');
    }
    public function hapus($id)
    {
        $data = ExampleData::find($id);
        // Jika data tidak ditemukan
        if (!$data) {
            return redirect()->route('example-data.index')->with('error', 'Data Tidak Ditemukan');
        }
        // Ambil data sebelum dihapus
        $nama = Auth::user()->name;
        $email = Auth::user()->email;
        // Hapus data
        $data->delete();
        Mail::to($email)->send(new HapusNotifikasi($nama));
        return redirect()->route('example-data.index')->with('success', 'Data Berhasil Di Hapus');
    }
    public function reset()
    {
        ExampleData::truncate();
        //variable Auth
        $nama = Auth::user()->name;
        $email = Auth::user()->email;
        Mail::to($email)->send(new ResetNotifikasi($nama));
        return redirect()->route('example-data.index')->with('success', 'berhasil melakukkan reset data');
    }
}
