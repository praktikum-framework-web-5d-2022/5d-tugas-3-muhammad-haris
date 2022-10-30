@extends('master')
@section('title','Mata Kuliah')
@section('menu3','active')

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
                    <h2>Mata Kuliah</h2>
                    <a href="{{route('matakuliahs.create')}}" class="btn bg-primary"><span class="text-white">Tambah</span></a>
                </div>
                <p>Halaman ini menampilkan data <span class="text-danger">Mata Kuliah</span></p>
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
                                <th>Kode Mata Kuliah</th>
                                <th>Nama Mata Kuliah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($matakuliahs as $matakuliah)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$matakuliah->kd_mk}}</td>
                                <td>{{$matakuliah->nama_mk}}</td>
                                <td>
                                    <div class="d-flex">
                                    <a href="{{route('matakuliahs.edit', ['matakuliah'=>$matakuliah->id])}}" class="btn btn-warning mr-1">Edit</a>
                                    <form action="{{route('matakuliahs.destroy', ['matakuliah'=>$matakuliah->id])}}" method="POST">
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