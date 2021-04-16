<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use App\Exports\PembayaranExport;
use App\Models\User;
use App\Models\view_pembayaran;
use App\Models\View_siswa;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{

    public function export_excel()
    {
        return Excel::download(new PembayaranExport, 'pembayaran.xlsx');
    }


    public function index()
    {
        $pembayarans = view_pembayaran::all();
        $spps = Spp::all();
        $users = User::all();
        $kelas = Kelas::all();
        $petugas = Petugas::all();
            return view('pembayaran.index',compact('pembayarans','spps','kelas','petugas','users'));
    }

    public function create()
    {
        $pembayarans = view_pembayaran::all();
        $spps = Spp::all();
        $kelas = Kelas::all();
        $petugas = Petugas::all();
        $siswas = Siswa::all();
            return view('pembayaran.create',compact('pembayarans','spps','kelas','petugas','siswas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jumlah_bayar' => 'required|max:11|min:7'
        ]);
        $siswas = View_siswa::where('nisn', $request->nisn)->first();
        $spps = Spp::where('id',$siswas->id_spp)->first();
        $harga = Spp::where('id', '=', $siswas->id_spp)->first();
        $bln = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];

        $transaksi = Pembayaran::where('nisn', '=', $request->nisn)->get();

        if (sizeof($transaksi) == 0) :
            $bulan = 6;
            $tahun = $harga->tahun;
        else :
            $a = array_key_last(end($transaksi));

            $akhir = $transaksi[$a];

            $a = array_search($akhir->bulan_bayar, $bln);

            if ($a == 11) :
                $bulan = 0;
                $tahun = $akhir->tahun_bayar + 1;
            else :
                $bulan = $a + 1;
                $tahun = $akhir->tahun_bayar;
            endif;
        endif;

        

        if($request->jumlah_bayar <= $spps->nominal) {
            return redirect('pembayaran/create')->with('error','Nominal Kurang!!!');
        }elseif ($request->jumlah_bayar >= $spps->nominal) {
            $kembalian = $request->jumlah_bayar - $spps->nominal;
       

        Pembayaran::create([
            'id_petugas'=>$request->id_petugas,
            'nisn'=>$request->nisn,
            'tgl_bayar'=>Carbon::now(),
            'bulan_bayar' => $bln[$bulan],
            'tahun_bayar'=>$tahun,
            'id_spp'=>$siswas->id_spp,
            'jumlah_bayar'=>$request->jumlah_bayar,
        ]);

        return redirect()->route('pembayaran.index')->with('success','Kembalian ' .$kembalian);
    }
}

    public function show ($id) {
        $pembayarans = view_pembayaran::where('id',$id)->get();
        // dd($kelas);
        return view('pembayaran.show',compact('pembayarans'));
    }

    public function destroy($id) {
        $pembayarans = Pembayaran::where('id', $id);
        $pembayarans->delete();
        return redirect()->route('pembayaran.index');
    }  

    public function history()
    {
        if (auth()->user()->level=='admin' OR auth()->user()->level== 'petugas')
        {
            $pembayarans = view_pembayaran::all();
        }
        else
        {
            // validate siswa
            $users = auth()->user()->username;
            $siswas = Siswa::where('nama', $users)->pluck('nisn');
            $pembayarans = view_pembayaran::where('nisn',$siswas)->get();
        }
        // $spps = SPP::all();


        return view('history.index',compact('pembayarans'));
    }


    public function getData($nisn)
        {
            $siswas = Siswa::where('nisn', '=', $nisn)->first();
            $spp = Spp::where('id', '=', $siswas->id_spp)->first();
            $pembayaran = Pembayaran::where('nisn', '=', $siswas->nisn)
                ->latest()
                ->first();

                if ($pembayaran == null) {
                    $data = [
                        'harga' => $spp->nominal,
                        'bulan' => 'belum pernah bayar spp',
                        'tahun' => '-'
                    ];

                    return response()->json($data);
                }else{
                    $data = [
                        'harga' => $spp->nominal,
                        'bulan' => $pembayaran->bulan_bayar,
                        'tahun' => $pembayaran->tahun_bayar,
                    ];
        
                    return response()->json($data);
                }

            
        }

}
