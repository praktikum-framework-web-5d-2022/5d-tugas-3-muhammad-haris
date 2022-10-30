<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Suppport\Facades\DB;

class dosen extends Model
{
    use HasFactory;
    protected $fillable = ['nidn', 'namalengkap', 'jeniskelamin', 'alamat', 'tempat_lahir', 'tanggal lahir', 'photo'];
}
