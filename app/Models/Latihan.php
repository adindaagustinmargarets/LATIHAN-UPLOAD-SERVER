<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'latihan';
    protected $fillable = [
        'nama',
        'keterangan'
    ];
}
