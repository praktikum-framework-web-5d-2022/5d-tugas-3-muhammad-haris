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
                <h2>Edit Data Dosen</h2>
                <p>Masukkan data dosen dengan lengkap</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('dosens.update', ['dosen' => $dosen->id])}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="mb-4">
                        <label for="nidn" class="form-label">NIDN</label>
                        <input type="text" name="nidn" id="nidn" placeholder="Masukkan NIDN" class="form-control" value="{{old('nidn') ?? $dosen->nidn}}">
                        @error('nidn')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="namalengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" name="namalengkap" id="namalengkap" placeholder="Masukkan namalengkap" class="form-control" value="{{old('namalengkap') ?? $dosen->namalengkap}}">
                        @error('namalengkap')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                            <option value="laki-laki" {{old('jeniskelamin') ?? $dosen->jeniskelamin == "laki-laki" ? "selected" : ""}}>Laki-laki</option>
                            <option value="perempuan" {{old('jeniskelamin') ?? $dosen->jeniskelamin == "perempuan" ? "selected" : ""}}>Perempuan</option>
                        </select>
                        @error('jeniskelamin')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat">{{old('alamat') ?? $dosen->alamat}}</textarea>
                        @error('alamat')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="form-control" value="{{old('tempat_lahir') ?? $dosen->tempat_lahir}}">
                        @error('tempat_lahir')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="{{old('tanggal_lahir') ?? $dosen->tanggal_lahir}}">
                        @error('tanggal_lahir')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="photo" class="form-label">Foto</label>
                        <input type="hidden" name="oldPhoto" value="{{$dosen->photo}}">
                        @if($dosen->photo)
                        <img src="{{asset('storage/' . $dosen->photo)}}" class="img-preview img-fluid mb-4 col-sm-5 d-block">
                        @else
                        <img class="img-preview img-fluid mb-4 col-sm-5 d-block">
                        @endif

                        <input type="file" name="photo" id="photo" placeholder="Masukkan Foto" class="form-control" onchange="previewImage()">
                        @error('photo')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bg-primary"><span class="text-white">Edit</span></button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
    <script>
        function previewImage(){
            const photo = document.querySelector('#photo');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(photo.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection