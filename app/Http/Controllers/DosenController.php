<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dosen;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    public function index () {
        $dosens = dosen::get();
        return view('dosen.index', ['dosens'=>$dosens]);
    }

    public function create(){
        return view('dosen.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nidn'=>'required|numeric',
            'namalengkap'=>'required|min:5',
            'jeniskelamin'=>'required',
            'alamat'=>'required|min:10',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'photo'=>'required|file|image'
        ]);

        $validate['photo'] = $request->file('photo')->store('dosen');

        dosen::create($validate);

        return redirect()->route('dosens.index')->with('message', "Data dosen {$validate['namalengkap']} berhasil ditambahkan");
    }

    public function edit(dosen $dosen){
        return view('dosen.edit', ['dosen'=>$dosen]);
    }

    public function update(Request $request, dosen $dosen){
        $validate = [
            'nidn'=>'required|numeric',
            'namalengkap'=>'required|min:5',
            'jeniskelamin'=>'required',
            'alamat'=>'required|min:10',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'photo'=>'required|file|image'
        ];

        $validateData = $request->validate($validate);

        if($request->file('photo')){
            if($request->oldPhoto){
                Storage::delete($request->oldPhoto);
            }
            $validateData['photo'] = $request->file('photo')->store('dosen');
        }

        dosen::where('id', $dosen->id)->update($validateData);
        return redirect()->route('dosens.index')->with('message', "Data dosen $dosen->namalengkap berhasil diubah");
    }

    public function destroy(dosen $dosen){
        if($dosen->photo){
            Storage::delete($dosen->photo);
        }

        $dosen->destroy($dosen->id);
        return redirect()->route('dosens.index')->with('message', "Data dosen $dosen->namalengkap berhasil dihapus");
    }
}
