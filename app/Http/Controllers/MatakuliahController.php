<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\matakuliah;

class MatakuliahController extends Controller
{
    public function index(){
        $matakuliahs = matakuliah::get();
        return view('matakuliah.index', ['matakuliahs'=>$matakuliahs]);
    }

    public function create(){
        return view('matakuliah.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'kd_mk'=>'required|min:5',
            'nama_mk'=>'required|min:5'
        ]);

        matakuliah::create($validate);

        return redirect()->route('matakuliahs.index')->with('message', "Data mata kuliah {$validate['nama_mk']} berhasil ditambahkan");
    }

    public function edit(matakuliah $matakuliah){
        return view('matakuliah.edit', ['matakuliah'=>$matakuliah]);
    }

    public function update(Request $request, matakuliah $matakuliah){
        $validate = [
            'kd_mk'=>'required|min:5',
            'nama_mk'=>'required|min:5'
        ];

        $validateData = $request->validate($validate);

        matakuliah::where('id', $matakuliah->id)->update($validateData);
        return redirect()->route('matakuliahs.index')->with('message', "Data mata kuliah $matakuliah->nama_mk berhasil diubah");
    }

    public function destroy(matakuliah $matakuliah){

        $matakuliah->destroy($matakuliah->id);
        return redirect()->route('matakuliahs.index')->with('message', "Data mata kuliah $matakuliah->nama_mk berhasil dihapus");
    }
}
