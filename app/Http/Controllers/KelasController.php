<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
            return view('kelas.index',compact('kelas'));
    }

    public function create()
    {
            return view('kelas.create');
    }

    public function store(Request $request)
    {
        Kelas::create([
            'id' =>$request->id,
            'nama_kelas'=>$request->nama_kelas,
            'kompetensi_keahlian'=>$request->kompetensi_keahlian,
        ]);

        return redirect()->route('kelas.index');
    }

    
    public function show ($id) {
        $kelas = Kelas::where('id',$id)->get();
        // dd($kelas);
        return view('kelas.show',compact('kelas'));
    }

    public function edit($id) {
        $kelas = Kelas::where('id',$id)->first();
        return view('kelas.edit',compact('kelas'));
    }

    public function update(Request $request,$id) {
        $kelas = Kelas::where('id',$id)->update([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian
        ]);
        return redirect()->route('kelas.index');
    }

    public function destroy($id) {
        $kelas = Kelas::where('id', $id);
        $kelas->delete();
        return redirect()->route('kelas.index');
    }
}
