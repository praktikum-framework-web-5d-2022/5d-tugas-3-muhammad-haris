<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class MahasiswaController extends Controller
{
    public function index () {
        $mahasiswas = mahasiswa::get();
        return view('mahasiswa.index', [
            'mahasiswas' => $mahasiswas
        ]);
    }
    public function create() {
        return view('mahasiswa.create');
    }

    public function store(Request $request) {
        $validate = $request->validate( [
            'npm' => 'required|numeric',
            'namalengkap' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'photo'=>'required|file|image'
        ]);

        $validate['photo'] = $request->file('photo')->store('mahasiswa');
        mahasiswa::create($validate);

        return redirect()->route('mahasiswas.index')
        ->with('message', "Data mahasiswa {$validate['namalengkap']} berhasil ditambahkan");

    }

    public function edit(Mahasiswa $mahasiswa){
        return view('mahasiswa.edit', [
            'mahasiswa' => $mahasiswa
    ]);
    }

    public function update(Request $request, Mahasiswa $mahasiswa) {
        $validate = $request->validate( [
            'npm' => 'required|numeric',
            'namalengkap' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'photo'=>'required|file|image'
        ]);

        $validateData = $request->validate($validate);
        if($request->file('photo')){
            if($request->oldPhoto){
                Storage::delete($request->oldPhoto);
            }
            $validateData['photo'] = $request->file('photo')->store('mahasiswa');
        }

        mahasiswa::where('id', $mahasiswa->id)->update($validateData);
        return redirect()->route('mahasiswas.index')->with('message', "Data mahasiswa $mahasiswa->namalengkap berhasil diubah");
    }


    public function destroy(mahasiswa $mahasiswa) {
        if($mahasiswa->photo){
            Storage::delete($mahasiswa->photo);
        }

        $mahasiswa->destroy($mahasiswa->id);
        return redirect()->route('mahasiswas.index')->with('message', "Data mahasiswa $mahasiswa->namalengkap berhasil dihapus");
    }
}
