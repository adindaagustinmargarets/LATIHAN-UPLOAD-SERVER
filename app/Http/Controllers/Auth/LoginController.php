<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;

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
    protected function redirectTo()
    {
        // Check user level and redirect accordingly
        if (Auth::user()->level === 'admin') {
            return '/backend/dashboard';
        }

        return '/home';
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        // Mendapatkan rate limit untuk user berdasarkan email
        $key = $this->throttleKey($request);

        // Jika user sudah mencoba login lebih dari 3 kali dalam 5 menit
        if (RateLimiter::tooManyAttempts($key, 3)) {
            // Menghitung berapa lama waktu tunggu (detik)
            $seconds = RateLimiter::availableIn($key);

            // Melempar exception dengan pesan bahwa user harus menunggu
            throw ValidationException::withMessages([
                'email' => ['Terlalu banyak percobaan login. Silakan coba lagi dalam ' . ceil($seconds / 60) . ' menit.'],
            ]);
        }

        // Cek apakah email ditemukan di database
        $user = \App\Models\User::where('email', $request->email)->first();

        // Jika email tidak ditemukan
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['Email tidak ditemukan'],
            ]);
        }

        // Jika email ditemukan, tetapi password salah
        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'password' => ['Password salah'],
            ]);
        }

        // Jika login gagal, kirimkan pesan umum
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
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
}
