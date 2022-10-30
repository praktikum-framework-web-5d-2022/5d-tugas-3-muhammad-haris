@extends('master')
@section('title','Dashboard')
@section('menu','active')

@section('content')
    <style>
        .bg-maroon {
            background-color: maroon;
            color: white;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h2>Dashboard</h2>
                </div>
                <p>Halaman ini menampilkan data <span class="text-danger">Dashboard</span></p>
                <div class="card-deck">
                    <div class="card">
                        <h6 class="card-header text-muted">Dosen</h5>
                        <div class="card-body">
                        <h5 class="card-title">Jumlah Dosen</h5>
                        <p class="text-muted">{{@count($dosens)}} Dosen</p>
                        <a href="/dosens" class="btn bg-primary"><span class="text-white">Lihat Data</span></a>
                        </div>
                    </div>
                    <div class="card">
                        <h6 class="card-header text-muted">Mahasiswa </h5>
                        <div class="card-body">
                        <h5 class="card-title">Jumlah Mahasiswa</h5>
                        <p class="text-muted">{{@count($mahasiswas)}} Mahasiswa</p>
                        <a href="/mahasiswas" class="btn bg-primary"><span class="text-white">Lihat Data</span></a>
                        </div>
                    </div>
                    <div class="card">
                        <h6 class="card-header text-muted">Mata Kuliah</h5>
                        <div class="card-body">
                        <h5 class="card-title">Jumlah Mata Kuliah</h5>
                        <p class="text-muted">{{@count($matakuliahs)}} Mata Kuliah</p>
                        <a href="/matakuliahs" class="btn bg-primary"><span class="text-white">Lihat Data</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection