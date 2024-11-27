<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExampleData extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'example_data';
    protected $fillable = [
        'nama',
        'alamat',
        'pekerjaan'
    ];
}
