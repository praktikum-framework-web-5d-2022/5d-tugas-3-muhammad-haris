<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\mahasiswa;
use App\Models\matakuliah;


class DashboardController extends Controller
{
    public function index () {
        $dosens = dosen::get();
    $mahasiswas = mahasiswa::get();
    $matakuliahs = matakuliah::get();
    return view('dashboard.index', ['dosens'=>$dosens, 'mahasiswas'=>$mahasiswas, 'matakuliahs'=>$matakuliahs]);
    }
}
