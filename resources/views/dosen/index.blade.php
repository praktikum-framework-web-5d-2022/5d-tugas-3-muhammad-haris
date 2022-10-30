@extends('master')
@section('title','Dosen')
@section('menu1','active')

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
                    <h2>Dosen</h2>
                    <a href="{{route('dosens.create')}}" class="btn bg-primary"><span class="text-white">Tambah</span></a>
                </div>
                <p>Halaman ini menampilkan data <span class="text-danger">Dosen</span></p>
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
                                <th>NIDN</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Photo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dosens as $dosen)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$dosen->nidn}}</td>
                                <td>{{$dosen->namalengkap}}</td>
                                <td>{{$dosen->jeniskelamin}}</td>
                                <td>{{$dosen->alamat}}</td>
                                <td>{{$dosen->tempat_lahir}}, {{$dosen->tanggal_lahir}}</td>
                                <td><img src="{{asset('storage/' . $dosen->photo)}}" width="100" height="100" class="img-fluid"></td>
                                <td>
                                    <div class="d-flex">
                                    <a href="{{route('dosens.edit', ['dosen'=>$dosen->id])}}" class="btn btn-warning mr-1">Edit</a>
                                    <form action="{{route('dosens.destroy', ['dosen'=>$dosen->id])}}" method="POST">
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