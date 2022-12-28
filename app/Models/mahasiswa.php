<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['npm', 'namalengkap', 'jeniskelamin', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'photo'];
}
