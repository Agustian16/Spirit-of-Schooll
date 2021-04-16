<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\User;
use App\Models\View_siswa;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Auth\Events\Validated;
use delete;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = View_siswa::all();
        return view('siswa.index',compact('siswas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $spps = Spp::all();
        return view('siswa.create', compact('kelas','spps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Siswa::create([
            'nisn'=> $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp'=> $request->no_telp,
            'id_spp'=> $request->id_spp,
        ]);

            User::create([
                'username'  => $request->nama,
                'password'   => bcrypt($request->nis),
                'level'          => 'siswa',
            ]);
        
        
            return redirect()->route('siswa.index');            
    }

    public function show ($nisn) {
        $siswas = View_siswa::where('nisn',$nisn)->get();
        // dd($kelas);
        return view('siswa.show',compact('siswas'));
    }

    public function edit($nisn) {
        $kelas = Kelas::all();
        $spps = Spp::all();
        $siswas = Siswa::where('nisn',$nisn)->first();
        return view('siswa.edit',compact('siswas','kelas','spps'));
    }

    public function update(Request $request,$nisn) {
        $siswas = Siswa::where('nisn',$nisn)->update([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama'=>$request->nama,
            'id_kelas'=>$request->id_kelas,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->no_telp,
            'id_spp'=>$request->id_spp,
        ]);
        return redirect()->route('siswa.index');
    }

    public function destroy($nisn) {
        $siswas = Siswa::where('nisn', $nisn);
        $siswas->delete();
        return redirect()->route('siswa.index');
    }

    public function navbar()
    {
            return view('navbar');
    }
}
