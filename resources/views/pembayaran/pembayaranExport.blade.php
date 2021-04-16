<div class="container">
    <div class="card-block text-center">
        <h3 class="mt-3">Data Transaksi SPP SMK WIKRAMA 1 GARUT</h3>
        <br>
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
@php
  $i = 1;  
  @endphp
        @foreach ($pembayarans as $s )
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $s->username }}</td>
            <td>{{ $s->nisn }} - {{ $s->nama }}</td>
            <td>{{ $s->tgl_bayar }}</td>
            <td>{{ $s->bulan_bayar }}</td>
            <td>{{ $s->tahun_bayar }}</td>
            <td>{{ $s->tahun}}</td>
            <td>Rp.{{ $s->jumlah_bayar }}</td>
            <td>    
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
    </div>
</div>