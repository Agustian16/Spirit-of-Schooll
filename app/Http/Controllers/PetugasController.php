<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
            return view('petugas.index',compact('petugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        Petugas::create([
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'nama_petugas'=>$request->nama_petugas,
            'level'=>'petugas',
        ]);

            User::create([
                'username' =>$request->username,
                'password'  => bcrypt($request->password),
                'level'         =>'petugas',
            ]);

        return redirect()->route('petugas.index');
    }

    public function show ($id) {
        $petugas = Petugas::where('id',$id)->get();
        // dd($kelas);
        return view('petugas.show',compact('petugas'));
    }

    public function edit($id) {
        $petugas = Petugas::where('id',$id)->first();
        return view('petugas.edit',compact('petugas'));
    }

    public function update(Request $request,$id) {
        $petugas = Petugas::where('id',$id)->update([
            'username' => $request->username,
            'password' =>bcrypt($request->password),
            'nama_petugas'=>$request->nama_petugas,
            'level'=>$request->level,
        ]);
        return redirect()->route('petugas.index');
    }

    public function destroy($id) {
        $petugas = Petugas::where('id', $id);
        $petugas->delete();
        return redirect()->route('petugas.index');
    }

}
