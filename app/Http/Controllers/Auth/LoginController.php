<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', // Pastikan format email benar
            'password' => 'required', // Tambahkan validasi untuk password
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);
        // Cari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Jika email tidak ditemukan
            return back()->withErrors([
                'email' => 'Email tidak ditemukan',
            ])->withInput($request->only('email'));
        }

        // Periksa kombinasi email dan password
        if (!Auth::attempt($request->only('email', 'password'))) {
            // Jika password salah
            return back()->withErrors([
                'password' => 'Password salah',
            ])->withInput($request->only('email'));
        }

        // Jika berhasil login
        return redirect()->route('home')->with('success', 'Selamat datang, ' . Auth::user()->name);
    }
}
