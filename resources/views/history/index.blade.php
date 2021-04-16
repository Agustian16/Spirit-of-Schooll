@include('master')

@php
  $i = 1;  
  @endphp
<div class="container">
    <div class="card-block text-center">
        <h3 class="mt-3">History Pembayaran SPP SMK WIKRAMA 1 GARUT</h3>
        <br>
        <style>
            #tambah{
                position: relative;
                left: 500px;
            }
            .kembali{
                position: relative;
                right: 450px;
                top: -20px;
            }
        </style>
                <a href="{{ route('pembayaran.index') }}" class="btn btn-info kembali">Kembali</a>
        <a href="{{ route('logout') }}" class="btn btn-outline-success my-2 my-sm-0 mr-4" id="tambah">Keluar</a>
        <br>
        {{-- <a href="{{ route('export_excel') }}" class="btn btn-success ml-4">Export Excel</a> --}}
            <table id="table-id" class="table table-bordered table-hover mt-3">
    <thead>
        <tr>
            <th>No.</th>
            <th>Petugas</th>
            <th>NISN</th>
            <th>Tanggal Bayar</th>
            <th>Bulan Bayar</th>
            <th>Tahun Bayar</th>
            <th>SPP</th>
            <th>Jumlah Bayar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembayarans as $s )
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $s->username}}</td>
            <td>{{ $s->nisn }} - {{ $s->nama }}</td>
            <td>{{ $s->tgl_bayar }}</td>
            <td>{{ $s->bulan_bayar }}</td>
            <td>{{ $s->tahun_bayar }}</td>
            <td>{{ $s->tahun}} - Rp.{{ $s->nominal}}</td>
            <td>Rp.{{ $s->jumlah_bayar }}</td>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
    </div>
</div>