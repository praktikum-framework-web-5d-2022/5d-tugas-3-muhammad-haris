@extends('master')
@section('title','Mahasiswa')
@section('menu2','active')

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
                    <h2>Mahasiswa</h2>
                    <a href="{{route('mahasiswas.create')}}" class="btn bg-primary"><span class="text-white">Tambah</span></a>
                </div>
                <p>Halaman ini menampilkan data <span class="text-danger">Mahasiswa</span></p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NPM</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Photo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswas as $mahasiswa)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$mahasiswa->npm}}</td>
                                <td>{{$mahasiswa->namalengkap}}</td>
                                <td>{{$mahasiswa->jeniskelamin}}</td>
                                <td>{{$mahasiswa->alamat}}</td>
                                <td>{{$mahasiswa->tempat_lahir}}, {{$mahasiswa->tanggal_lahir}}</td>
                                <td><img src="{{asset('storage/' . $mahasiswa->photo)}}" width="100" height="100" class="img-fluid"></td>
                                <td>
                                    <div class="d-flex">
                                    <a href="{{route('mahasiswas.edit', ['mahasiswa'=>$mahasiswa->id])}}" class="btn btn-warning mr-1">Edit</a>
                                    <form action="{{route('mahasiswas.destroy', ['mahasiswa'=>$mahasiswa->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <td colspan="8">Tidak ada data...</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection