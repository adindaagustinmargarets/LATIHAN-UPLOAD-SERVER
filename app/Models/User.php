<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Mail\Auth\ResetEmail;
use App\Mail\Auth\VerifikasiEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'level',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sendEmailVerificationNotification()
    {
        // Kirim email verifikasi menggunakan Mailable kustom
        Mail::to($this->email)->send(new VerifikasiEmail($this));
    }
    public function sendPasswordResetNotification($token)
    {
        $ip = request()->ip();
        $locationData = $this->getLocationData($ip);
        if (is_null($locationData)) {
            $locationData = [
                'latitude' => 'Tidak diketahui',
                'longitude' => 'Tidak diketahui',
                'city' => 'Tidak diketahui',
            ];
        }
        Mail::to($this->email)->send(new ResetEmail($this, $token, $ip, $locationData));
    }
    private function getLocationData($ip)
    {
        try {
            $response = file_get_contents("http://ip-api.com/json/{$ip}?fields=lat,lon,city,status");
            $data = json_decode($response, true);

            if ($data['status'] === 'success') {
                return [
                    'latitude' => $data['lat'],
                    'longitude' => $data['lon'],
                    'city' => $data['city'],
                ];
            }
        } catch (\Exception $e) {
            // Jika gagal, kembalikan nilai default
            return [
                'latitude' => 'Tidak diketahui',
                'longitude' => 'Tidak diketahui',
                'city' => 'Tidak diketahui',
            ];
        }
    }
}