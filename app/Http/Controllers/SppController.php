<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $spps = Spp::all();
            return view('spp.index',compact('spps'));
    }

    public function create()
    {
            return view('spp.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nominal' => 'required|max:11|min:7'
        ]);

        Spp::create([
            'id'=>$request->id,
            'tahun' =>$request->tahun,
            'nominal'=>$request->nominal,
        ]);

        if($request->nominal < 450000) : 
            return back()->with(['error' => 'wrong input']);
        endif;
        return redirect()->route('spp.index');
    }

    public function show ($id) {
        $spps = Spp::where('id',$id)->get();
        return view('spp.show',compact('spps'));
    }

    public function edit($id) {
        $spps = Spp::where('id',$id)->first();
        return view('spp.edit',compact('spps'));
    }

    public function update(Request $request,$id) {
        $spps = Spp::where('id',$id)->update([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal
        ]);
        return redirect()->route('spp.index');
    }

    public function destroy($id) {
        $spps = Spp::where('id', $id);
        $spps->delete();
        return redirect()->route('spp.index');
    }

}
