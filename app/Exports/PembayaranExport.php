<?php

namespace App\Exports;

use App\Models\Pembayaran;
use App\Models\view_pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PembayaranExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function view():View
    {
            return view('pembayaran.pembayaranExport',[
                'pembayarans' => view_pembayaran::all()
            ]);
    }
    
}
